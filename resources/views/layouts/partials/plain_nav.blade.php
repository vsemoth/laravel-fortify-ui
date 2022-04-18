<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #333; font-size-adjust: 14px; width: 100%;">
    <!-- <div class="container"> -->
        <div class="navbar-header">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ariaSkiNav" aria-controls="ariaSkiNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            <!-- {{-- <a class="nav navbar-nav navbar-left" href="/"><b><img height="50px" src="{{ url('storage/images/cover_images/the_ski_deck_logo.png') }}" alt="The Ski Deck image logo"></b></a> --}} -->
        </div>
        <div class="collapse navbar-collapse" id="ariaSkiNav">
                <ul class="navbar-nav mr-auto nav link">
                    @foreach (App\Models\Post::all() as $post1)
                    @if (empty($post1->drop))
                        @if ($post1->post_title != 'Kids Parties')
                        <li class="dropdown nav-pill">
                            <ul class="is-open" role="menu">
                            <a class="nav-link dropdown" id="navbarDropdown" style="text-decoration: underline;" href="http://{{ request()->getHttpHost() }}/{{$post1->slug}}">{{$post1->post_title}}</a>
                                @foreach (App\Models\Post::all() as $post2)
                                  @if ($post2->id != $post1->id && $post2->drop == $post1->id)
                                  @if ($slug = rtrim($post2->slug,'/'))
                                  @if ($host = request()->getHttpHost())
                                <li class="nav-item">
                                    <a class="dropdown-item nav-link" style="color: #777;" href="http://{{ request()->getHttpHost() }}/{{ $slug }}">{{$slug}}</a>                                   
                                </li>
                                  @endif 
                                  @endif 
                                  @endif 
                                @endforeach
                            </ul>
                        </li>
                        @endif
                    @endif
                    @endforeach
                     
                </ul>
            {{-- <ul class="nav navbar-nav link">
                                        @guest()
                                            <a href="#">
                                                <img height="30px" src="/img/user.jpg" alt="guest_image">
                                            </a>
                        
                                            <ul class="dropdown-menu is-open" role="menu">
                                                <li class="nav-item">
                                                    <a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a>
                                                </li>
                                            </ul>  
                                        @else
                                        <li class="dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <img height="30px" src="/img/user.jpg" alt="guest_image">
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu is-open" role="menu">
                                                <li class="nav-item">
                                                    <a href="/home">
                                                        {{ Auth::user()->name }}
                                                    </a>
                                                </li>
                                                @if (Auth::user()->name == 'Ski Bookings' | Auth::user()->name == 'Lew Campbell' | Auth::user()->name == 'Maggie Campbell')
                                                    <li class="nav-item">
                                                        <a href="{{ route('manage.dashboard') }}">
                                                            Dashboard
                                                        </a>
                                                    </li>
                                                @endif
                                                <li class="nav-item">
                                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" id="logout"
                                                       onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                        {{ trans('adminlte_lang::message.signout') }}
                                                    </a>
                        
                                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                        <input type="submit" value="logout" style="display: none;">
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                        @endguest
                                    </ul> --}}
        </div><!--/.nav-collapse -->
    <!-- </div> --><!-- end of container -->
</nav>
