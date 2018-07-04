<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Raffle</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <!-- styles -->
    <link href="{{url('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{url('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{url('css/owl.theme.css')}}" rel="stylesheet">
    <!-- theme stylesheet -->
    <link href="{{url('css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">
    <!-- your stylesheet with modifications -->
    <link href="{{url('css/custom.css')}}" rel="stylesheet">

    <script src="{{url('js/respond.min.js')}}"></script>

    <link rel="shortcut icon" href="{{url('favicon.png')}}">

    <!-- Fonts -->
   
    

    <!-- Styles -->
   
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
 
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .error{
            color:red;
        }
    </style>
</head>
<body id="app-layout">

    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a style="pointer-events:none!important;" href="javascript:void(0);" class="btn btn-success btn-sm" data-animate-hover="shake">Raffle</a>  <a style="pointer-events:none!important;" href="javascript:void(0);">Successful online genuine raffle contest</a>
            </div> 
            <div class="col-md-6" data-animate="fadeInDown">
                  <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                     
                  <li class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ Auth::user()->name }}
                        <span class="caret"></span></button>
                         <ul style="position:unset!important; background-color:#000!important;" class="dropdown-menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                         </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
       
            
            <!--/.navbar-header -->
            <div class="navbar-header col-sm-2 float-left">
                <a class="navbar-brand home float-right" href="{{url('/')}}" data-animate-hover="bounce">
                    <img src="{{url('img/logo.png')}}" alt="RAFFLE" class="hidden-xs">
                    <img src="{{url('img/logo-small.png')}}" alt="RAFFLE" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                   
                </div>
            </div>
            <div class="navbar-collapse collapse col-sm-12 float-right" id="navigation">
                <div class="container">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="#" class="navbar-menu">Electronics</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle navbar-menu" data-toggle="dropdown" data-hover="dropdown" data-delay="200">For The Kitchen<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <ul>
                                                <li><a href="#">Home Applications<b class="caret"></b></a>
                                                </li>
                                                <li><a href="#">Home Decor<b class="caret"></b></a>
                                                </li>
                                                <li><a href="#">Lighting<b class="caret"></b></a>
                                                </li>
                                                <li><a href="#">Luggage & Travel Accessories<b class="caret"></b></a>
                                                </li>
                                                <li><a href="#">outdoor<b class="caret"></b></a>
                                                </li>
                                                <li><a href="#">Pet Supplies<b class="caret"></b></a>
                                                </li>
                                                <li><a href="#">Rugs<b class="caret"></b></a>
                                                </li>
                                                <li><a href="#">Storage & Organization<b class="caret"></b></a>
                                                </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                              
                            </li>
                        </ul>
                    </li> 
                    <li>
                        <a href="{{url('/')}}" class="navbar-menu">Memorabilia</a>
                    </li>
                    <li><a href="{{url('/')}}"  class="dropdown-toggle navbar-menu" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Fashion<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul>
                                                <li><a href="{{url('/products')}}">See All Fashion<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Woman's Clothing<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Shoes<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Handbags & Wallets for Women<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Fashion Accessories<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Intimates<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Men's Apparel & Accessories<b class="caret"></b></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                              
                            </li>
                        </ul>


                    </li>


                    <li><a href="#"  class="navbar-menu">Health & Wellness</a></li>
                    <li><a href="#" class="dropdown-toggle navbar-menu" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Home<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul>
                                                <li><a href="{{url('/products')}}">Both<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Bedding<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Cleaning & Laundy<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Furniture<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Holiday<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Home Decor<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Home Improvement<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Lighting<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Luggage<b class="caret"></b></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                              
                            </li>
                        </ul>
                    </li>
            
                    <li><a href="#" class="dropdown-toggle navbar-menu" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Toys<b class="caret"></b></a>
                        <ul class="dropdown-menu toy-dropdown">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <ul>
                                                <li><a href="{{url('/products')}}">Action Figures<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Arts & Crafts<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Blocks & Building Sets<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Home Decor & Fashion<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Dolls &Dollhouses<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Education Toys<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Games & Puzzies<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Kid's Electronics<b class="caret"></b></a>
                                                </li>
                                                 <li><a href="{{url('/products')}}">Musical instrument<b class="caret"></b></a>
                                                </li>
                                                 <li><a href="{{url('/products')}}">Outdoor Toys<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Pretend Play<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">RC Drones & Toys<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Ride On Toys<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Stuffed Animals<b class="caret"></b></a>
                                                </li>
                                                <li><a href="{{url('/products')}}">Toy Cars, Train Sets & Playsets<b class="caret"></b></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                              
                            </li>
                        </ul>
                    </li>
                    <li><a href="#" class="navbar-menu">Him</a></li>
                    <li><a href="{{url('/')}}" class="navbar-menu">Her</a></li>
                    <li><a href="{{url('/')}}" class="navbar-menu">Clearance</a></li>
                </ul>
            </div>
            </div>
        <div class="navbar-header-parent">
        <div class="container">
           <div class="navbar-header-md col-sm-2 float-left">
                <a class="navbar-brand home float-right" href="{{url('/')}}" data-animate-hover="bounce">
                    <img src="{{url('img/logo.png')}}" alt="RAFFLE" class="hidden-xs">
                    <img src="{{url('img/logo-small.png')}}" alt="RAFFLE" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
            </div>

            <div class="navbar-header-sort float-left col-sm-10" id="navbar-sort">
                <ul class="nav navbar-nav navbar-left">
                        <li class=""><a href="{{url('/')}}">Brozne</a></li>
                        <li class=""><a href="{{url('/')}}">Silver</a></li>
                        <li class=""><a href="{{url('/')}}">Golden</a></li>
                        <li class=""><a href="{{url('/')}}">Platinum</a></li>
                        <li class=""> <a href="#" >Elite</a></li>
                </ul>
                <div class="navbar-buttons">
                        @if (Auth::guest())
               
                @else
             <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="{{url('/user-detail/'.Auth::user()->id)}}" class="btn btn-primary "><span class="hidden-sm">My Account</span></a>
                </div>               
                     @endif               
                <!--/.nav-collapse -->




                <div class="navbar-collapse collapse right" id="user-not-mobile">
                    <button type="button" class="btn btn-primary" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"> 
                        <span class="sr-only">Login/SignUp</span>
                        <i class="fa fa-user"></i>
                    </button>
                </div>
                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                
            </div>
            </div>
        </div>
    </div>
            <!--/.nav-collapse -->



            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

            </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        <!-- /.container -->
    </div>
  
</body>






</html>

   