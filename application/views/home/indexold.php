<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/style.css'); ?>

<div class="wrapper_out">
<div class="wrapper">

<div class="participation">
<h3><b>invite your friends</b> to enter this giveaway
and get a free mp3 shuffling player</h3>


<div class="search_out">

<table class="ss">
  <tr>
    <td width="144"><input class="in_box_b_c" name="" type="text" /></td>
    <td width="47">
	<a href="#">
	<?php echo Html::image('public/image/search_but.jpg', array('alt'=>''));  ?>
	
	</a>
	</td>
  </tr>
</table>

</div>

<?php //echo Form::open ( 'http://softoasistech.com/dev2013/referral/home/index', array( 'method' => 'post', 'name' =>'reg_frm', 'id' => 'reg_frm', 'enctype' => 'multipart/form-data') ); ?>

<?php echo Form::open('home/index/'.''); ?>


<table width="92%" class="songs_list">
<?php $i=1; ?>
<?php foreach ($contacts as $contact) : ?>
  <tr style="border:1px solid #666;">
    <td width="5%" align="left" valign="middle">
	<?php echo Form::checkbox($contact->id, $contact->email, FALSE); ?>
	
	</td>
    <td width="18%" align="center" valign="middle">
	<b><?php echo $contact->name; ?></b>
	</td>
     <td width="77%" align="center" valign="middle">
	<?php echo $contact->email; ?>
	 </td>  
  </tr>
 <?php $i++; ?> 
<?php endforeach; ?>  
  
</table>
 

<h1 class="achieve_new"><a href="#">Read terms and conditions before participating</a></h1>

</div>

<div class="congratulations">

<?php echo Html::image('public/image/giveaway.jpg', array('alt'=>''));  ?>

<a href="#">

<?php //echo Html::image('public/image/next_but.jpg', array('style'=>'float:right;'));  ?>
<?php 
//$options=array('type' => 'submit', 'label'=>'public/image/next_but.jpg', 'name'=>'public/image/next_but.jpg');
//echo Form::button('save', 'Next', $options); 

 //echo Form::button('save', Html::image('public/image/next_but.jpg',array('style'=>'border:none;')));

?>
<button type="submit" name="save" style="border:none;background:none; cursor:pointer;">
<img style="border:none;" src="/dev2013/referral/public/image/next_but.jpg">
</button>


</a>
</div>


 <?php echo Form::close(); ?>


</div>
</div>

