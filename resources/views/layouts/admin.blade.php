<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<body class="skin-black sidebar-mini">
<div id="app" v-cloak>
    <div class="wrapper">

    @include('layouts.partials.mainheader')

    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="height: 100%;">

        @include('layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    {{-- @include('layouts.partials.controlsidebar') --}}

    @include('layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('layouts.partials.scripts')
@show

</body>
</html>