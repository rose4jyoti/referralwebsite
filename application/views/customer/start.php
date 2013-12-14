<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/style.css'); ?>
<?php echo Html::style('public/css/start.css'); ?>

<body>
<div class="wrapper_out">
  <div class="wrapper_in">
    <div class="header_out">
      <div class="header_in">
        <div class="logo">
		<?php echo Html::image('public/image/dummy-logo.png', array('alt'=>''));  ?>
		
		
		</div>
          <span class="cus_name"> Welcome &nbsp;<?php echo $customername; ?></span> 
         
        <div class="new_ul">
          <ul id="menu">
            <li><a href="#">Campaigns</a>
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
    <div class="top_line">
	
      <div class="top_line_in">
        <h1>Step 1: Select campaign type</h1>
      </div>
	  
	  
      <div class="top_line_b">
        <div class="top_line_b_in">
          <ul class="dash">
            <li><a class="custlink" style="color:#000000;" href="<?php echo URL::base(); ?>/customer/start">Campaign</a>
			<b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/reward">Reward</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/emails">Emails</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/appearance">Appearance</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/integration">Integration</a>
          </ul>
        </div>
      </div>
	  
	  
    </div>







<div class="main" >
   
   
     <div class="form">
      <div class="form_in">
        
	<!--------
	  <a href="<?php echo URL::base(); ?>/customer/reward/3">
        <div class="instant_reward">
        <h1>Instant reward</h1>
		
	<?php echo Html::image('public/image/share.jpg', array('alt'=>'', 'class'=>'new_cam_image')); ?>

       <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the.<br /><br />
   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
        
        </div>
	 </a>
	 ------->
		
     <a href="<?php echo URL::base(); ?>/customer/start/1"> 
        <div class="instant_reward">
        <h1>Goal based reward</h1>
		<?php echo Html::image('public/image/share.jpg', array('alt'=>'', 'class'=>'new_cam_image')); ?>
         
       <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the.<br /><br />
   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
  
        </div>
	</a>
		
	<!------------------
	<a href="<?php echo URL::base(); ?>/customer/reward/4">
       <div class="instant_reward">
        <h1>Referral Contest</h1>
       
     <?php echo Html::image('public/image/share.jpg', array('alt'=>'', 'class'=>'new_cam_image')); ?>
	 
       <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the.<br /><br />
   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
        </div>
	</a>
	------------->
	
     <a href="<?php echo URL::base(); ?>/customer/start/2">
        <div class="instant_reward">
        <h1>Sweeptakes and Giveways</h1>
		
	<?php echo Html::image('public/image/share.jpg', array('alt'=>'', 'class'=>'new_cam_image')); ?>
       <!--- <img class="new_cam_image" src="image/share.jpg" alt="" />--->
         
       <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the.<br /><br />
   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
        
        </div>
	 </a>
	 
	 
   
      </div>
    </div>
	
</div>
 

 <div class="foter">
      <div class="foter_in">
        <div class="foter_content">
          <div class="foter_content_in">
            <ul>
              <li><a class="special" href="<?php echo URL::base(); ?>/front/about">About US </a></li>
              |
              <li><a class="special" href="<?php echo URL::base(); ?>/front/quality"> Q&A </a></li>
              |
              <li><a class="special" href="<?php echo URL::base(); ?>/front/tou"> Terms of Use</a></li>
              |
              <li><a class="special" href="<?php echo URL::base(); ?>/front/privacypolicy"> Privacy Policy</a></li>
              |
              <li><a class="special" href="<?php echo URL::base(); ?>/front/contact"> Contact US</a></li>
             
            </ul>
            <div class="socil_icon">
			<?php echo Html::image('public/image/social_icon.png', array('alt'=>''));  ?>
			</div>
            
            <p class="copy">Copyright ©2010-2013 Referral. All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</body>
</html>
