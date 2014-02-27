<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/style.css'); ?>
<?php echo Html::style('public/css/start.css'); ?>

<body>
<div class="wrapper_out">
  <div class="wrapper_in">
   
     <?php echo $header; ?>
   
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
 
     <?php echo $footer; ?>
	
  </div>
</div>

</body>
</html>
