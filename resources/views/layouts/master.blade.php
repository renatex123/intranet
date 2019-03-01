<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="shortcut icon" type="image/x-icon" href="{{url('/images/cenglish.jpeg')}}"/>
        <title>@yield('title')</title>
       <link rel="stylesheet" href="{{url('/css/animate.css')}}">
       <link rel="stylesheet" type="text/css" href="{{url('/css/swiper.min.css')}}">
       <link rel="stylesheet" href="{{url('/font.css')}}">
       <link rel='stylesheet' type='text/css' href="{{url('/css/stylesheet.css')}}">
        <link rel='stylesheet' type='text/css' href="{{url('/css/bootstrap.min.css')}}">
        <script type='text/javascript' src="{{url('/js/jquery-2.1.3.min.js')}}"></script>
        <script type='text/javascript' src="{{url('/js/bootstrap.min.js')}}"></script>
        <script defer src="{{url('/js/all.js')}}" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
        
    </head>
    <body>

        <div class="container-fluid">
            <!-- 
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif-->

            


            <div class="row" id="top">

            <nav class="col-12 navbar navbar-expand-md bg-dark navbar-dark fixed-top"><!--fixed-top -->
  <a href="{{url('/index')}}" class="navbar-brand"><img src="{{url('/images/cenglish.jpeg')}}" style="width:30px;"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
    <span class="navbar-toggler-icon"></span>
  </button>
        <div class="navbar-collapse justify-content-md-center collapse" id="navbarNavAltMarkup">
              <ul class="navbar-nav">
              <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-home"></i> Home</a>
                <div class="dropdown-menu">
                    
                    <a href="{{url('/somos')}}" class="dropdown-item">Quienes somos</a>
                    <a href="{{url('/mision')}}" class="dropdown-item">Misión</a>
                    <a href="#" class="dropdown-item">Visión</a>
                    <a href="#" class="dropdown-item">Docentes de Transversales/ Inglés</a>
                
                </div></li>
            <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-sticky-note"></i> Exámenes</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Exámenes de suficiencia</a>
                    <a href="#" class="dropdown-item">Exámenes extraordinarios</a>
                </div>
            </li>
            <li class="nav-item"><a href="{{ url('/t_english') }}" class="nav-link"><i class="fas fa-marker"></i> Test your English</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-film"></i> Videos</a></li>
            <li class="nav-item"><a href="#" class="nav-link" target="_blank"><i class="fab fa-blogger-b"></i> Blog</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-user"></i> Intranet</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-envelope"></i> Contáctenos</a></li>
        
              </ul>
              </div>
              </nav>

            </div>



            <div class="row">
              <div class="carousel slide" id="MagicCarousel" data-ride="carousel">
                <ol id="myCarousel-indicators" class="carousel-indicators">
                  <li class="active" data-slide-to="0" data-target="#MagicCarousel"></li>
                  <li data-slide-to="1" data-target="#MagicCarousel"></li>
                  <li data-slide-to="2" data-target="#MagicCarousel"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                      <div class="carousel-item active">
                          
                          <img class="d-block w-100" src="{{url('/images/ship.jpg')}}" alt="First slide">
                          <div class="carousel-caption">
                          <h1 class="animated zoomInLeft">ggggfggfgfg</h1>
                                  <h3 class="animated zoomInLight">gghvvvdvvdvdvdvddvvd</h3>
                          </div>  
                      </div>
                      <div class="carousel-item">
                          <img class="d-block w-100" src="{{url('/images/bunny.jpg')}}" alt="Second slide">
                          <div class="carousel-caption">
                          <h1 class="animated fadeInRight">LIMA</h1>
                                  <h3 class="animated fadeInLeft">atmosphere</h3>
                          </div>  
                      </div>
                      <div class="carousel-item">
                          <img class="d-block w-100" src="{{url('/images/english_cae.jpg')}}" alt="Third slide">
                          <div class="carousel-caption">
                          <h1 class="animated flip">ICA</h1>
                                  <h3 class="animated slideInUp">milo</h3>
                          </div>  
                      </div>
                </div>
                <a class="carousel-control-prev" href="#MagicCarousel"
            data-slide="prev" role="button">
              <span class="carousel-control-prev-icon"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#MagicCarousel"
            data-slide="next" role="button">
              <span class="carousel-control-next-icon"></span>
              <span class="sr-only">Next</span>
            </a>
              </div>
            </div>





            <div class="row">
                
        <div class="col-12 col-md-6 col-lg-8 borde3">
            
            
            @yield('content')
            
            
        </div>
        
        
        <div class="col-12 col-md-6 col-lg-4 borde4">

            
            <div class="fg" align="center">
            <div id="sidebar">
                <ul>
                    <li>
                        <div class="content">
                            <h2>Que son estos muchos</h2>
                            <p>gfgggfgdfggfffgfgfgggf
                            gggfdddddddddddfdfffgfggg
                            fffgfffffffffffffffffggfg
                            sssfcdccdcddddddddddddddd
                            vbbbbbbbbbbbbbfggbggbggbg
                            cffffffd <a href="https://elcomercio.pe/" target="_blank"><i class="fas fa-file-alt"></i> Ver más</a></p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <h2>Que son estos muchos</h2>
                            <p>gfgggfgdfggfffgfgfgggf
                            gggfdddddddddddfdfffgfggg
                            fffgfffffffffffffffffggfg
                            sssfcdccdcddddddddddddddd
                            vbbbbbbbbbbbbbfggbggbggbg
                            cffffffd. <a href="https://elcomercio.pe/" target="_blank"><i class="fas fa-file-alt"></i> Ver más</a></p>
                        </div>
                    </li>
                    <li>
                        <div class="content">
                            <h2>Que son estos muchos</h2>
                            <p>gfgggfgdfggfffgfgfgggf
                            gggfdddddddddddfdfffgfggg
                            fffgfffffffffffffffffggfg
                            sssfcdccdcddddddddddddddd
                            vbbbbbbbbbbbbbfggbggbggbg
                            cffffffd. <a href="https://elcomercio.pe/" target="_blank"><i class="fas fa-file-alt"></i> Ver más</a></p>
                        </div>
                    </li>
                </ul>
            </div><br>
            
            
            <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-page" data-href="https://www.facebook.com/Crosscurricular-ModuleEnglish-914570952000066/" data-tabs="timeline" data-width="421" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Crosscurricular-ModuleEnglish-914570952000066/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Crosscurricular-ModuleEnglish-914570952000066/">Crosscurricular Module English</a></blockquote></div><br></div><!---->
          
        </div>
    </div>
        
        <div class="row">

        <!--<div class="col">-->
        <div class="fh" align="center">
        <div id="socialicons">
                <ul class="navbar-nav flex-row">
                <li class="nav-item"><a class="nav-link px-3"  href="#" title="Facebook"><i class="fab fa-facebook-square"></i></a></li>
                <li class="nav-item"><a class="nav-link px-3"  href="https://www.youtube.com/watch?v=kvEvATBiQ5U" title="Youtube"target="_blank"><i class="fab fa-youtube"></i></a></li>
            
                <li class="nav-item"><a class="nav-link px-3"  href="#" title="Twitter"><i class="fab fa-twitter-square"></i></a></li>
            
                </ul>
                
            
        
        </div>
        <!--<p align="center">Todos los derechos reservados</p>-->

         
    
        </div>








            <!--
            <div class="content">
                
                <div class="links">
                    <a href="#">Home</a>
                    <a href="#">Exámenes</a>
                    <a href="{{ url('/t_english') }}">Test your English</a>
                    <a href="#">Videos</a>
                    <a href="#">Blog</a>
                    <a href="#">Intranet</a>
                    <a href="#">Contáctenos</a>
                </div>
                <p>@yield('content')</p>
                </div>-->
        </div>
        </div>

        <div class="red">

            <div id="facebook"><a href="#"  class="fab fa-facebook-square"></a></div>
            <div id="youtube"><a href="#"  class="fab fa-youtube"></a></div>
            <div id="twitter"><a href="#"  class="fab fa-twitter-square"></a></div>
        </div>



        <script type="text/javascript" src="{{url('/js/swiper.min.js')}}"></script>
        <script>
                var swiper = new Swiper('.swiper-container', {
                  effect: 'coverflow',
                  grabCursor: true,
                  centeredSlides: true,
                  slidesPerView: 'auto',
                  coverflowEffect: {
                    rotate: 50,//60
                    stretch: 0,
                    depth: 100,//500
                    modifier: 1,//5
                    slideShadows : true,
                  },
                  pagination: {
                    el: '.swiper-pagination',
                  },
                });
              </script>
    </body>

</html>
