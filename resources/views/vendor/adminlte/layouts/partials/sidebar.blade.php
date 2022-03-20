<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HOME</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ route('manage.dashboard') }}"><i class='fa fa-link'></i> <span>Dashboard</span></a></li>
            <li><a href="{{ route('notifications.index') }}"><i class='fa fa-link'></i> <span>Notifications</span></a></li>
            <li><a href="{{ route('categories.index') }}"><i class='fa fa-link'></i> <span>Categories</span></a></li>

            <li class="header">USER ADMIN</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>ACL</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('users.index') }}">Manage Users</a></li>
                    <li><a href="#">Roles &amp; Permissions</a></li>
                </ul>
            </li>

            <li class="header">SITE ADMIN</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>POSTS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('posts.index') }}">Posts Management</a></li>
                    <li><a href="#">Blog (Main Site)</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>ECOMMERCE</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('products.index') }}">Ecom Management</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Screenshots</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('screenshots.index') }}">Screenshot Management</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
