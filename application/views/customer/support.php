<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/style.css'); ?>

<div class="wrapper_out">
  <div class="wrapper_in">
 
      <?php echo $header ?>
	
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
			  
			     
			   <button type="submit" style=" background: none repeat scroll 0 0 rgba(0, 0, 0, 0); border: medium none; margin: 0 0 0 0px;">
	             <?php echo Html::image('public/image/send.png', array('alt'=>'', 'style'=>'margin: 0px 0px 0px -8px;'));  ?>
		       </button>
			   
               
			  	<?php //echo Html::image('public/image/chnag.png', array('alt'=>'', 'style'=>'margin: 10px 0 10px 0;'));  ?>
			</td>
            </tr>
          </table>
		  
		     <?= Form::close(); ?>
			 
        </div>
      </div>
    </div> 
           

  <?php echo $footer ?>
	
  </div>
</div>



