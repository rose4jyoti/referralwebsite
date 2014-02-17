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
        <h1></h1>
      </div>
     
       <!---<div class="top_line_b">
        <div class="top_line_b_in">
          <ul class="dash">
            <li>Dashboard</li>
            <li>Reward</li>
            <li>Emails</li>
            <li>Appearance</li>
            <li>Integration</li>
          </ul>
        </div>
      </div>
	  ---->
    </div>
	
	<div class="form">
      <div class="top_menu">
        <h1 class="ac_s">Edit Account</h1>
      </div>
    </div>
	
	<div class="change">
      <div class="change_p">
        <div class="change_p_content">
		 

		 
		  <?= Form::open('Customer/account'); ?>
          <table class="change_table" border="0">
            <tr>
              <td>Customer Name </td>
            </tr>
			<tr>
              <td>
			  
			  <?= Form::input('customerName',$options['0']['customerName'],  array('class'=>'aa_new','style'=>'')); ?>
			  </td>
            </tr>
            
            <tr>
              <td>Customer Address1</td>
            </tr>
            <tr>
              <td>
			  

			    <?= Form::textarea('customerAddress1',$options['0']['customerAddress1'],  array('class'=>'aa_new','style'=>'height:100px')); ?>
			  </td>
            </tr>
            <tr>
              <td>Customer Address2</td>
            </tr>
            <tr>
              <td> 
			  <?= Form::textarea('customerAddress2',$options['0']['customerAddress2'],  array('class'=>'aa_new','style'=>'height:100px')); ?>
			 
            </tr>
			<tr>
              <td>Customer City</td>
            </tr>
            <tr>
              <td> 
			  <?= Form::input('customerCity',$options['0']['customerCity'],  array('class'=>'aa_new','style'=>'')); ?>
			 
            </tr>
			<tr>
              <td>Customer StateProvID</td>
            </tr>
            <tr>
              <td> 
			  <?= Form::input('customerStateProvID',$options['0']['customerStateProvID'],  array('class'=>'aa_new','style'=>'')); ?>
			 
            </tr>
			
			<tr>
              <td>Customer CountryID</td>
            </tr>
            <tr>
              <td> 
			  <?= Form::input('customerCountryID',$options['0']['customerCountryID'],  array('class'=>'aa_new','style'=>'')); ?>
			 
            </tr>
			
			<tr>
              <td>Customer FirstName</td>
           
              <td> 
			  Customer LastName
			 
            </tr>
			
			<tr>
              <td> <?= Form::input('customerCFirstName',$options['0']['customerCFirstName'],  array('class'=>'aa_new','style'=>'')); ?></td>
            
              <td> 
			  <?= Form::input('customerCLastName',$options['0']['customerCLastName'],  array('class'=>'aa_new','style'=>'')); ?>
			 
            </tr>
			
			<tr>
              <td>Customer Phoneno.</td>
            </tr>
            <tr>
              <td> 
			  <?= Form::input('customerPhone',$options['0']['customerPhone'],  array('class'=>'aa_new','style'=>'')); ?>
			 
            </tr>
			
			<tr>
              <td>Customer Website</td>
            </tr>
            <tr>
              <td> 
			  <?= Form::input('customerWebsite',$options['0']['customerWebsite'],  array('class'=>'aa_new','style'=>'')); ?>
			
            <tr>
              <td>
               
			   <button type="submit" style=" background: none repeat scroll 0 0 rgba(0, 0, 0, 0); border: medium none; margin: 0 0 0 0px;">
	             <?php echo Html::image('public/image/uaccount.png', array('alt'=>'', 'style'=>'margin: 0px 0px 0px -8px;'));  ?>
		       </button>
			  	<?php //echo Html::image('public/image/chnag.png', array('alt'=>'', 'style'=>'margin: 10px 0 10px 0;'));  ?>
			</td>
            </tr>
          </table>
		  
		     <?= Form::close(); ?>
			 
        </div>
      </div>
    </div>
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="form">
      <div class="top_menu">
        <h1 class="ac_s">Account setting</h1>
      </div>
    </div>
	
	<div class="change">
      <div class="change_p">
        <div class="change_p_content">
		 

		 
		  <?= Form::open('user/changepass'); ?>
          <table class="change_table" border="0">
            <tr>
              <td><b>Change password</b></td>
            </tr>
            <tr>
              <td>Current password:</td>
            </tr>
            <tr>
              <td>
			  
			  <?= Form::password('currentpass','',  array('class'=>'aa_new','style'=>'')); ?>
			  </td>
            </tr>
            <tr>
              <td>New password:</td>
            </tr>
            <tr>
              <td>
			  

			    <?= Form::password('password','',  array('class'=>'aa_new','style'=>'')); ?>
			  </td>
            </tr>
            <tr>
              <td>Confirm new password:</td>
            </tr>
            <tr>
              <td> 
			  <?= Form::password('password_confirm','',  array('class'=>'aa_new','style'=>'')); ?>
			 
            </tr>
            <tr>
              <td>
               <button type="submit" style=" background: none repeat scroll 0 0 rgba(0, 0, 0, 0); border: medium none; margin: 0 0 0 0px;">
	             <?php echo Html::image('public/image/chnag.png', array('alt'=>'', 'style'=>'margin: 0px 0px 0px -8px;'));  ?>
		       </button>
			  	<?php //echo Html::image('public/image/chnag.png', array('alt'=>'', 'style'=>'margin: 10px 0 10px 0;'));  ?>
			</td>
            </tr>
          </table>
		  
		     <?= Form::close(); ?>
			 
        </div>
      </div>
    </div>
	
	 <div class="change_delete">
      <div class="change_p">
        <div class="change_p_content">
          <h1 class="del_ac">Delete account</h1>
          <p class="del_p"> Click here to delete your InviteBox user account and all campaigns. Your subscription will be canceled automatically. </p>
         
		  	<a href="<?php echo URL::base(); ?>/customer/delete2/<?php echo $userid ;?>">
			 <?php echo Html::image('public/image/d_a.png', array('alt'=>'', 'style'=>'margin: 0 0 30px 13px;'));  ?>
			</a>
		  </div>
      </div>
    </div>
    <div class="change">
      <div class="change_p">
        <div class="change_p_content">
          <h1 class="del_ac">Notifications settings</h1>
          <table class="change_table">
            <tr>
              <td><input name="" type="checkbox" value="" /></td>
              <td>&nbsp;Recieve weekly campaign performance reports</td>
            </tr>
          </table>
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



