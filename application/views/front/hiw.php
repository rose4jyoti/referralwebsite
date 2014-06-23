<?php defined('SYSPATH') or die('No direct script access.'); ?>



<?php echo $header; ?>


<div class="container-fluid">
    <div class="row">
        <!-- start: Page Title -->
        <div id="page-title">
            <div id="page-title-inner">
                <!-- start: Container -->
                <div class="container">

                </div>
                <!-- end: Container  -->
            </div>
        </div>

        <div class="container-fluid">
            <div class="row" style="background-color: #f5f5f5; padding: 40px 0 30px 0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="text-center">Grow your business using referral marketing</h1><br>

                            <p>The first thing that will make a referral program successful is the incentive offered to participants.  So you need to come up with a reward idea that will motivate people to enter your program such as a free useful giveaway, a chance to win a special price or something that provides a sense of uniqueness or VIP access. </p>
                            <p>The idea is to trigger people’s motivation or eagerness to compete by offering them an opportunity to obtain something valuable for them. It could be a grand prize, discount coupons or codes, access to special features of a SaaS.</p>
                            <p>So once you define what you will offer, Lucky Referral allows you to run different types of referral program. Here they are...</p>
                        </div>
                        <div class="col-lg-12 text-center" style="padding-top: 20px">
                            <a class="btn btn-success btn-lg" style="width: 400px" href="<?php echo URL::base(); ?>/user/create">Start your 14 days free trial now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" style="background-color: #fff; padding: 40px 0 30px 0">
                <div class="container">
                    <div class="row">
                        <h2>Instant reward program</h2><br>
                        <div class="col-lg-8">
                            <p>
                                You can reward your customers immediately as they enter your referral campaigns. This type of referral program is the easiest to integrate and is an additional incentive to motivate participants to enter your referral campaigns.
                            </p>
                            <p>
                                You can automatically reward the participants by having our platform sending an email once they enter your referral campaign.  The email can be configured by you to contain whatever you want to offer as an instant reward. You can include links, promo codes or indications to get access to special features. Our referral platform allows you to upload a list of promo codes that can be included in your instant reward email.
                            </p>

                        </div>
                        <div class="col-md-4">
                            <?php echo Html::image('public/image/instant.png', array('alt'=>'', 'class'=>'image'));  ?>
                        </div>
                        <div class="col-lg-12 text-center" style="padding-top: 20px">
                            <a class="btn btn-info btn-lg" style="width: 200px" href="<?php echo URL::base(); ?>/user/create">Sign-up for free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" style="background-color: #f5f5f5; padding: 40px 0 30px 0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <?php echo Html::image('public/image/sweepstake.png', array('alt'=>'', 'class'=>'image'));  ?>
                        </div>
                        <div class="col-md-8">
                            <h2>Sweepstakes and giveaways</h2><br>
                            <p>
                                This type of referral campaign offers a chance to win to any participants. The chances of winning are proportional to the number of entries the participant earns during the campaign and the winners are drawn. Extra entries can be accumulated for sharing with mail contacts and social friends.
                            </p>
                            <p>
                                You can also set up an instant reward to offer an additional incentive to participants in order to motivate people to enter your program.
                            </p>
                            <p>
                                The winner can be randomly picked up by our system or by you. Once the winner is identified, you must contact them manually as you’ll have the full access to contact data of all participants.
                            </p>
                        </div>
                        <div class="col-lg-12 text-center" style="padding-top: 20px">
                            <a class="btn btn-success btn-lg" style="width: 200px" href="<?php echo URL::base(); ?>/user/create">Sign-up for free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" style="background-color: #fff; padding: 40px 0 30px 0">
                <div class="container">
                    <div class="row">
                        <h2>Goal based referral program</h2><br>
                        <div class="col-lg-8">
                            <p>
                                This type of referral campaign required the participants to achieve a specific numbers of referees to enter the campaign.  This type of reward gives you a better control on ROI since you can define the referral goal so the value does not exceed the cost of the reward.
                            </p>
                            <p>
                                You can also set up an instant reward to offer an additional incentive to participants in order to motivate people to enter your program.
                            </p>
                            <p>
                                The participants can automatically receive a notification by email as soon as they reach the target set by you in the system.  The email can be configured by you to contain whatever you want to offer the reward for achieving the goal you set. You must specify in the email what the participant is rewarded with and how to get the reward. If you prefer to contact them manually, you can also proceed this way as you will have full access to contact data of all participants.
                            </p>

                        </div>
                        <div class="col-md-4">
                            <?php echo Html::image('public/image/goalbased.png', array('alt'=>'', 'class'=>'image'));  ?>
                        </div>
                        <div class="col-lg-12 text-center" style="padding-top: 20px">
                            <a class="btn btn-info btn-lg" style="width: 200px" href="<?php echo URL::base(); ?>/user/create">Sign-up for free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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


