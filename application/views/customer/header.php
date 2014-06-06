<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/style.css'); ?>

<?php if(isset($customername)){ ?>
 <div class="header_out">
      <div class="header_in">
        <a href="<?php echo URL::base(); ?>">
	     <div class="logo">
		 <?php echo Html::image('public/image/dummy-logo.png', array('alt'=>''));  ?>
		</a>
		
		</div>
        <span class="cus_name"> Welcome &nbsp;<?php echo $customername; ?> !</span> 
        <!---ul class="main_nav">
          <li><a href="#">Campaigns</a> </li>
          <li> <a href="#">Account </a></li>
          <li> <a href="#">Support </a></li>
          <li><a href="#"> Logout </a></li>
        </ul--->
        
        <div class="new_ul">
          <ul id="menu">
            <li><a href="<?php echo URL::base(); ?>/customer/campaign">Campaigns</a>
			<ul>
			 <?php foreach ($campaigns as $temp) : ?>
              <li><a href="<?php echo URL::base(); ?>/customer/dashboard/<?php echo $temp['referralProgDetailsID']; ?>"><?php echo $temp['referralProgTitle']; ?></a></li>	
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
			
            <li><a href="<?php echo URL::base(); ?>/user/logout">Logout</a> </li>
          </ul>
        </div>
      </div>
  
  </div>

<?php }else{ ?>  

 	<div class="header_out">
      <div class="header_in">
        <div class="logo">
		
		<?php echo Html::image('public/image/dummy-logo.png', array('alt'=>''));  ?>
		</div>
        <ul class="main_nav">
           <li><a class="active" href="<?php echo URL::base(); ?>/front/home"> Home</a> </li>
          <li> <a href="<?php echo URL::base(); ?>/front/hiw">How it works </a></li>
          <li> <a href="<?php echo URL::base(); ?>/front/price">Pricing </a></li>
          <li><a href="<?php echo URL::base(); ?>/front/blog"> Blog </a></li>
          <li><?php echo Html::anchor('user/login', 'Sign In');?></li>
      
        </ul>
      </div>
    </div>

<?php } ?> 	