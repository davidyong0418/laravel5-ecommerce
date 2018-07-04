        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row nopadding">
                    <!-- <div class="col-md-3 col-sm-6">
                         <h4>User section</h4>

                        <ul> -->
                             <!-- @if (Auth::guest()) -->
                        <!-- <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                           @else
                            <li>{{ Auth::user()->name }}
                            </li>
                          @endif
                        </ul>
 -->
                    <!-- </div> -->
                    <!-- /.col-md-3 -->

                    <div class="col-md-4 col-sm-12 text-center">
                        <h3 class="ededed">About us</h3>
                        <div>
                            <p>
                            We are fast becoming the largest raffle venue on the internet.
                            By creating a user account your will have access to all of the advanced featuers of this amazing venuse.<br/>
                            User accounts are absoultely free, as well as quick and easy to setup<p>
                        </div>
                    </div>
                    <!-- /.col-md-3 -->
                    <div class="col-md-4 col-sm-12 text-center">
                        <div>
                        <h3 class="ededed">Quick Links</h3>
                        <ul>
                            <li><p>Raffle Products<p></li>
                            <li><p>Raffle Resutls<p></li>
                            <li><p>About us<p></li>
                            <li><p>Contact US<p></li>
                            <li><p>Blog<p></li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 text-center">

                        <h3 class="ededed">Subscribe</h4>
                        <p>Enter Your email and get daily updates</p>
                        <div class="row nopadding">
                            <div class="col-md-12">
                                <input type="text" placeholder="Your Email address" class="subscribe-email">
                            </div>
                            <div class="col-md-12">
                                <a href="#" class="btn btn-success subscribe-btn">SUBSCRIBE</a>
                            </div>
                        </div>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->
        <!-- *** COPYRIGHT ***-->
        <div id="copyright">
            <div class="container">
                <div class="col-md-12 text-center">
                    <p>Coypright© 2018 - <a href="#">Raffle Website</a> - All rights reserved</p>

                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE *** -->
    <script src="{{url('js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/jquery.cookie.js')}}"></script>
    <script src="{{url('js/waypoints.min.js')}}"></script>
    <script src="{{url('js/modernizr.js')}}"></script>
    <script src="{{url('js/bootstrap-hover-dropdown.js')}}"></script> 
    <script src="{{url('js/owl.carousel.min.js')}}"></script>
    <script src="{{url('js/front.js')}}"></script>



</body>

</html>