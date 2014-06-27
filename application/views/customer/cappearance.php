<?php defined('SYSPATH') or die('No direct script access.'); ?>
 <?php echo Html::style('public/css/style.css'); ?>
 <?php echo Html::style('public/css/page7.css'); ?>

<?php
//print_r($images);
 
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

								  
<div class="wrapper_out">
  <div class="wrapper_in">
    

	<?php echo $header;?>
	
	<div class="top_line">
      <div class="top_line_in">
        <h1>
		 <?php foreach ($detail as $temp) : 
             $temp=$temp['referralProgTitle'];
		     echo $temp= substr($temp,0,42)."..";
			endforeach; 
		  ?>
		  
		  <span style="float: right; padding: 0 55px 0 0;">
		 <?php if($status=="Active"){ ?>
		   <a title="Play/Pause campaign" style="text-decoration:none;" href="<?php echo URL::base(); ?>/customer/activation/<?php echo $rpdid; ?>/0"><?php echo Html::image('public/image/pause.png', array('alt'=>''));  ?> </a>
		 <?php } ?>
		 <?php if($status=="Inactive"){ ?>
		   <a class="" title="Play/Pause campaign" style="text-decoration:none;" href="<?php echo URL::base(); ?>/customer/activation/<?php echo $rpdid; ?>/1"><?php echo Html::image('public/image/play.png', array('alt'=>''));  ?> </a>
		 <?php } ?>
		   <a title="Delete campaign" href="<?php echo URL::base(); ?>/customer/delete/<?php echo $rpdid; ?>" onclick="javascript: if(!confirm('Are you sure you want to delete thiscampaign ?')){void(0); return false;}"><?php echo Html::image('public/image/del.png', array('alt'=>''));  ?> </a>
		   </span>
		   
		</h1>
      </div>
      <div class="top_line_b">
        <div class="top_line_b_in">
          <ul class="dash">
          <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/dashboard/<?php echo $rpdid; ?>">Dashboard</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/creward/<?php echo $rpdid; ?>">Reward</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/cemails/<?php echo $rpdid; ?>">Emails</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" style="color:#000000;" href="<?php echo URL::base(); ?>/customer/cappearance/<?php echo $rpdid; ?>">Appearance</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/cintegration/<?php echo $rpdid; ?>">Integration</a></li>
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

						     <?php  if(isset($img1)){ ?>
						     <?php //echo $img1 ?>
							<img height="397px" width="344px" src="<?php echo URL::site("/uploads/$img1") ?>" alt="Uploaded avatar" />
							
							<?php }else{ ?>
							 <?php echo Html::image('public/image/a.jpg', array('style'=>'height:397px; width:344px;'));  
						     }	
							?>
   
                           </div>
							
							
							
                            <div class="right" style="padding: 0 0 0 0;">
                              <?php echo Html::image('public/image/p1.JPG', array('style'=>'','alt'=>'', 'style'=>'height: 397px;width: 337px;'));  ?>
							
                            </div>
                            
                            </div>
                        	
                    </div>
					
					<div class="browse">
                Thumbnail image<br />
				
				<?php echo Form::open('customer/cappearance/'.$rpdid, array('enctype' => 'multipart/form-data')); ?>
                	 <div class="inputbar1">
                     <!---<input type="text"  size="30" />---->
					   
					   <?php echo Form::file('avatar'); ?>
					   <?= Form::hidden('so','1',  array('style'=>'')); ?>
					   
					   <font style="font-size:15px">(image size 446px x 453px)</font>
                    	</div>
                        <div class="button1">
						
						<button type="submit" class="btn btn-primary" style="border:none;">Upload
						<?php //echo Html::image('public/image/upload.png', array('alt'=>''));  ?>
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
                        
<div class="participation" style="padding:0px 0px 0px 0px;">
   <?php echo Html::image('public/image/p2.JPG', array('style'=>'height: 412px; width: 340px;','alt'=>'',));  ?>					
                                     
</div>			

 <div class="congratulations">
            <div class="nn_class">
                            						
						
                        
						    <span class="msg_name">
							<?php foreach ($description as $temp) : ?>
                               <?php //echo $temp['referralProgTitle']; 
                                //echo substr($temp['referralProgTitle'],0,50);

							    ?>
			                      <?php endforeach; ?>
								  
							 </span>

						     <?php  if(isset($img2)){ ?>
						
							<img height="360px" width="330px" src="<?php echo URL::site("/uploads/$img2") ?>" alt="Uploaded avatar" />
							
							<?php }else{ ?>
							<?php echo Html::image('public/image/giveaway.jpg', array('alt'=>'', 'height'=>'360px', 'width'=>'330px'));  ?>
							<?php } ?>
							
						
							
							</div>

<?php //echo Html::image('public/image/giveaway.jpg', array('alt'=>''));  ?>

<a href="#">

<?php echo Html::image('public/image/next_but.jpg', array('alt'=>'','style'=>'float:right; margin: 8px 7px 13px 0;'));  ?>


</a>
</div>

                </div>
                 </div>
                <div class="browse">
                Thumbnail image  
				
				<?php echo Form::open('customer/cappearance/'.$rpdid, array('enctype' => 'multipart/form-data')); ?>
                	 <div class="inputbar1">
                    <?php echo Form::file('avatar'); ?>
					<?= Form::hidden('so','2',  array('style'=>'')); ?>
					
					<font style="font-size:15px">(image size 446px x 453px)</font>
             			</div> 
                       <div class="button">
						 
						 <button type="submit" class="btn btn-primary" style="border:none;">Upload
						<?php // echo Html::image('public/image/upload.png', array('alt'=>''));  ?>
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
                   
				     <?php echo Html::image('public/image/p3.JPG', array('alt'=>'', 'style'=>' height: 650px;width: 770px'));  ?>
				      
	

                    </div>
					
                </div>
				
				
				<!-----
				<div class="browse">
                Thumbnail image
				
				<?php echo Form::open('customer/cappearance/'.$rpdid, array('enctype' => 'multipart/form-data')); ?>
                	 <div class="inputbar1">
                    <?php echo Form::file('avatar'); ?>
					<?= Form::hidden('so','3',  array('style'=>'')); ?>
					<font style="font-size:15px">(image size  446px x 453px)</font>
             			</div> 
                       <div class="button">
						 
						 <button type="submit" style="border:none; background:none;">
						<?php echo Html::image('public/image/upload.png', array('alt'=>''));  ?>
						</button>

                         <?= Form::close(); ?>
						
						<?php //echo Html::image('public/image/upload.png', array('alt'=>''));  ?>
                    	
                        </div>
                </div>
				----->
	
                </div>
				
				<a style="margin:30px 100px 30px 0px;float:right;" href="<?php echo URL::base(); ?>/customer/cintegration/<?php echo $rpdid ?>" style="margin:0px; float:right;">
				
				    <button class="btn btn-primary btn-lg" type="button">Next</button>
			
			    </a>
				
				
				
			   
		  </div>
		  
</div>



<!-------------------end contents----------------->
<?php echo $footer; ?>
	
   </div>
  </div>
  