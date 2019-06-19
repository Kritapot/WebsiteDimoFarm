                        <!-- toggle top area -->
                        <div class="hidden-top">
                            <div class="hidden-top-inner container">
                                <div class="row">
                                    <div class="span12">
                                        <ul>
                                            <li><strong>We are available for any custom works this month</strong></li>
                                            <li>Main office: Springville center X264, Park Ave S.01</li>
                                            <li>Call us <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891</li>
                                            <li><a href="{{ url('/administrator') }}"><i class="icon-user"></i>Sign in</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end toggle top area -->

                        <!-- start header -->
                        <header>
                            <div class="container ">
                                <!-- hidden top area toggle link -->
                                <div id="header-hidden-link">
                                    <router-link to="/" class="toggle-link" title="Click me you'll get a surprise"
                                        data-target=".hidden-top"><i></i>Open</router-link>
                                </div>
                                <!-- end toggle link -->
                                <div class="row nomargin">
                                    <div class="span12">
                                        <div class="headnav">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="span4">
                                        <div class="logo">
                                            <router-link to="/"><img :src="`assets/public/assets/img/logo.png`" alt="" class="logo" /></router-link>
                                            <h1>ฟาร์มสุนัขพันธุ์เล็ก เชียงใหม่</h1>
                                        </div>
                                    </div>
                                    <div class="span8">
                                        <div class="navbar navbar-static-top">
                                            <div class="navigation">
                                                <nav>
                                                    <ul class="nav topnav">
                                                        <li>
                                                            <router-link to="/">หน้าหลัก</router-link>
                                                        </li>
                                                        <li class="dropdown">
                                                            <router-link to="/about-us">เกี่ยวกับฟาร์มของเรา</router-link>
                                                        </li>

                                                        <li class="dropdown">
                                                            <a href="#">Portfolio </a>
                                                        </li>
                                                        <li>
                                                            <router-link to="/blogpost">บทความ</router-link>
                                                        </li>
                                                        <li>
                                                            <router-link to="/contact">ติดต่อเรา </router-link>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                            <!-- end navigation -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <!-- end header -->
