<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/style.css'); ?>

<?php //echo Url::base();?>

<div class="wrapper_out">
  <div class="wrapper_in">
    
	 <?php echo $header; ?>
	 
    <div class="top_line">
      <div class="top_line_in">
        <h1>Contact Us</h1>
      </div>
    </div>
    <div class="form">
      <div class="form_in">
       
      </div>
	  
	 <h1 class="b_heading"> </h1>
		 
	 <h2 style="color:FFFF00"><?php echo $postmessage; ?> </h2>
	  
	  <?= Form::open('front/contact'); ?>
	  
	  <table style=" float: left;">
	  <tr>
	   <td>Email:</td>
	  <td>
	      <?= Form::input('email','',  array('class'=>'aa_new','maxlength'=>'50', 'style'=>'width: 500px;')); ?>
		  </td>
		  
		 </tr>
		 <tr>
	   <td>Name: </td>
	  <td>
	      <?= Form::input('name','',  array('class'=>'aa_new','maxlength'=>'50', 'style'=>'width: 500px;')); ?>
		  </td>
		  
		 </tr>
		 
		<tr>
	   <td>Request Type:</td>
	  <td>
	      <?//= Form::input('contact_no','',  array('class'=>'aa_new','maxlength'=>'50', 'style'=>'width: 500px;')); ?>
		  
		 <?= Form::select('type', array(
  	        'soutien technique'=>'soutien technique',
  	        'demand draft'=>'Demand draft',
           )); ?>
		</td>
		  
		 </tr>
      <tr>
	     <td>Message: </td>
		 <td>
	    <?= Form::textarea('message', '',array('class'=>'aa_new','maxlength'=>'500', 'style'=>'height: 220px; width:500px;')); ?>
		</td>
		</tr>
		
		 <tr>
		 <td>

	        <?php echo Form::submit('submit', 'Submit'); ?>

		</td>
		</tr>
		
	  </table>
	  
	    <?= Form::close(); ?>
	  
	  </div>
	  
	  
    </div>
	
 <?php echo $footer; ?>
	
	
  </div>
</div>
</body>
</html>
