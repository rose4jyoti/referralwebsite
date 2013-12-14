<?php defined('SYSPATH') or die('No direct script access.'); ?>


<div class="register">
	<!-- SIGNUP START -->
<h1 style="color:red;">==Registration page==</h1>
 <h3>Please fill the form to register !</h3>
			<?php echo Form::open ( 'http://localhost/kohana/register/index', array( 'method' => 'get', 'name' =>'reg_frm', 'id' => 'reg_frm', 'enctype' => 'multipart/form-data') ); ?>
           
			<table>
			<tr>
			<td>
			<h2>Username</h2>
			</td>
			<td>
			<?php echo Form::input('username'); ?>
			<!--<input name="username" id="rusername" type="text" autocomplete="on" value="" title="<?php echo __( 'Enter your username here' ); ?>" />--->
            </td>
			</tr>
			<tr>
			<td>
			<h2>Password</h2>
			</td>
			<td>
			<?php echo Form::password('password'); ?>
			<!---<input name="password" id="rpassword" type="password" value="" title="<?php echo __( 'Enter your password here' ); ?>" />--->
            </td>
			</tr>
			<tr>
			<td>
			<h2>First name</h2>
			</td>
			<td>
			<?php echo Form::input('firstname'); ?>
			<!----<input name="firstname" id="rfirstname" type="text" value="" title="<?php echo __( 'Enter your First name here' ); ?>" />-->
            </td>
			</tr>
			<tr>
			<td>
			<h2>Last name</h2>
			</td>
			<td>
			<?php echo Form::input('lastname'); ?>
			<!---<input name="lastname" id="rlastname" type="text" value="" title="<?php echo __( 'Enter your Last name here' ); ?>" />---->
            </td>
			</tr>
			
			<table>
			
								
			<input name="rsignup" id="rsignup" type="submit" value="<?php echo __( 'Join' ); ?>" title="<?php echo __( 'Join' ); ?>" />
						
			<?php echo Form::close(); ?>			

	<!-- SIGNUP END -->
</div>
