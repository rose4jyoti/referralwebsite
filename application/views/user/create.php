<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/style.css'); ?>
<script>
function copyText()
{
document.getElementById("web").style.display="";
}
</script>
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
        <h1>Sign up </h1>
      </div>
    </div>
    <div class="form">
      <div class="form_in">
        <div class="leftnew">
		
		<span style="background-color: #C2C2C2;color:red;">
		 <? if ($message) : ?>
	    <h3 class="message">
		<?= $message; ?>
	     </h3>
         <? endif; ?>
		 </span>
		
		<?= Form::open('user/create'); ?>
		
          <table class="input_form">
		     
	
			 <tr>
              <td width="33%"><?= Form::label('username', 'Email'); ?></td>
              <td width="67%">
			  
			   <?= Form::input('username', HTML::chars(Arr::get($_POST, 'username')), array('class'=>'aa')); ?>
               <div class="error">
	          <?= Arr::get($errors, 'username'); ?>
               </div>
			  
			  </td>
            </tr>
            

            
	       <!----
            <tr>
              <td width="33%"> 
			  <?= Form::label('email', 'Email '); ?> </td>
              <td width="67%"> 
			  <?= Form::input('email', HTML::chars(Arr::get($_POST, 'email')),array('class'=>'aa')); ?>
                <div class="error">
	           <?= Arr::get($errors, 'email'); ?>
			   </div>
			   
			   </td>
            </tr>
			---->
	
		
             <!----
		     <?= Form::hidden('email', 'dd'); ?>
		       <div class="error">
	           <?= Arr::get($errors, 'email'); ?>
			   </div>
		      ----->
			
            <tr>
              <td> <?= Form::label('customerCFirstName', 'First Name '); ?> </td>
              <td width="67%">
			  
			   <?= Form::input('customerCFirstName', HTML::chars(Arr::get($_POST, 'customerCFirstName')), array('class'=>'aa')); ?>
			  
			  </td>
            </tr>
            <tr>
              <td><?= Form::label('customerCLastName', 'Last Name '); ?> </td>
              <td width="67%"> <?= Form::input('customerCLastName', HTML::chars(Arr::get($_POST, 'customerCLastName')), array('class'=>'aa')); ?></td>
            </tr>
            <tr>
              <td><?= Form::label('password', 'Password'); ?> </td>
              <td width="67%"> 
			  <?= Form::password('password','', array('class'=>'aa')); ?>
                <div class="error">
	           <?= Arr::path($errors, '_external.password'); ?>
               </div>
			   </td>
            </tr>
            <tr>
              <td><?= Form::label('password_confirm', 'Confirm Password'); ?>  </td>
              <td width="67%">
			   <?= Form::password('password_confirm','', array('class'=>'aa')); ?>
              <div class="error">
	           <?= Arr::path($errors, '_external.password_confirm'); ?>
              </div>
			  </td>
            </tr>
            <tr>
              <td><?= Form::label('customerWebsite', 'Website'); ?></td>
              <td width="67%">
			  
		      <?= Form::input('customerWebsite', HTML::chars(Arr::get($_POST, 'customerWebsite')),array('class'=>'aa', 'onclick'=>'copyText()')); ?>
                <h1 id="web" class="small" style="display:none">URL of your website (e.g. http://example.com/)</h1></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>
			  <!---
			  <?php echo Html::image('public/image/sign.jpg', array('class'=>'ss'));  ?>
              ------>
			  
			  <button type="submit" name="save" style="border:none;background:none; cursor:pointer;">
			   <?php echo Html::image('public/image/sign.jpg', array('style'=>'border:none;','class'=>'ss'));  ?>
			  
                </button>
			  </td>
            </tr>
          </table>
        </div>
        <div class="rightn">
          <h1> How does free trial work? </h1>
          <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release. </p>
        </div>
      </div>
	  <h1 class="b_heading">Signup now to start your free trial and start to earn new emails!</div>
	  
	  
    </div>
    <div class="foter">
      <div class="foter_in">
        <div class="foter_content">
          <div class="foter_content_in">
            <ul>
              <li>About US </li>
              |
              <li> Q&A </li>
              |
              <li> Terms of Use</li>
              |
              <li>Privacy Policy</li>
              |
              <li>Contact US </li>
             
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
