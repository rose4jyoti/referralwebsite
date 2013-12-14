<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/style.css'); ?>

<?php //echo Url::base();?>

<div class="wrapper_out">
  <div class="wrapper_in">
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
          <!---<li> <a href="#">Sign In</a></li>--->
        </ul>
      </div>
    </div>
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
