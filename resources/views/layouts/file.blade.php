<!DOCTYPE html>
<!-- Landing page based on Pratt: http://blacktie.co/demo/pratt/ -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="learn to ski in south africa | ski lessons south africa | skiing in southern africa">
    <meta name="author" content="Lwandile N Rozani - idwebsmarket.tk">

    <meta property="og:title" content="Ski Lessons | Kids Parties" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="learn to ski in south africa | ski lessons south africa | skiing in southern africa | Kids Fun Parties" />
    <meta property="og:url" content="http://ski.co.za/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="ski.co.za" />
    <meta property="og:url" content="http://ski.co.za" />
<!--
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />
-->
                        @if ($categories = App\Models\Category::all())
                            @foreach ($categories as $category)
                            @if($posts = App\Models\Post::all())
                                @foreach($posts as $post)
                                    @if ($category->id == $post['category_id'])
        <title>@yield('htmlheader_title') | {{ $category->category_name }} </title>
                                    @endif
                                @endforeach
                            @endif
                            @endforeach
                        @endif
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">
    <link href="/css/all-landing.css" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="{{ url('/img/favicon.png') }}" />
    <link rel="icon" type="image/png" href="/img/favicon.png" />

    <link href="/css/ski_style.css" rel="stylesheet">
    
    @yield('styles')
    
    <style>
                        @media screen and (max-width: 768px) {
                        
                            .card {
                                margin: 20px 2px;
                                padding: 0;
                            }
                        
                        }
    </style>
    
    @yield('styles')
</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app" v-cloak>
    
    <!-- Fixed navbar -->
    @include('layouts.partials.main_nav')
    
    {{-- @include('layouts.partials.carousel') --}}

    @yield('content')

    @include('layouts.partials.plain_nav')

    <section id="contact" name="contact" style="background-color: #666; width: 100%;">
        <div id="footerwrap" style="background-color: #666; width: 100%;">
            <div class="container" style="background-color: #666; width: 100%;">
                <div class="col-lg-5" style="background-color: #666; width: 100%;">
                    <h3>Address</h3>
                    <p>
                        74 Bond Street,<br/>
                        Ferndale,<br/>
                        Randburg,<br/>
                        2194<br/>
                        South Africa
                    </p>
                </div>

                <div class="col-lg-7">
                    <h3>Drop us a line</h3>
                    <br>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                x
                            </button>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li> 
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- @include('layouts.partials.email') --}}
                    <p><b>Call:</b> (011) 781 6528</p>
                    <p><b>email:</b> Info@ski.co.za</p>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div id="c">
            <div class="container" style="background-color: #333; width: 100%;">
        <p>
            <strong>Copyright &copy; 2019 <a href="http://idwebsmarket.tk" target="_blank">ID Webs</a>.</strong> {{ trans('message.createdby') }} <a href="https://github.com/vsemoth">Lwandile Rozani</a>.
        </p>
            </div>
        </div>
    </footer>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- {{-- <script src="{{ url (mix('/js/app-landing.js')) }}"></script> --}} -->
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
