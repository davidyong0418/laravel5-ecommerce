@include('layouts/header')


<div id="all">
        <div id="content">
                <div class="row nomargin">
                    <div class="col-md-12 nopadding">
                                <img src="{{url('img/header.png')}}" alt="" class="img-responsive header-img">
                        <!-- /#main-slider -->
                    </div>
                </div>


            <!-- *** ADVANTAGES HOMEPAGE *** -->
            
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***-->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12 underline-container">
                            <h2 class="block-title">Featured Raffle Products</h2>
                        <div class="underline-parent">
                             <div class="underline-div">
                            </div>
                             <div class="underline-div underline-div-center">
                            </div>
                             <div class="underline-div">
                            </div>
                        </div>
                        <p class="lead">Explore hundreds of products of your choice</p>
                        </div>
                        
                    </div>
                </div>


                <div class="container">
                    <div class="product-slider">
                      @if(!empty($product))
                      @foreach($product as $value)  
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{{url('/product-detail/'.$value->id)}}">
                                                <img src="{{url('img/'.$value->image)}}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{url('/product-detail/'.$value->id)}}">
                                                <img src="{{url('img/'.$value->image_back)}}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('/product-detail/'.$value->id)}}" class="invisible">
                                    <img src="{{url('img/'.$value->image_back)}}" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="{{url('/product-detail/'.$value->id)}}">{{$value->description}}</a></h3>
                                    <p class="price">${{$value->price}}</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                     @endforeach
                     @endif


                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** GET INSPIRED *** -->
            <div data-animate="fadeInUpBig" class="container" >
                <div class="col-md-12 ">
                    <div class="box slideshow underline-container">
                        <h2 class="block-title">Get Inspired</h2>
                        <div class="underline-parent">
                            <div class="underline-div">
                                &nbsp;
                            </div>
                             <div class="underline-div underline-div-center">
                                &nbsp;
                            </div>
                             <div class="underline-div">
                                &nbsp;
                            </div>
                        </div>
                        <p class="lead">Get the inspiration from our world class designers</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            <div class="item">
                                <a href="javascript:void(0);">
                                    <img src="{{url('img/bannerslider2.png')}}" alt="Get inspired" class="img-responsive">
                                </a>
                                <div class="carousel-caption">
                                    <h1>Recent Winners</h1>
                                   
                                    
                                    <div class="carousel-slider-text">
                                        <a href="#" class="carousel-slider-btn">login</a>
                                    <a href="#" class="carousel-slider-btn">Register</a>
                                        <h1>- players need an account to play </h1>
                                        <h1>and age gate to play, 18 years or older</h1>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="item">
                                <a href="javascript:void(0);">
                                    <img src="{{url('img/bannerslider3.jpg')}}" alt="Get inspired" class="img-responsive">
                                </a>
                                <div class="carousel-caption">
                                    <div class="carousel-caption black">
                                    <h1>Spend Little Win Big</h1>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** GET INSPIRED END *** -->

            <!-- *** BLOG HOMEPAGE *** -->

         <!--    <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">From our blog</h3>

                        <p class="lead">What's new in the world of fashion? <a href="blog.html">Check our blog!</a>
                        </p>
                    </div>
                </div>
            </div> -->

            <div class="container">

                <div class="col-md-12" data-animate="fadeInUp">

                    <div id="blog-homepage" class="row nopadding">
                        <div class="post-header text-center custom-padding underline-container">
                            <h2 class="block-title">Book Your Stay</h2>
                        <div class="underline-parent">
                            <div class="underline-div">
                                &nbsp;
                            </div>
                             <div class="underline-div underline-div-center">
                                &nbsp;
                            </div>
                             <div class="underline-div">
                                &nbsp;
                            </div>
                        </div>
                            <p class="lead">Keep yourself updated with the latest posts</p>
                        </div>
                        <div class="col-sm-4">
                            <div class="post">

                                <img src="{{url('img/post1.png')}}" class="post-img"/>
                                <h4><a href="javascript:void(0);">Fashion now</a></h4>
                                <p class="author-category">By <a href="javascript:void(0);">John Slim</a> in <a href="javascript:void(0);">Fashion and style</a>
                                </p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                    ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="javascript:void(0);" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="post">

                                <img src="{{url('img/post2.png')}}" class="post-img"/>
                                <h4><a href="javascript:void(0);">Fashion now</a></h4>
                                <p class="author-category">By <a href="javascript:void(0);">John Slim</a> in <a href="javascript:void(0);">Fashion and style</a>
                                </p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                    ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="javascript:void(0);" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="post">
                                
                                <img src="{{url('img/post3.png')}}" class="post-img"/>
                                <h4><a href="javascript:void(0);">Who is who - example blog post</a></h4>
                                <p class="author-category">By <a href="javascript:void(0);">John Slim</a> in <a href="javascript:void(0);">About Minimal</a>
                                </p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                    ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="javascript:void(0)" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>

                        </div>

                    </div>
                    <!-- /#blog-homepage -->
                </div>
           </div>

 @include('layouts/footer')