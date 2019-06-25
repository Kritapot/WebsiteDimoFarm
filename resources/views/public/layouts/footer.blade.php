<footer>
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="widget">
                        <h5 class="widgetheading">ค้นหา</h5>
                        <ul class="link-list">
                            <li><router-link to="/">หน้าหลัก</router-link></li>
                            <li><router-link to="/">บริการของเรา</router-link></li>
                            <li><router-link to="/about-us">เกี่ยวกับฟาร์มของเรา</router-link></li>
                            <li><router-link to="/blogpost">บทความ</router-link></li>
                            <li><router-link to="/contact">ฝากข้อความถึงเรา</router-link></li>
                        </ul>
                    </div>
                </div>
                <div class="span6">
                    <div class="widget">
                        <div class="flickr_badge">
                            <div class="span4">
                                <div class="fb-page" data-href="https://www.facebook.com/DiMoFarm/" data-tabs="timeline" data-width="300px" data-height="200px" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/DiMoFarm/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/DiMoFarm/">DimoFarm</a></blockquote></div>
                            </div>
                        </div>
                        <div class="clear">
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="widget">
                        <h5 class="widgetheading">ติดต่อเราได้ที่</h5>
                        <address>
                            <strong>ดีโม่ฟาร์ม ฟาร์มสุนัขพันธุ์เล็กเชียงใหม่</strong><br>
                        </address>
                        <p>
                            <i class="icon-phone"></i> +66 82 6113223 <br>
                        </p>
                        @if (!empty(Auth::user()))
                                                <span></span>
                                            @else
                                                <li><a href="{{ url('/administrator') }}"><i class="icon-user"></i>Sign in</a></li>
                                            @endif
                    </div>
                </div>
            </div>
        </div>
        <div id="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="span6">
                        <div class="copyright">
                            <p>
                                <span>&copy; DimoFarm - All right reserved.</span>
                            </p>
                            <div class="credits">
                                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <ul class="social-network">
                            <li><a href="#" data-placement="bottom" title="Facebook"><i
                                        class="icon-facebook icon-square"></i></a></li>
                            <li><a href="#" data-placement="bottom" title="Twitter"><i
                                        class="icon-twitter icon-square"></i></a></li>
                            <li><a href="#" data-placement="bottom" title="Linkedin"><i
                                        class="icon-linkedin icon-square"></i></a></li>
                            <li><a href="#" data-placement="bottom" title="Pinterest"><i
                                        class="icon-pinterest icon-square"></i></a></li>
                            <li><a href="#" data-placement="bottom" title="Google plus"><i
                                        class="icon-google-plus icon-square"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
