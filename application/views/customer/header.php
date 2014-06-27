<?php defined('SYSPATH') or die('No direct script access.'); ?>

<style>
ul li a {
border-radius: 0px;
text-decoration: none !important;
}
*{
  box-sizing: content-box !important;
}
body{
font-family: Verdana,Geneva,sans-serif !important;
}

</style>


<?php echo Html::style('public/css/headercss/scrolling-nav.css'); ?>
<?php echo Html::style('public/css/headercss/lucstyle.css'); ?>

<?php echo Html::style('public/css/headercss/bootstrap.css'); ?>

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
                    <a class="navbar-brand" href="/front/home"><?php echo Html::image('public/image/Logo.png', array('alt'=>'', 'class'=>'image', 'style'=>'padding: 8px 0 30px 40px'));  ?></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navigationbar">
                  <?php if(isset($customername)){ ?>

				  
		

          <ul id="menu" class="nav navbar-nav" style="float: left;margin: 0 0 0 295px;">

            <li><a href="<?php echo URL::base(); ?>customer/campaign">Campaigns</a>
			<ul>
			 <?php foreach ($campaigns as $temp) : ?>
              <li><a href="<?php echo URL::base(); ?>customer/dashboard/<?php echo $temp['referralProgDetailsID']; ?>"><?php echo $temp['referralProgTitle']; ?></a></li>	
			 <?php endforeach; ?>	
				
                <li><a href="<?php echo URL::base(); ?>customer/start">Add new Campaigns</a></li> 
              </ul>

			</li>
			<li><a href="<?php echo URL::base(); ?>customer/support">Support</a>
            </li>
			
		   <li><a href="#"><?php echo $customername; ?></a>
              <ul>
                <li><a href="<?php echo URL::base(); ?>customer/account">Account Setting</a></li>
                <li><a href="<?php echo URL::base(); ?>customer/billing">Billing information</a></li>
                <li><a href="<?php echo URL::base(); ?>user/logout">Logout</a> </li>
              </ul>
            </li>
		 </ul> 
				  
                  <?php }else{ ?> 
				   <ul class="nav navbar-nav" style="float: left;margin: 0 0 0 210px;">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="activen" ><a href="<?php echo URL::base(); ?>/front/home"> Home</a> </li>
                        <li><a href="<?php echo URL::base(); ?>/front/hiw">How it works </a></li>
                        <li><a href="<?php echo URL::base(); ?>/front/price">Pricing </a></li>
                        <li><a href="<?php echo URL::base(); ?>/front/blog"> Blog </a></li>
                        <li><a href="<?php echo URL::base(); ?>user/login"> Sign In </a></li>
                    </ul>
				  	<?php }  ?>
					
					
                </div>
            </div>
            <!--end: Row -->
        </div>
        <!--end: Container-->
    </nav>

</header>
<!--end: Header-->