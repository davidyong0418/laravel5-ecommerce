<nav id="sidebar" class="px-0 bg-dark bg-gradient sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="logo-nav-item text-center">
                        <a class="navbar-brand" href="{{url('admin/dashboard')}}">
                            RAFFLE
                        </a>
                        
                    </li>
                    <!-- <li>
                        <h6 class="nav-header">General</h6>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{url('admin/dashboard')}}">
                            <i class="batch-icon batch-icon-browser-alt"></i>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::is('admin/category-view/*') || Request::is('admin/product-view/*') || Request::is('admin/category-view') || Request::is('admin/product-view') ? 'open' : '' }}">
                        <a class="nav-link nav-parent" href="#">
                            <i class="batch-icon batch-icon-layout-content-left"></i>
                            Product Menu
                        </a>
                        <ul class="nav nav-pills flex-column" {{ Request::is('admin/category-view/*') || Request::is('admin/product-view/*') || Request::is('admin/category-view') || Request::is('admin/product-view') ? 'style=display:block' : '' }}>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/category-view/*') || Request::is('admin/category-view') ? 'active' : '' }}" href="{{url('admin/category-view')}}">Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{  Request::is('admin/product-view/*') ||  Request::is('admin/product-view') ? 'active' : '' }}" href="{{url('admin/product-view')}}">Product</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ Request::is('admin/raffle-view') ? 'open' : '' }}">
                        <a class="nav-link nav-parent" href="#">
                            <i class="batch-icon batch-icon-layout-content-left"></i>
                            Raffle Detail
                        </a>
                        <ul class="nav nav-pills flex-column" {{ Request::is('admin/raffle-view') ? 'style=display:block' : '' }}>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/raffle-history') ? 'active' : '' }}" href="#">Raffle History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/raffle-view') ? 'active' : '' }}" href="{{url('admin/raffle-view')}}">Raffle View</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/raffle-result') ? 'active' : '' }}" href="#">Raffle Result</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="nav-item {{ Request::is('admin/user-manage/*') || Request::is('admin/user-manage') ? 'open' : '' }}">
                        <a class="nav-link nav-parent" href="#">
                            <i class="batch-icon batch-icon-layout-content-left"></i>
                            User
                        </a>
                        <ul class="nav nav-pills flex-column" {{ Request::is('admin/user-manage/*') || Request::is('admin/user-manage') ? 'style=display:block' : '' }}>
                            <li class="nav-item ">
                                <a class="nav-link {{ Request::is('admin/user-manage/*') || Request::is('admin/user-manage') ? 'active' : '' }}" href="{{url('admin/user-manage')}}">User manage</a>
                            </li>
                            
                        </ul>
                    </li>







                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/logout')}}">
                            <i class="fa fa-key"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>

                
                
            </nav>

            <div class="right-column">
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <a class="navbar-brand d-block d-sm-block d-md-block d-lg-none" href="#">
                        <img src="{{url('assets/img/logo-dark.png')}}" width="145" height="32.3" alt="QuillPro">
                    </a>
                    <button class="hamburger hamburger--slider" type="button" data-target=".sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle Sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>

                    <!--  DEPRECATED CODE:
                        <div class="navbar-collapse" id="navbarSupportedContent">
                    -->
                    <!-- USE THIS CODE Instead of the Commented Code Above -->
                    <!-- .collapse added to the element -->
                    <div class="collapse navbar-collapse" id="navbar-header-content">
                        <ul class="navbar-nav navbar-language-translation mr-auto">
                            <li class="nav-item dropdown">
                            </li>
                        </ul>
                        
                        <ul class="navbar-nav ml-5 navbar-profile">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbar-dropdown-navbar-profile" data-toggle="dropdown" data-flip="false" aria-haspopup="true" aria-expanded="false">
                                    <div class="profile-name">
                                        Admin
                                    </div>
                                    <div class="profile-picture bg-gradient bg-primary has-message float-right">
                                        <img src="{{url('assets/img/profile-pic.png')}}" width="44" height="44">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-dropdown-navbar-profile">
                                    <li><a class="dropdown-item" href="profiles-member-profile.html">Profile</a></li>
                                    <li>
                                        <a class="dropdown-item" href="mail-inbox.html">
                                            Messages 
                                            <span class="badge badge-danger badge-pill float-right">3</span>
                                        </a>
                                    </li>
                                    <li><a class="dropdown-item" href="profiles-member-profile.html">Settings</a></li>
                                    <li><a class="dropdown-item" href="{{url('admin/logout')}}">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


