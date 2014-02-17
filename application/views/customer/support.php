<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/style.css'); ?>

<div class="wrapper_out">
  <div class="wrapper_in">
    <div class="header_out">
      <div class="header_in">
        <div class="logo">
		<?php echo Html::image('public/image/dummy-logo.png', array('alt'=>''));  ?>
		
		
		</div>
        <span class="cus_name"> Welcome &nbsp;<?php echo $customername; ?></span> 
        <!---ul class="main_nav">
          <li><a href="#">Campaigns</a> </li>
          <li> <a href="#">Account </a></li>
          <li> <a href="#">Support </a></li>
          <li><a href="#"> Logout </a></li>
        </ul--->
        
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
        <h1>Support</h1>
      </div>
    
    </div>
    <div class="form">
      <div class="top_menu">
        <h1 class="ac_s">Help</h1>
      </div>
    </div>

	
	<div class="change">
      <div class="change_p">
        <div class="change_p_content">
		 

		 
		  <?= Form::open('Customer/support'); ?>
          <table class="change_table" border="0">
		  
		  <tr>
              <td>Name</td>
            </tr>
			<tr>
              <td>
			  
			  <?= Form::input('name','',  array('class'=>'aa_new','style'=>'')); ?>
			  </td>
            </tr>
           <tr>
              <td>Email</td>
            </tr>
			<tr>
              <td>
			  
			  <?= Form::input('email','',  array('class'=>'aa_new','style'=>'')); ?>
			  </td>
            </tr>
            <tr>
              <td>subject</td>
            </tr>
			<tr>
              <td>
			  
			  <?= Form::input('title','',  array('class'=>'aa_new','style'=>'')); ?>
			  </td>
            </tr>
            <tr>
              <td>Description</td>
            </tr>
            <tr>
              <td>
			  
			  <?= Form::textarea('message','',  array('class'=>'aa_new','style'=>'height:60px')); ?>
			  </td>
            </tr>
            
			
            
            <tr>
              <td>
               <button type="submit" style="  margin: 0 0 0 0px;">
	             Save
		       </button>
			  	<?php //echo Html::image('public/image/chnag.png', array('alt'=>'', 'style'=>'margin: 10px 0 10px 0;'));  ?>
			</td>
            </tr>
          </table>
		  
		     <?= Form::close(); ?>
			 
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



