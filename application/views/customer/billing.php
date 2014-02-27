<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/style.css'); ?>

<div class="wrapper_out">
  <div class="wrapper_in">
     
	 <?php echo $header ?>
	
	 <div class="top_line">
      <div class="top_line_in">
        <h1></h1>
      </div>
    
    </div>
    <div class="form">
      <div class="top_menu">
        <h1 class="ac_s">Account activation</h1>
      </div>
    </div>
	
	  <div class="change">
      <div class="change_p">
        <div class="change_p_content">
        
        <p class="bil">
         Your current subscription plan is <b>Startup:</b> 100 monthly campaign participants, $19.00 / month.

You are currently using your <b>free trial</b>. You have <b>0</b> days and <b>0 </b>campaign participant spots remaining.
          </p>
         
		 <?php echo Html::image('public/image/act_but.png', array('style'=>'margin:0 15px 0 15px', 'alt'=>''));  ?>
		 <?php echo Html::image('public/image/c_but.png', array('alt'=>''));  ?>

        </div>
      </div>
    </div>
		
	
		<?php echo $footer; ?>
	
	
  </div>
</div>



