<?php defined('SYSPATH') or die('No direct script access.'); ?>

    <?php echo $header; ?>

    <div class="slider-wrapper">
        <div id="da-slider" class="da-slider">
            <div class="da-slide">
                <h2>Contacts Importer</h2>
                <p>Single sign on with preferred webmail providers to share the campaign with email contacts.</p>
                <a href="#" class="da-link">Read more</a>
                <div class="da-img"><img src="../public/image/parallax-slider/contacts.png" alt="image02" /></div>
            </div>
            <div class="da-slide">
                <h2>Viral Campaigns</h2>
                <p>The best way to acquire new customers faster and with a proven method.</p>
                <a href="<?php echo URL::base(); ?>/front/hiw" class="da-link">Read more</a>
                <div class="da-img"><img src="../public/image/parallax-slider/viral.png" alt="image03" /></div>
            </div>
            <div class="da-slide">
                <h2>Referral Marketing</h2>
                <p>Promote your products or services to new customers through referrals, using word of mouth.</p>
                <a href="#" class="da-link">Read more</a>
                <div class="da-img"><img src="../public/image/parallax-slider/sales.png" alt="image01" /></div>
            </div>
            <nav class="da-arrows">
                <span class="da-arrows-prev"></span>
                <span class="da-arrows-next"></span>
            </nav>
        </div>

    </div>
    <!-- end: Slider -->
    </div>

    <!--start: Wrapper-->
    <!--div id="wrapper">
        <!--start: Container -->
        <div class="container">
            <!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
            <div class="hero-unit">
                <p>
                    "When a recommendation comes from a contact, a friend or family member, consumers are more likely to trust this referrals instead of the commercial, print or publicity they have seen."<br>
                     - 90% of consumers trust peer recommendations<br>
                     - Only 14% trust advertisements &nbsp;
                </p>
            </div>
            <!-- end: Hero Unit -->

            <!-- start: Row -->
            <div class="row">
                <h2 class="text-center">Some of our key features </h2><br>
                <div class="col-lg-4 text-center">
                        <!--i class="ico-ok circle big"></i-->
                        <div class="small-feature-container">
                            <?php echo Html::image('public/image/icons/webmail.png', array('alt'=>'', 'class'=>'small-feature'));  ?>
                        </div>
                        <div class="title"><h3>Contacts Importer</h3></div>
                        <div>
                            <p>
                                Participants sign in with their preferred webmail providers to enter your referral campaign and share with their email contacts.
                            </p>
                        </div>
                </div>

                <div class="col-lg-4">
                    <div class="text-center">
                        <!--i class="ico-ok circle big"></i-->
                        <div class="small-feature-container">
                            <?php echo Html::image('public/image/icons/social.png', array('alt'=>'', 'class'=>'small-feature'));  ?>
                        </div>
                        <div class="title"><h3>Social sharing</h3></div>
                        <p>
                            Participants can easily share your referral campaign with their friends and conatcts on almost 300 different social networks and service providers.
                        </p>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="text-center">
                        <!--i class="ico-ok circle big"></i-->
                        <div class="small-feature-container">
                            <?php echo Html::image('public/image/icons/summary.png', array('alt'=>'', 'class'=>'small-feature'));  ?>
                        </div>
                        <div class="title"><h3>Participant status</h3></div>
                        <p>
                            Participants can see their participation status to your referral campaign with details such as accumulated entries and status of invited contacts.
                        </p>
                        <div class="clear"></div>
                    </div>
                </div>

            </div><br>
            <!-- end: Row -->
            <!-- end: Page Title -->
        </div>
        <div class="container-fluid">
            <div class="row" style="background-color: #e8eff5; padding: 40px 0 30px 0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">The power of referral marketing </h2><br>
                            <p>
                                Recommendations from personal contacts and friends are the most trusted forms of advertising.  While such marketing often happen spontaneously and naturally, it is still possible to influence this through appropriate strategies. This is where we can help you.  <br/>
                                <br>Lucky Referral allows you to run referral campaigns to promote your business to new customers through referrals. Our service includes all the required technology and mechanisms including emails contacts importer, social sharing capabilities to ease the sharing process of your customers.
                                <br><br>All you have to do is to sign up to get an account and configure your campaign through our simple step by step wizard and copy and paste a little piece of code somewhere in your website and “voilà “ you are all set to go and start to share your referral program with your customers!
                            </p>

                        </div>
                        <div class="col-lg-12 text-center">
                            <a class="btn btn-success btn-lg" style="width: 200px" href="<?php echo URL::base(); ?>/user/login">Sign-up for free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- start: Row -->
            <div class="row">

                <!-- start: Icon Boxes -->
                <div class="row">

                    <!-- start: Icon Box Start -->
                    <div class="col-lg-6 icons-box-feature">
                        <div class="col-lg-3">
                            <?php echo Html::image('public/image/icons/widget.png', array('alt'=>'', 'class'=>'image', 'style'=>'padding: 15px 40px 5px 5px'));  ?>
                        </div>
                        <div class="col-lg-9">
                            <h3>Website Widgets</h3>
                            <p>Select from multiple referral program widgets to integrate with your website. Integrate as popup, slider box, embed as iframe or inline referral widget.</p>
                        </div>
                    </div>
                    <!-- end: Icon Box -->

                    <!-- start: Icon Box Start -->
                    <div class="col-lg-6 icons-box-feature">
                        <div class="col-lg-3">
                            <?php echo Html::image('public/image/icons/custom.png', array('alt'=>'', 'class'=>'image', 'style'=>'padding: 15px 40px 5px 5px'));  ?>
                        </div>
                        <div class="col-lg-9">
                            <h3>Fully customizable</h3>
                            <p>Fully customizable email templates, campaign views, and referral invite content through built-in editor. Step-by-step wizard.</p>
                        </div>
                    </div>
                    <!-- end: Icon Box -->
                </div>
                <div class="row">
                    <!-- start: Icon Box Start -->
                    <div class="col-lg-6 icons-box-feature">
                        <div class="col-lg-3">
                            <?php echo Html::image('public/image/icons/analytics.png', array('alt'=>'', 'class'=>'image', 'style'=>'padding: 15px 40px 5px 5px'));  ?>
                        </div>
                        <div class="col-lg-9">
                            <h3>Analytics</h3>
                            <p>Get detailed customer referral program analytics including invites filtered by referral campaigns. Identify most influential referrers and track data to individual customer level.</p>
                        </div>
                    </div>
                    <!-- end: Icon Box -->

                    <!-- start: Icon Box Start -->
                    <div class="col-lg-6 icons-box-feature">
                        <div class="col-lg-3">
                            <?php echo Html::image('public/image/icons/automated.png', array('alt'=>'', 'class'=>'image', 'style'=>'padding: 15px 40px 5px 5px'));  ?>
                        </div>
                        <div class="icons-box-vert-info">
                            <h3>Fully automated</h3>
                            <p>Automated referral tracking, email notifications including enrollment, rewards and reminders. Easily manage referrals and participants.</p>
                        </div>
                    </div>
                    <!-- end: Icon Box -->
                </div>
                <div class="row">
                    <!-- start: Icon Box Start -->
                    <div class="col-lg-6 icons-box-feature">
                        <div class="col-lg-3">
                            <?php echo Html::image('public/image/icons/mobile.png', array('alt'=>'', 'class'=>'image', 'style'=>'padding: 15px 40px 5px 5px'));  ?>
                        </div>
                        <div class="icons-box-vert-info">
                            <h3>Mobile Compatible</h3>
                            <p>Referral programs work on mobile devices as well and can also be integrated with mobile applications.</p>
                        </div>
                    </div>
                    <!-- end: Icon Box -->
                    <!-- start: Icon Box Start -->
                    <div class="col-lg-6 icons-box-feature">
                        <div class="col-lg-3">
                            <?php echo Html::image('public/image/icons/multiple.png', array('alt'=>'', 'class'=>'image', 'style'=>'padding: 15px 40px 5px 5px'));  ?>
                        </div>
                        <div class="icons-box-vert-info">
                            <h3>Multiple Campaign Types</h3>
                            <p>Select from 3 types of referral programs - Instant reward campaign, sweepstake and giveaway campaign or goal based referral campaign.</p>
                        </div>
                    </div>
                    <!-- end: Icon Box -->
                </div>
                <!-- end: Icon Boxes -->
                <div class="clear"></div>
            </div>
            <!-- end: Row -->

            <hr>

        </div>
        <!--end: Container-->

    <!--/div>
    <!-- end: Wrapper  -->

    <?php echo $footer; ?>


<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<?php echo Html::script('../public/js/jquery-1.8.2.js'); ?>
<?php echo Html::script('../public/js/bootstrap.js'); ?>
<?php echo Html::script('../public/js/flexslider.js'); ?>
<?php echo Html::script('../public/js/carousel.js'); ?>
<?php echo Html::script('../public/js/jquery.cslider.js'); ?>
<?php echo Html::script('../public/js/slider.js'); ?>
<?php echo Html::script('../public/js/custom.js'); ?>
<!-- end: Java Script -->

<script type="text/javascript" src="http://example.com/widget/data.js"></script>

