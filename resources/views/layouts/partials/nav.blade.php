<nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top bg-dark" style="background-color: #333; font-size-adjust: 14px; width: 100%;">
    <!-- <div class="container"> -->
        <div class="navbar-header">
             <a style="float: left; margin-right: 15px;" class="nav navbar-nav navbar-left" href="/"><b><img height="50px" src="{{ url('storage/images/cover_images/the_ski_deck_logo.png') }}" alt="The Ski Deck image logo"></b></a>
  <button style="float: right; margin-right: 15px; background-color: #999;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ariaSkiNav" aria-controls="ariaSkiNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="height: 35px;"></span>
  </button>
        </div>
        <div style="float: left;" class="collapse navbar-collapse" id="ariaSkiNav">
                <ul class="navbar-nav mr-auto nav link">
                @if($posts = App\Models\Post::all())
                    @foreach($posts as $post)
                            @if($post->id == 3)
                        <li class="dropdown nav-pill">
                            <ul class="is-open" role="menu">
                            <a class="nav-link dropdown" id="navbarDropdown" href="{{$post->slug}}">{{$post->post_title}}</a>
                            </ul>
                        </li>
                            @endif
                            @if($post->drop == 3)
                        <li class="dropdown nav-pill">
                            <ul class="is-open" role="menu">
                            <a class="nav-link dropdown" id="navbarDropdown" href="{{$post->slug}}">{{$post->post_title}}</a>
                            </ul>
                        </li>
                            @endif
                    @endforeach
                        <li class="dropdown nav-pill">
                            <ul class="is-open" role="menu">
                            <a class="nav-link dropdown" id="navbarDropdown" href="http://ski.co.za/">Interested in skiing?</a>
                            </ul>
                        </li>
                    @foreach($posts as $post)
                            @if($post->id == 5)
                        <li class="dropdown nav-pill">
                            <ul class="is-open" role="menu">
                            <a class="nav-link dropdown" id="navbarDropdown" href="{{$post->slug}}">{{$post->post_title}}</a>
                            </ul>
                        </li>
                            @endif
                    @endforeach
                @endif
        
        @if(!empty(Auth::user()))            
        @if(Auth::user()['email'] == 'superadministrator@app.com' || Auth::user()['email'] == 'bookings@ski.co.za' || Auth::user()['email'] == 'admin@ski.co.za' || Auth::user()['email'] == 'info@ski.co.za' || Auth::user()['email'] == 'lew@ski.co.za' || Auth::user()['email'] == 'maggie@ski.co.za')
        <li class="nav-item dropdown">
            <a id="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img height="30px" src="{{ url('/img/user.jpg') }}">
            </a>

            <ul class="dropdown-menu is-open" role="menu" aria-labelledby="navbarDropdown">
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </li>
            </ul>
        </li>
        @endif
        @endif
    </ul>
  </div>
</nav>