<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/style.css'); ?>
<?php echo Html::style('public/css/page7.css'); ?>

<?php 
foreach ($details as $temp) :
 if($temp['referralProgImageOrder']=='1'){
   $img1=$temp['referralProgImage'];
 }
endforeach; ?>
							  
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
        <h1> </h1>
      </div>
	  
	  
	  
   
    </div>
	
<!-------------------start contents----------------->

 <div class="block_out">
   <div class="img1" style="margin: 40px 0 59px 138px;">
                	<div class="img_in">
                                     <div style="padding: 0 0 0 0;" class="left">
                            <!---p>
                            <b>INVITE YOUR FRIENDS</b> to enter this
                            contest for a chance to win a FREE 
                            Samssung Galaxy Note.
                            </p--->

						
                         <?php  if(isset($img1)){ ?>
						     <?php //echo $img1 ?>
							   
							    <img height="397px" width="344px" src="<?php echo URL::site("/uploads/$img1") ?>" alt="Uploaded avatar" />
							<?php }else{ ?>
							
					           <?php echo Html::image('public/image/a.jpg', array('alt'=>'', 'style'=>'width:344px; height:397px;'));  ?>
							
						  <?php }	?>
							   
                            </div>
                            <div class="right">
                            <p>
								<b> 
								                               dfgfdgd			                      	
							    </b>
							<!---
                            STAR SHARING NOW for a chance to win
                            your<b> FREE Samsung Galaxy Note.</b>
							---->
                            
                            </p>
                           
                            <?php echo Form::open ( 'http://softoasistech.com/dev2013/referral/home/index', array( 'method' => 'post', 'name' =>'reg_frm', 'id' => 'reg_frm', 'enctype' => 'multipart/form-data') ); ?>
                            <table height="229" class="table">
							
							<tbody><tr>
							  <td><h1>Login to your webmail account below <b>(Hotmail,Gmail,Yahoo,AOL)</b>
							  and discover how much money you colud receive!</h1>
							  </td>
                              </tr>
                              <tr> 
							
                              </tr><tr>
							  <td>Email</td>
                              </tr>
                              <tr> 
                                <td><input type="text" class="in_box" name="email"></td>
                              </tr>
                              <tr>
                                <td>Your password</td>
                              </tr>
                              <tr>
                                  <td><input type="password" class="in_box" name="pass"><a href="#">
								
								<input name="id" value="<?php echo $id;?>" type="hidden" />
								
							   <!---<img class="bbb" alt="" src="/dev2013/referral/public/image/next_but.jpg">--->
							
								
								<button type="submit" style="border:none; background:none;">
								<?php echo Html::image('public/image/next_but.jpg', array('alt'=>''));  ?>
                                </button>
								
								</a></td>
                              </tr>
                              <tr>
                                <td>
								<br>
								<span style="font:11px Verdana,Geneva,sans-serif;">
								Already have a Participant number? <a href="#">Click here</a></span><a href="#">
								</a>
								</td>
                              </tr>
                            </tbody>
							
							  <?php echo Form::close(); ?>	
							</table>
							
							<div class="lock">
							<img class="bbb_n" alt="" src="/dev2013/referral/public/image/lock.jpg">						
							
							<h1>your password will not be saved and no email message will be sent to your contacts without your consent.</h1>
							</div>
							
							<h2 class="bottom_text">Read the CONTEST <b>term and conditions</b> before participating</h2>
							
                            </div>
                            
                            </div>
                        	
                    </div>
		
					

			   
         </div>
                
   </div>
		  
</div>








<!-------------------end contents----------------->


<div class="foter" style=>
      <div class="foter_in"  style="float: left; margin: 32px 0px 0px;">
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
  