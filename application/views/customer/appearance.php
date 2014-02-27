<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/style.css'); ?>
<?php echo Html::style('public/css/page7.css'); ?>

<?php 
$i=0;
foreach ($images as $temp) :
 if($temp['referralProgImageOrder']=='1'){
   $img1=$temp['referralProgImage'];
 }
 if($temp['referralProgImageOrder']=='2'){
   $img2=$temp['referralProgImage'];
 }
 if($temp['referralProgImageOrder']=='3'){
   $img3=$temp['referralProgImage'];
 }

endforeach; ?>
<?php

//echo $img1;
//echo '<br>';
//echo $img2;
//echo '<br>';
//echo $img3;
//echo '<br>';

?>
	
								  
<div class="wrapper_out">
  <div class="wrapper_in">
    
	
	 <?php echo $header; ?>
	
	<div class="top_line">
      <div class="top_line_in">
        <h1>Step 4: Configure widget appearance</h1>
      </div>
      <div class="top_line_b">
        <div class="top_line_b_in">
          <ul class="dash">
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/start">Campaign</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/reward">Reward</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/emails">Emails</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" style="color:#000000;" href="<?php echo URL::base(); ?>/customer/appearance">Appearance</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/integration">Integration</a></li>
          </ul>
        </div>
      </div>
    </div>
	
<!-------------------start contents----------------->

 <div class="block_out">
   
		<div class="block1">
                <div class="head">
                    User Connect page
                </div>
                <div class="text">
                    
            This is the landing page where users will redirected to enter your referral program.
                </div>
                <div class="img1">
                	<div class="img_in">
                                     <div class="left" style="padding: 0 0 0 0;">
                            <!---p>
                            <b>INVITE YOUR FRIENDS</b> to enter this
                            contest for a chance to win a FREE 
                            Samssung Galaxy Note.
                            </p--->

						

							
						     <?php  if(isset($img1)){ ?>
						     <?php //echo $img1 ?>
							<img height="397px" width="344px" src="<?php echo URL::site("/uploads/$img1") ?>" alt="Uploaded avatar"/>
							
							<?php }else{ ?>
							 <?php echo Html::image('public/image/a.jpg', array('style'=>'height:397px; width:344px;','alt'=>''));  ?>
							
						  <?php }	?>
							
                            
							   
                            </div>
                            <div class="right">
                            <p>
								<b> 
								<?php foreach ($description as $temp) : ?>
                               <?php echo $temp['referralProgDescription']; ?>
			                      <?php endforeach; ?>	
							    </b>
							<!---
                            STAR SHARING NOW for a chance to win
                            your<b> FREE Samsung Galaxy Note.</b>
							---->
                            
                            </p>
                           
                            
                            <table height="229" class="table">
							
							<tr>
							  <td><h1>Login to your webmail account below <b>(Hotmail,Gmail,Yahoo,AOL)</b>
							  and discover how much money you colud receive!</h1>
							  </td>
                              </tr>

                              <tr>
							  <td>Email</td>
                              </tr>
                              <tr> 
                                <td><input name="" type="text" class="in_box" /></td>
                              </tr>
                              <tr>
                                <td>Your password</td>
                              </tr>
                              <tr>
                                  <td><input name="" type="text" class="in_box" /><a href="#">
								
								<?php echo Html::image('public/image/next_but.jpg', array('alt'=>'','class'=>'bbb'));  ?>

								</a></td>
                              </tr>
                              <tr>
                                <td>
								<br>
								<span style="font:11px Verdana,Geneva,sans-serif;">
								Already have a Participant number? <a href="#">Click here</span>
								</a>
								</td>
                              </tr>
                            </table>
							
							<div class="lock">
							<?php echo Html::image('public/image/lock.jpg', array('alt'=>'','class'=>'bbb_n'));  ?>
							<h1>your password will not be saved and no email message will be sent to your contacts without your consent.</h1>
							</div>
							
							<h2 class="bottom_text">Read the CONTEST <b>term and conditions</b> before participating</h2>
							
                            </div>
                            
                            </div>
                        	
                    </div>
					
					<div class="browse">
                Thumbnail image<br />
				
				<?php echo Form::open('customer/appearance', array('enctype' => 'multipart/form-data')); ?>
                	 <div class="inputbar1">
                     <!---<input type="text"  size="30" />---->
					   
					   <?php echo Form::file('avatar'); ?>
					   <?= Form::hidden('so','1',  array('style'=>'')); ?>
					    <font style="font-size:15px">(image size 350 X 400)</font>
                    	</div>
                        <div class="button1">
						
						<button type="submit" style="border:none; background:none;">
						<?php echo Html::image('public/image/upload.png', array('alt'=>''));  ?>
						</button>
						
						<?//= Form::submit('Upload', 'Upload'); ?>
                         <?= Form::close(); ?>

						
                    </div>
               </div>
			   
         </div>
                
                   

   

   
          <div class="block2">
          		<div class="head">
                	User Invite page
                </div>
                <div class="text">
                	This is the page user will see once he/she connects to his/her webmail account.
                </div>
                 <div class="img2">
                 	<div class="img_in">
                                <div class="participation">
                            <h3>
							<!---
							<b>invite your friends</b> to enter this giveaway
                            and get a free mp3 shuffling player
							--->
							
							<b>
								<?php foreach ($description as $temp) : ?>
                               <?php //echo $temp['referralProgDescription']; 
							   
							    echo substr($temp['referralProgDescription'],0,40);
							   ?>
			                      <?php endforeach; ?>
							</b>
							
							</h3>
                            

                            <!--div class="search_out">
                            
                            <table class="ss">
                              <tr>
                                <td width="144"><input class="in_box_b_c" name="" type="text" /></td>
                                <td width="47"><a href="#">
								
								<?php echo Html::image('public/image/search_but.jpg', array('alt'=>''));  ?>
								
								
								 
								</a></td>
                              </tr>
                            </table>
                            
                          </div-->
                              <div class="ss_out_new">
							<h1>
							<input name="" type="checkbox" value="" /><b>Select all</b></h1>
							<h2>
							<input type="text" name="" class="new_in_box">
                                <a href="#"><img alt="" src="/dev2013/referral/public/image/search_but.png" style=" float: left;
    margin: 0;
    padding: 4px;">
								</a>
                             </h2>
							</div>
							
							<div class="song_over">
                            <table width="92%" class="songs_list">
							
						
                              <tr class="with_back">
                                <td width="5%" align="left" valign="middle"><input name="" type="checkbox" value="" /></td>
                                <td width="18%" align="center" valign="middle"><b>Staphane</b></td>
                                  <td width="77%" align="center" valign="middle">Staphane@gmail.com</td>  
                              </tr> 
                              
                              
                               <tr class="no_back">
                                <td width="5%" align="left" valign="middle"><input name="" type="checkbox" value="" /></td>
                                <td width="18%" align="center" valign="middle"><b>Staphane</b></td>
                                  <td width="77%" align="center" valign="middle">Staphane@gmail.com</td>  
                              </tr>
                              
                               <tr class="with_back">
                                <td width="5%" align="left" valign="middle"><input name="" type="checkbox" value="" /></td>
                                <td width="18%" align="center" valign="middle"><b>Staphane</b></td>
                                  <td width="77%" align="center" valign="middle">Staphane@gmail.com</td>  
                              </tr>
                              
                               <tr class="no_back">
                                <td width="5%" align="left" valign="middle"><input name="" type="checkbox" value="" /></td>
                                <td width="18%" align="center" valign="middle"><b>Staphane</b></td>
                                  <td width="77%" align="center" valign="middle">Staphane@gmail.com</td>  
                              </tr>
                              
                              
                               <tr class="with_back">
                                <td width="5%" align="left" valign="middle"><input name="" type="checkbox" value="" /></td>
                                <td width="18%" align="center" valign="middle"><b>Staphane</b></td>
                                  <td width="77%" align="center" valign="middle">Staphane@gmail.com</td>  
                              </tr>
                              
                              
                              
                               <tr class="no_back">
                                <td width="5%" align="left" valign="middle"><input name="" type="checkbox" value="" /></td>
                                <td width="18%" align="center" valign="middle"><b>Staphane</b></td>
                                  <td width="77%" align="center" valign="middle">Staphane@gmail.com</td>  
                              </tr>
                              
                               <tr class="with_back">
                                <td width="5%" align="left" valign="middle"><input name="" type="checkbox" value="" /></td>
                                <td width="18%" align="center" valign="middle"><b>Staphane</b></td>
                                  <td width="77%" align="center" valign="middle">Staphane@gmail.com</td>  
                              </tr>
                              
                               <tr class="no_back">
                                <td width="5%" align="left" valign="middle"><input name="" type="checkbox" value="" /></td>
                                <td width="18%" align="center" valign="middle"><b>Staphane</b></td>
                                  <td width="77%" align="center" valign="middle">Staphane@gmail.com</td>  
                              </tr>
                              
                              
                               <tr class="with_back">
                                <td width="5%" align="left" valign="middle"><input name="" type="checkbox" value="" /></td>
                                <td width="18%" align="center" valign="middle"><b>Staphane</b></td>
                                  <td width="77%" align="center" valign="middle">Staphane@gmail.com</td>  
                              </tr>
                              
                              
                            </table>
                            
                            </div>
                            
                            <!---<h1 class="achieve_new"><a href="#">Read <b>terms and conditions</b> before participating</a></h1>--->
                                            
          </div>


<div class="congratulations">
<div class="nn_class">
                            						
						
                        
						    <span class="msg_name"><?php foreach ($description as $temp) : ?>
                               <?php //echo $temp['referralProgTitle']; 
                               // echo substr($temp['referralProgTitle'],0,50);

							    ?>
			                      <?php endforeach; ?>
								  
							 </span>
						
						
						     <?php  if(isset($img2)){ ?>
						
							<img height="360px" width="330px" src="<?php echo URL::site("/uploads/$img2") ?>" alt="Uploaded avatar" style=" border: 1px solid #C9C9C9;
    margin: 0 0 0 9px;" />
							
							<?php }else{ ?>
						<?php echo Html::image('public/image/giveaway.jpg', array('alt'=>'','height'=>'360px', 'width'=>'330px'));  ?>
							<?php } ?>
							
							  
							
							</div>

<?php //echo Html::image('public/image/giveaway.jpg', array('alt'=>''));  ?>

<a href="#">

<?php echo Html::image('public/image/next_but.jpg', array('alt'=>'','style'=>'float: right;
    margin: 8px 7px 13px 0;'));  ?>


</a>
</div>

                </div>
                 </div>
                <div class="browse">
                Thumbnail image
				
				<?php echo Form::open('customer/appearance', array('enctype' => 'multipart/form-data')); ?>
                	 <div class="inputbar1">
                    <?php echo Form::file('avatar'); ?>
					<?= Form::hidden('so','2',  array('style'=>'')); ?>
					 <font style="font-size:15px">(image size 350 X 300)</font>
             			</div> 
                       <div class="button">
						 
						 <button type="submit" style="border:none; background:none;">
						<?php echo Html::image('public/image/upload.png', array('alt'=>''));  ?>
						</button>

                         <?= Form::close(); ?>
						
						<?php //echo Html::image('public/image/upload.png', array('alt'=>''));  ?>
                    	
                        </div>
                </div>
  
				
          </div>
		  
		  
		  <div class="block3">
          		<div class="head">
                	User Account page 
                </div>
                <div class="text">
                	This is the page user will see once he/she connects to his/her webmail account.
                </div>
                <div class="img3">
                
                	<div class="img_in">
                   <div class="congratulations">

                 <h1>congratulations</h1>
                 <h2>your invitations have been send</h2>
<h3>You are now entered in the Giveaway</h3>

<h4>You will receive your <b>FREE MP3 shuffing player</b> when 
<b><?php foreach ($details as $temp) : ?>
   <?php echo $temp['refProgID']; ?>
<?php endforeach; ?></b> 

of your friends will have
<b>
<?php foreach ($details as $temp) : ?>
   <?php echo $temp['actionRewarded']; ?>
<?php endforeach; ?></b> 
</b>
 the giveaway</h4>


	                      <?php  if(isset($img3)){ ?>
							<img src="<?php echo URL::site("/uploads/$img3") ?>" alt="Uploaded avatar" style="float: left;margin: 0 0 0 40px;padding: 59px 0 57px;width: 231px;" />
							
							<?php } else{?>
							 <?php echo Html::image('public/image/1319401754_music_is_love_by_beau.jpg', array('alt'=>'','style'=>'float: left;margin: 0 0 0 40px;padding: 59px 0 57px;width: 231px;'));  ?>
							<?php } ?>
							

                  </div>
				  
<div class="participation_new">
<h1>participation status</h1>

<div class="contact_in">
<span>Contacts Invited</span>
<b>25</b>

</div>


<div class="contact_in">
<span>Contacts registered</span>
<b>6/

<?php foreach ($details as $temp) : ?>
   <?php echo $temp['refProgID']; ?>
<?php endforeach; ?>	

</b>

</div>


<div class="contact_in">
<span>Time Left</span>
<b>23D 24H 59M</b>

</div>


<!---div class="search_out">

<table class="ss">
  <tr>
    <td width="144"><input class="in_box_b" name="" type="text" /></td>
    <td width="47"><a href="#">
	
	<?php echo Html::image('public/image/search_but.jpg', array('alt'=>''));  ?>

	
	
	</a></td>
  </tr>
</table>




</div--->



  <div class="ss_out_new">
							<h4 class="rr">
							<input type="text" name="" class="new_in_box">
                                <a href="#"><img alt="" src="/dev2013/referral/public/image/search_but.png" style=" float: left;
    margin: 0;
    padding: 4px;">
								</a>
								
                             </h4>
							</div>

<div class="song_over">

<table class="songs_list">
  <tr class="no_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle">
	  
	  <?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?>
	 
	  
	  </td>
    <td width="14%" align="center" valign="middle"><span>Sent</span></td>
    <td width="25%">
	<?php echo Html::image('public/image/remind.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	</td>
  </tr>
  
   <tr class="with_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Registered</span></td>
    <td width="25%">
	
	<?php echo Html::image('public/image/remind.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	
	
	</td>
  </tr>
   <tr class="no_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Sent</span></td>
    <td width="25%">
	
	<?php echo Html::image('public/image/invii.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	
	</td>
  </tr>
  
   <tr class="with_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Registered</span></td>
    <td width="25%">
	
	<?php echo Html::image('public/image/remind.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	
	</td>
  </tr>
   <tr class="no_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Sent</span></td>
    <td width="25%">
	
	<?php echo Html::image('public/image/invii.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	
	</td>
  </tr>
  
   <tr class="with_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Registered</span></td>
    <td width="25%">
	<?php echo Html::image('public/image/invii.png', array('alt'=>'','class'=>'r_image'));  ?>

	
	</td>
  </tr>
   <tr class="no_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Sent</span></td>
    <td width="25%">
	
	<?php echo Html::image('public/image/remind.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	
	</td>
  </tr>
  
   <tr class="with_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Registered</span></td>
    <td width="25%">
	
	<?php echo Html::image('public/image/remind.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	
	</td>
  </tr>
  
  
   <tr class="no_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Sent</span></td>
    <td width="25%">
	
	<?php echo Html::image('public/image/remind.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	
	</td>
  </tr>
  
   <tr class="with_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Registered</span></td>
    <td width="25%">
	
	<?php echo Html::image('public/image/remind.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	
	</td>
  </tr>
   <tr class="no_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Sent</span></td>
    <td width="25%">
	
	<?php echo Html::image('public/image/remind.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	
	</td>
  </tr>
  
   <tr class="with_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Registered</span></td>
    <td width="25%">
	
	<?php echo Html::image('public/image/remind.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	
	</td>
  </tr>
   <tr class="no_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Sent</span></td>
    <td width="25%">
	
	<?php echo Html::image('public/image/remind.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	
	</td>
  </tr>
  
   <tr class="with_back">
    <td width="17%" align="left" valign="middle"><b>Staphane</b></td>
    <td width="35%" align="center" valign="middle">Staphane@gmail.com</td>
      <td width="9%" align="center" valign="middle"><?php echo Html::image('public/image/ok.jpg', array('alt'=>''));  ?></td>
    <td width="14%" align="center" valign="middle"><span>Registered</span></td>
    <td width="25%">
	
	<?php echo Html::image('public/image/remind.png', array('alt'=>'','class'=>'r_image'));  ?>
	
	
	</td>
  </tr>
  
</table>

</div>

<h1 class="achieve"> increase your chances to WIN and share on social!</h1>
<div class="link_url"><h3>Your unique referral link:</h3>
<input class="url" name="" type="text" />
</div>
<h1 class="achieve_social"> invite your social contacts to participate:</h1>

<div class="social_second">
<a href="#">
<?php echo Html::image('public/image/face_b.jpg', array('alt'=>''));  ?>
</a>
<a href="#">
<?php echo Html::image('public/image/twt_t.jpg', array('alt'=>''));  ?>
</a>
<a href="#">
<?php echo Html::image('public/image/in_i.jpg', array('alt'=>''));  ?>
</a>
</div>



</div>

</div>
                </div>
				
				
				
				<div class="browse">
                Thumbnail image
				
				<?php echo Form::open('customer/appearance', array('enctype' => 'multipart/form-data')); ?>
                	 <div class="inputbar1">
                    <?php echo Form::file('avatar'); ?>
					<?= Form::hidden('so','3',  array('style'=>'')); ?>
					 <font style="font-size:15px">(image size 170 X 170)</font>
					 
             			</div> 
                       <div class="button">
						 
						 <button type="submit" style="border:none; background:none;">
						<?php echo Html::image('public/image/upload.png', array('alt'=>''));  ?>
						</button>

                         <?= Form::close(); ?>
						
						<?php //echo Html::image('public/image/upload.png', array('alt'=>''));  ?>
                    	
                        </div>
                </div>
				
			<a href="<?php echo URL::base(); ?>customer/integration" style="margin:0; float:right;">
				<button type="submit" style="border:none; background:none;float: right; margin: 380px 0px 0px 0px; padding: 0;">
				<?php echo Html::image('public/image/next.jpg', array('alt'=>'', 'class'=>'next_but'));  ?>
			
		        </button>
			</a>
				
				
                </div>
				
				
				
			   
		  </div>
		  
</div>



<!-------------------end contents----------------->

	 <?php echo $footer; ?>
	
	
   </div>
  </div>
  