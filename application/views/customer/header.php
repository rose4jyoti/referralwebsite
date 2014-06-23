<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/admin/style.css'); ?>
<?php echo Html::style('public/css/bootstrap.css'); ?>
<?php echo Html::style('public/css/bootstrap-theme.min.css'); ?>


<div class="header_out">
    <div class="header_in">
        <div class="logo">
            <?php echo Html::image('public/image/Logo.png', array(
                'alt' => " ",
                "style" => "width: 300px; height: auto; padding-left: 15px; padding-top: 30px;"
            ));  ?>
        </div>
        <span class="cus_name"> Welcome &nbsp;<?php echo $customername; ?></span>

        <div class="new_ul">
            <ul class="nav nav-pills" id="menu">
                <li><a href="<?php echo URL::base(); ?>/customer/campaign">Campaigns</a>
                    <ul>
                        <?php foreach ($campaigns as $temp) : ?>
                            <li>
                                <a href="<?php echo URL::base(); ?>/customer/dashboard/<?php echo $temp['referralProgDetailsID']; ?>"><?php echo $temp['referralProgTitle']; ?></a>
                            </li>
                        <?php endforeach; ?>

                        <li><a href="<?php echo URL::base(); ?>/customer/start">Add new Campaigns</a></li>
                    </ul>

                </li>

                <li><a href="#">Account</a>
                    <ul>
                        <li><a href="<?php echo URL::base(); ?>/customer/account">Account Setting</a></li>
                        <li><a href="<?php echo URL::base(); ?>/customer/billing">Billing information</a></li>

                    </ul>
                </li>
                <li><a href="<?php echo URL::base(); ?>/customer/support">Support</a>
                </li>

                <li><a href="<?php echo URL::base(); ?>/user/logout">Logout</a></li>
            </ul>
        </div>
    </div>

</div>
	
	