<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-nav navbar-fixed-top" style="padding-top:0; text-align:center; margin-left: 0; font-weight: bold;">
            <a class="nav navbar-nav navbar-left" href="/" style="float: left;"><b><img height="50px" src="{{ url('/storage/images/cover_images/the_ski_deck_logo.png') }}" alt="The Ski Deck image logo"></b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="float: right !important; padding: 0 !important;">
    <span class="navbar-toggler-icon" style="min-height: 50px !important; min-width: 50px !important; float: right !important; margin: 0 !important; padding: 0 !important;"></span>
  </button>

  <div class="collapse navbar-collapse navbar-nav navbar-left" id="navbarSupportedContent" style="background-color: #fff; text-align: center;">
    <ul class="navbar-nav mr-auto nav link">
                    @foreach (App\Models\Post::all() as $post1)
                        @if (empty($post1->drop))
                        @if ($post1->post_title != 'Kids Parties' && $post1->post_title != 'shoppingcart' && $post1->post_title != 'Checkout' && $post1->post_title != 'hyperli-voucher-terms')
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{$post1->post_title}}
        </a>
                            <ul class="dropdown-menu is-open" role="menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item"> 
          <a class="dropdown-item" href="http://{{ request()->getHttpHost() }}/{{$post1->slug}}" style="color: #fff;">{{$post1->post_title}}</a>
                                </li>
                                @foreach (App\Models\Post::all() as $post2)
                                  @if ($post2->id != $post1->id && $post2->drop == $post1->id)
                                  @if ($slug = rtrim($post2->slug,'/'))
                                  @if ($host = request()->getHttpHost())
                                <li class="nav-item">
          <a class="dropdown-item" style="color: #fff !important; font-size: 21px;" href="http://{{ request()->getHttpHost() }}/{{ $slug }}">{{$slug}}</a>
                                </li>
                                  @endif
                                  @endif
                                  @endif
                                @endforeach
          <!--<div class="dropdown-divider"></div>-->
                                <li class="nav-item"> 
          <a class="dropdown-item" style="color: #fff !important; font-size: 21px;" href="{{ request()->getHttpHost() }}">
          </a>
                                </li>
                                
                            </ul>
      </li>
                      @endif 
                      @endif 
                    @endforeach
                                <li class="nav-item"> 
          <a class="dropdown-item" style="font-size: 21px;" href="{{ route('products.shoppingcart') }}">
            <img height="30px" src="{{ url('/img/shopping_cart_green.png') }}">
            <span class="btn btn-danger badge" style="background-color: red;">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
          </a>
                                </li> 
        @if(!empty(Auth::user()))
        <li class="nav-item dropdown">
            <a id="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img height="30px" src="{{ url('/img/user.jpg') }}">
            </a>

            <ul class="dropdown-menu is-open" role="menu" aria-labelledby="navbarDropdown">
        @if(Auth::user()['admin'] == 1)
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('manage.dashboard') }}">
                        Dashboard
                    </a>
                </li>
        @endif
        {{-- @if(Auth::user()['admin'] == 'null' || Auth::user()['admin'] == null)
                <!-- <li class="nav-item">
                    <a class="dropdown-item" href="{{ url('catalogue') }}">
                        Catalogue
                    </a>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('products.shoppingcart') }}">
                        Shoppingcart
                    </a>
                </li> -->
        @endif --}}
        @if(Session::has('cart'))
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('manage.dashboard') }}">
                        Checkout
                    </a>
                </li>
        @endif
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
    </ul>
  </div>
</nav>
