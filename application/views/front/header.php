<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/bootstrap.css'); ?>
<?php echo Html::style('public/css/scrolling-nav.css'); ?>
<?php echo Html::style('public/css/style.css'); ?>



<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "608f039c-042e-4827-b304-abdd9d29e3f8", doNotHash: true, doNotCopy: false, hashAddressBar: false});</script>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5372beda24eaadc6"></script>

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">

<!--start: Header -->
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <!--start: Container -->
        <div class="container">
            <!--start: Row -->
            <div class="row">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/front/home"><?php echo Html::image('public/image/Logo.png', array('alt'=>'', 'class'=>'image', 'style'=>'padding: 5px 0 0 40px'));  ?></a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navigationbar">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="active" ><a href="<?php echo URL::base(); ?>/front/home"> Home</a> </li>
                        <li><a href="<?php echo URL::base(); ?>/front/hiw">How it works </a></li>
                        <li><a href="<?php echo URL::base(); ?>/front/price">Pricing </a></li>
                        <li><a href="<?php echo URL::base(); ?>/front/blog"> Blog </a></li>
                        <li><a href="<?php echo URL::base(); ?>user/login"> Try it Free </a></li>
                        <li><a href="<?php echo URL::base(); ?>user/login"> Log In </a></li>
                    </ul>
                </div>
            </div>
            <!--end: Row -->
        </div>
        <!--end: Container-->
    </nav>

</header>
<!--end: Header-->