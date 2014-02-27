<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/admin/style.css'); ?>
<?php echo Html::style('public/css/admin/navi.css'); ?>

<?php echo Html::script('public/js/admin/jquery-1.7.2.min.js'); ?>
<script type="text/javascript">
$(function(){
	$(".box .h_title").not(this).next("ul").hide("normal");
	$(".box .h_title").not(this).next("#home").show("normal");
	$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
});
</script>

<style>
 #content{
 min-height: 470px;
 }
</style>

<?php 
foreach ($values as $temp) : 
   $facebook=$temp['facebook'];
   $twitter=$temp['twitter']; 
   $linkedin=$temp['linkedin']; 
endforeach; 
?>
 
<div class="wrap">
	<div id="header">
		<div id="top">
			<div class="left">
				<p>Welcome, <strong>Admin</strong> [ <a href="<?php echo URL::base(); ?>/user/logout">logout</a> ]</p>
			</div>
			<div class="right">
				<div class="align-right">
					<!--<p>Last login: <strong>23-04-2012 23:12</strong></p>-->
				</div>
			</div>
		</div>
		<div id="nav">
			<ul>
				<li class="upp"><a href="#">Main control</a>
					<ul>
						<li>&#8250; <a href="">Visit site</a></li>
				
					</ul>
				</li>
			
			
				<li class="upp"><a href="#">Settings</a>
					<ul>
						<li>&#8250; <a href="">Site configuration</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	
	<div id="content">
		<div id="sidebar">
			<div class="box">
				<div class="h_title">&#8250; Main control</div>
				<ul id="home">
				
					<li class="b2"><a class="icon config" href="">Visit site</a></li>
				</ul>
			</div>
			
			<div class="box">
				<div class="h_title">&#8250; Settings</div>
				<ul>
					<li class="b1"><a class="icon config" href="">Site configuration</a></li>
				
				</ul>
			</div>
		</div>
		
		<div id="main">
		


			
			<div class="clear"></div>
			
		

		
			
			<div class="full_w">
				<div class="h_title">Social Links</div>
			
			     <?= Form::open('admin/dashboard'); ?>
					
					<div class="element">
						<label for="name">Facebook</label>
						<?= Form::input('facebook',$facebook,  array('class'=>'text')); ?>
					</div>
					<div class="element">
						<label for="name">Twitter</label>
						<?= Form::input('twitter',$twitter,  array('class'=>'text')); ?>
					</div>
					<div class="element">
						<label for="name">Linked in</label>
					  <?= Form::input('linkedin',$linkedin,  array('class'=>'text')); ?>
					</div>
				

					<div class="entry">
						<button type="submit" class="add">Save page</button> 
					</div>
				</form>
			</div>
			
			
			
			
			
			
		</div>
		<div class="clear"></div>
	</div>

	<!--footer place--->
	
	
	
</div>

 <div id="footer" style="width:97%">
		<div class="left">
			<p>Design: <a href="#"></a> | Admin Panel: <a href="">Softoasis.com</a></p>
		</div>
		<div class="right">
			<p><a href="#">Link 1</a> | <a href="#">Link 2</a></p>
		</div>
	</div>
