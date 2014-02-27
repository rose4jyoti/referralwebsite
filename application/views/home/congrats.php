<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/style.css'); ?>
<?php echo Html::style('public/css/page7.css'); ?>

<!-----social sharing------------>
<?php echo Html::style('public/css/SuperSocialShare.css'); ?>
<?php echo Html::script('public/js/jquery.js'); ?>
<?php echo Html::script('public/js/SuperSocialShare.js'); ?>

<?php 
foreach ($options as $temp) :
 if($temp['referralProgImageOrder']=='3'){
    $img3=$temp['referralProgImage'];
 }
endforeach; ?>								  
<div class="wrapper_out">
  <div class="wrapper_in" style="width:auto;">
       
    <!------
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
        
        </ul>
      </div>
    </div>
	
	
	<div class="top_line">
      <div class="top_line_in">
        <h1> </h1>
      </div>

    </div>
   ------>
   
   
	
<!-------------------start contents----------------->

 <div class="block_out" style="width:auto;">
   
	 <div class="block3" style="margin: 0px;">
               
    <div class="img3" style="margin: 2px 2px 2px 2px;">
                
                	<div class="img_in">
                   <div class="congratulations" style="min-height:635px">

                 <h1>congratulations</h1>
                 <h2>your invitations have been send</h2>
<h3>You are now entered in the Giveaway</h3>

<h4>You will receive your <b>FREE MP3 shuffing player</b> when 
<b>   78</b> 

of your friends will have
<b>
   enter this campaign on</b> 

 the giveaway</h4>

 <?php if(isset($img3)){ ?>
<img height="168px" width="162px" style=" float: left; margin: 0 0 0 40px;padding: 59px 0 57px;width: 231px;" src="<?php echo URL::site("/uploads/$img3") ?>" alt="Uploaded avatar" />
<?php }else{ ?>
<?php echo Html::image('public/image/1319401754_music_is_love_by_beau.jpg', array('style'=>'margin: 0 0 0 40px;
    padding: 59px 0 57px; width: 231px;'));  ?>
<?php }?>
										

                  </div>
				  
<div class="participation_new">
<h1>participation status</h1>

<div class="contact_in">
<span>Contacts Invited</span>
<b><?php echo $countsent?></b>

</div>


<div class="contact_in">
<span>Contacts registered</span>
<b><?php echo $countregistered ?>/
<?php echo $counttotal ?>
 
</b>

</div>


<div class="contact_in">
<span>Time Left</span>
<?php
 //$date=$created[0]['refProgCreatedDate'];
  $date1=$created[0]['startTime'];
  $date2=$created[0]['endTime'];
//Convert to date
//$seconds = strtotime($date) - time();
$seconds = strtotime($date2) - strtotime($date1);

$days = floor($seconds / 86400);
$seconds %= 86400;
$hours = floor($seconds / 3600);
$seconds %= 3600;
$minutes = floor($seconds / 60);
$seconds %= 60;

//echo "$days days and $hours hours and $minutes minutes and $seconds seconds";
?>
<b><?php echo $days; ?>D <?php echo $hours; ?>H <?php echo $minutes; ?>M</b>


<?php
    /*
    $now = time(); // or your date as well
     $your_date = strtotime("2013-12-27");
     $datediff = $now - $your_date;
     echo floor($datediff/(60*60*24));
	*/
?>


</div>


<!---div class="search_out">

<table class="ss">
  <tr>
    <td width="144"><input class="in_box_b" name="" type="text" /></td>
    <td width="47"><a href="#">
	
	<img src="/dev2013/referral/public/image/search_but.jpg" alt="" />
	
	
	</a></td>
  </tr>
</table>




</div--->



  <div class="ss_out_new">
							<h4 class="rr">
							
							 <?= Form::open('home/congrats', array('style'=>'margin:0px')); ?>
                              <?= Form::input('key','',  array('class'=>'new_in_box')); ?>
							  <!---<input type="text" class="new_in_box" name="">---->
							  <?php echo Form::hidden('formid', '1'); ?>
							   <?php echo Form::hidden('id', $id); ?>
							  <button style="border:none; background:none;height: 22px;width: 28px;" type="submit">
							  <img style=" float: left;margin: 0; padding: 4px;" src="/dev2013/referral/public/image/search_but.png" alt="">
							  </button>							  
							<?= Form::close(); ?>
							
                               <!--- <a href="#">
								<img style=" float: left; margin: 0; padding: 4px;" src="/dev2013/referral/public/image/search_but.png" alt="">
								</a>
								---->
								
								
								
                             </h4>
							</div>

<div class="song_over">

<table class="songs_list">
  <tbody>
  
  <?php //print_r($contacts); ?>
  
 <?php $i=1;?> 
  <?php foreach ($contacts as $temp) : ?>	

   <tr class="no_back">
    <td style=" float: left;width: 75px;padding: 0 0 0 3px;text-align: left;" class="td1" valign="middle" align="left"><b><?php echo $temp['referredName']; ?></b></td>
    <td style=" float: left;width: 140px;text-align: left;" class="td2" valign="middle" align="center"><?php echo $temp['referredEmail']; ?> </td>
     <td style="float:left;" width="5%" valign="middle" align="center">
	  
	  <img alt="" src="/dev2013/referral/public/image/ok.jpg">	 
	  
	 </td>
    <td style="float:left;" width="10%" valign="middle" align="center">
	<span>
	
	<?php //echo $temp['sent_status'] ?>
	<?php 
    $ss=$temp['sent_status']; 
	if($ss=='1'){
	 echo 'Sent';
	}
	else{
	  echo 'Not Invited';
	}
	
	?>
	</span></td>
    <td style="float:left;" width="15%">
	
   
    <?= Form::open('home/congrats'); ?>
	<?php $temp=$temp['referredEmail']; ?>
   
	<?php echo Form::hidden($i, $temp); ?>
    <?php echo Form::hidden('formid', '2'); ?>
	
	<button type="submit" style="cursor:pointer;background: none repeat scroll 0 0 rgba(0, 0, 0, 0); border: medium none; ">

	 <?php if($ss==1){
	    echo Html::image('public/image/remind.png', array('alt'=>'', 'class'=>'r_image'));
	 }
	 else{
	  
	   echo Html::image('public/image/invite.png', array('alt'=>'', 'class'=>'r_image'));
	 }
	?>
	
    </button>
    <?= Form::close(); ?>
	   

     <!---<img class="r_image" alt="" src="/dev2013/referral/public/image/remind.png">--->	
	</td>
   </tr>					  

 <?php endforeach; ?>
  

  <!---
   <tr class="no_back">
    <td width="17%" valign="middle" align="left"><b>Staphane</b></td>
    <td width="35%" valign="middle" align="center">Staphane@gmail.com</td>
      <td width="9%" valign="middle" align="center">
	  
	  <img alt="" src="/dev2013/referral/public/image/ok.jpg">	 
	  
	  </td>
    <td width="14%" valign="middle" align="center"><span>Sent</span></td>
    <td width="25%">
	<img class="r_image" alt="" src="/dev2013/referral/public/image/remind.png">	
	</td>
  </tr>
  
   <tr class="with_back">
    <td width="17%" valign="middle" align="left"><b>Staphane</b></td>
    <td width="35%" valign="middle" align="center">Staphane@gmail.com</td>
      <td width="9%" valign="middle" align="center"><img alt="" src="/dev2013/referral/public/image/ok.jpg"></td>
    <td width="14%" valign="middle" align="center"><span>Registered</span></td>
    <td width="25%">
	
	<img class="r_image" alt="" src="/dev2013/referral/public/image/remind.png">	
	
	</td>
  </tr>
  ---->


  
</tbody></table>

</div>

<h1 class="achieve"> increase your chances to WIN and share on social!</h1>
<div class="link_url"><h3>Your unique referral link:</h3>
<input type="text" name="" value="abc" class="url" id="uniquerl">

<!------Filling value in text box to unique referral link---->
<script type="text/javascript">
 //val=document.getElementById('uniquerl').value;
  document.getElementById('uniquerl').value='<?php echo URL::base(); ?>front/<?php echo $uniquerl=uniqid(); ?>';
  alert(val);
  
 //$("#uniquerl").attr ( "value" ,"nvsss" );
 //document.getelementById('uniquerl')='<?php echo $uniquerl=uniqid(); ?>';
</script>


</div>
<h1 class="achieve_social"> invite your social contacts to participate:</h1>



<!--
<div class="social_second">
<a href="#">
<img alt="" src="/dev2013/referral/public/image/face_b.jpg"></a>
<a href="#">
<img alt="" src="/dev2013/referral/public/image/twt_t.jpg"></a>
<a href="#">
<img alt="" src="/dev2013/referral/public/image/in_i.jpg"></a>
</div>
-->

<div class="social" style="  float: left; margin: 5px 0 -23px 227px; width: 100%;">
  <!--<div class="supersocialshare" data-networks="linkedin,twitter,facebook" data-url="http://codecanyon.net/user/WeCreateUK" data-open="true"></div>-->
  <?php foreach($social as $temp):?>
  <div class="supersocialshare" data-networks="linkedin,twitter,facebook" data-url="<?php echo $temp['facebook'];?>" data-open="true"></div>
  
   <?php endforeach;?>
</div>	


     </div>

   </div>
  </div>
</div>
	   
         

			   
         </div>
                
   </div>
		  
</div>



<!-------------------end contents----------------->

<!----
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
	----->
	
   </div>
  </div>
  