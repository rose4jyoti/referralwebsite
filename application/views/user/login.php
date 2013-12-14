<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/style.css'); ?>

<div class="wrapper_out">
  <div class="sign_in_wrapper">
<div class="sign_box">

<div class="sign_box_in">
<div class="logo_b">

  <?php echo Html::image('public/image/dummy-logo.png', array('alt'=>''));  ?>
	
	</div>
	

<? if ($message) : ?>
	
	<h3 class="message" style="background:none !important; color:red !important; padding-left:45px;">
		<?= $message; ?>
	</h3>

<? endif; ?>


<?= Form::open('user/login'); ?>

<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username')), array('class'=>'main_in')); ?>

 <?= Form::password('password','', array('class'=>'main_in')); ?>



<a class="link" href="#">Forgot your password?</a>

<button type="submit" style="background: none repeat scroll 0 0 transparent;
    border: medium none;">
<?php echo Html::image('public/image/ss.jpg', array('alt'=>'', 'class'=>'ss_a'));  ?>
</button>





<p style="color: red; padding: 0px 0px 0px 26px; font: 13px Verdana,Geneva,sans-serif; ">
Don't have an account yet ?<a href="<?php echo URL::base(); ?>/user/create" style="color: red; "> Sign up for free here !</a>
</p>


<?php //echo Html::image('public/image/sign.jpg', array('alt'=>'', 'class'=>'ss_a'));  ?>
<?//= Form::submit('login', 'Sign In'); ?>

<?= Form::close(); ?>


</div>


</div>
       
    </div>
  </div>

