<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- start: Footer Menu -->
<div id="footer-menu" class="hidden-tablet hidden-phone" style="float:left; width:100% !important">

    <!-- start: Container -->
    <div class="container">

        <!-- start: Row -->
        <div class="row">

            <!-- start: Footer Menu Logo -->
            <div class="col-lg-1">
                <div>
                </div>
            </div>
            <!-- end: Footer Menu Logo -->

            <!-- start: Footer Menu Links-->
            <div class="col-lg-10">
                <div id="footer-menu-links">
                    <ul>
                        <li><a class="special" href="<?php echo URL::base(); ?>/front/tou"> Terms of Use</a></li>
                        <li><a class="special" href="<?php echo URL::base(); ?>/front/privacypolicy"> Privacy Policy</a></li>
                        <li><a class="special" href="<?php echo URL::base(); ?>/front/contact"> Contact US</a></li>
                    </ul>
                </div>
            </div>
            <!-- end: Footer Menu Links-->

            <!-- start: Footer Menu Back To Top -->
            <div class="col-lg-1">

                <div id="footer-menu-back-to-top">
                    <a href="#"></a>
                </div>

            </div>
            <!-- end: Footer Menu Back To Top -->

        </div>
        <!-- end: Row -->

    </div>
    <!-- end: Container  -->

</div>
<!-- end: Footer Menu -->

<!-- start: Footer -->
<div id="footer" style="float:left; width:100% !important;">
    <!-- start: Container -->
    <div class="container">
        <!-- start: Row -->
        <div class="row">
            <!-- start: About -->
            <div class="col-lg-3">
                <h3>About Us</h3>
                <small>
                    <p>
                        Based in Montreal, Canada, the Lucky Referral team created this web service to first response to an internal need. The idea was to develop a tool that would enable us to run referral campaigns that would use of all the latest technologies to growth our customer base. The results were astonishing!
                    </p>
                </small>
            </div>
            <!-- end: About -->

            <!-- start: Photo Stream -->
            <div class="col-lg-3">

                <h3>We are here!</h3>
                <div id="small-map-container"><a class="special" href="<?php echo URL::base(); ?>/front/contact"></a></div>
                <iframe id="small-map" width="210" height="210" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://maps.google.pl/maps?f=q&amp;source=s_q&amp;hl=pl&amp;geocode=&amp;q=Montreal,+&amp;iwloc=near&amp;output=embed"></iframe>

            </div>
            <!-- end: Photo Stream -->

            <div class="col-lg-6" style="width:40% !important">

                <!-- start: Follow Us -->
                <h3>Follow Us!</h3>
                <ul class="social-grid">
                    <li>
                        <div class="social-item">
                            <div class="social-info-wrap">
                                <div class="social-info">
                                    <div class="social-info-front social-twitter">
                                        <a href="http://twitter.com"></a>
                                    </div>
                                    <div class="social-info-back social-twitter-hover">
                                        <a href="http://twitter.com"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="social-item">
                            <div class="social-info-wrap">
                                <div class="social-info">
                                    <div class="social-info-front social-facebook">
                                        <a href="http://facebook.com"></a>
                                    </div>
                                    <div class="social-info-back social-facebook-hover">
                                        <a href="http://facebook.com"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- end: Follow Us -->

                <!-- start: Newsletter -->
                <form id="newsletter">
                    <h3>Newsletter</h3>
                    <p>Please leave us your email</p>
                    <label for="newsletter_input">@:</label>
                    <input type="text" id="newsletter_input"/>
                    <input type="submit" id="newsletter_submit" value="submit">
                </form>
                <!-- end: Newsletter -->
            </div>
        </div>
        <!-- end: Row -->
    </div>
    <!-- end: Container  -->
</div>
<!-- end: Footer --> 

<!-- start: Copyright -->
<div id="copyright">
    <!-- start: Container -->
    <div class="container">
        <p>Copyright ©2014 Lucky Referral. All rights reserved.</p>
    </div>
    <!-- end: Container  -->
</div>
<!-- end: Copyright -->