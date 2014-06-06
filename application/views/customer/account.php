<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/style.css'); ?>
<style>
textarea { resize: none; }
</style>
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
              <td>Customer Country</td>
            </tr>
            <tr>
              <td> 
			  
			  <? //= Form::input('customerCountryID',$options['0']['customerCountryID'],  array('class'=>'aa_new','style'=>'')); ?>
			
             <?= Form::select('customerCountryID', $dropsvalue,'', array('class'=>'aa_new','style'=>'')); ?>

            </tr>
			
			<tr>
              <td>Customer State</td>
            </tr>
            <tr>
              <td> 
			  <?= Form::input('customerStateProvID',$options['0']['customerStateProvID'],  array('class'=>'aa_new','style'=>'')); ?>
			 
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
               <?= Form::hidden('formid','1',  array('style'=>'')); ?>
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
		 

		 
		  <?= Form::open('customer/account'); ?>
          <table class="change_table" border="0">
            <tr>
              <td><b>Change password</b></td>
            </tr>
			<tr>
              <td style="color:#FF0000;"><?php echo $message; ?></td>
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
			   <?= Form::hidden('formid','2',  array('style'=>'')); ?>
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
         
         <?= Form::open('customer/account'); ?>
		 <table class="change_table">
            <tr>
              <td>
			   
			  <?php if($options[0]['notification']=='1'){ ?>
			    <?= Form::checkbox('notification',1,  true, array('class'=>'','style'=>'')); ?>
			  <?php }else{ ?>
			     <?= Form::checkbox('notification',1,  false, array('class'=>'','style'=>'')); ?>
			  <?php } ?> 
			 
              &nbsp;Recieve weekly campaign performance reports
			   <?= Form::hidden('formid','3',  array('style'=>'')); ?>
			  </td>
            </tr>
            <tr>
			<td>
		      <button type="submit" style="">
	           Submit
		      </button>
			 </td>
			 </tr>
			 </table>
        </div>
      </div>
    </div>
	
	


	
	<?php echo $footer; ?>
	
	
  </div>
</div>



