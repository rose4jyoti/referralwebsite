<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/style.css'); ?>
<?php echo Html::style('public/css/page7.css'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<!---------To select all the checkbox---->
<script type="text/javascript">
 function checkAll(bx) {
 //alert('ok');
  var cbs = document.getElementsByTagName('input');
  for(var i=0; i < cbs.length; i++) {
    if(cbs[i].type == 'checkbox') {
      cbs[i].checked = bx.checked;
    }
  }
}

</script>
<!-----counting the checked checkbox---->
<script type="text/javascript">
function fnc()
{   
    var count=0;
    x=document.getElementById("chkdiv").elements;
    for(i=0;i<x.length;++i)
    {
	if(x[i].type=='checkbox' && x[i].checked)
	 {
      //alert("checked");
	  count++;
	 }
	 
    }
	
  //alert(count); 
  if (count<3)
  {
   document.getElementById("warning").style.display="block"; 
  //alert("Please select atleast 3 contact to invite.");
  return false;
  }
  
}

</script>

<?php 
foreach ($options as $temp) :
 if($temp['referralProgImageOrder']=='2'){
    $img2=$temp['referralProgImage'];
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
   
		<div class="img2" style="margin: 57px 0 39px 144px;">
                 	<div class="img_in">
                                <div class="participation">
                            <h3>
							
							<p style="display:none; color: #FF0000;" id="warning"> Please select atleast 3 contacts to invite.
							</p>
							<!---
							<b>invite your friends</b> to enter this giveaway
                            and get a free mp3 shuffling player
							--->
							
							
							<b>
	                         <?php
                               foreach ($options2 as $temp) :
                                echo $temp['referralProgDescription']; 
                               endforeach; 
                             ?>
                            </b>
						
						   
					  </h3>
                            
                            <!--div class="search_out">
                            
                            <table class="ss">
                              <tr>
                                <td width="144"><input class="in_box_b_c" name="" type="text" /></td>
                                <td width="47"><a href="#">
								
								<img src="/dev2013/referral/public/image/search_but.jpg" alt="" />								
								
								
								</a></td>
                              </tr>
                            </table>
                            
                          </div-->
                              <div class="ss_out_new">
							<h1>
							<!---<input type="checkbox" value="" name="" id="mark" onclick='check();'>-->
							<input type="checkbox" value="" name="" id="mark" onClick="checkAll(this)" checked><b>Select all</b></h1>
							
							<h2>
							
							<?= Form::open('home/index'); ?>
						    <?= Form::input('key','',  array('class'=>'new_in_box')); ?>
                             <!----<input type="text" class="new_in_box" name="">-->		
                              <?php echo Form::hidden('formid', '1'); ?>
                           
                             <button style="border:none; background:none;height: 22px;width: 28px;" type="submit">
							  <img style=" float: left;margin: 0; padding: 4px;" src="/dev2013/referral/public/image/search_but.png" alt="">
							 </button>							  
							<?= Form::close(); ?>								

									

                               <!---<a href="#">--->
							   <!----<img style=" float: left;margin: 0; padding: 4px;" src="/dev2013/referral/public/image/search_but.png" alt="">
							   </a>
							   --->
							   
							   
                             </h2>
							 
							</div>
							
							
							<div class="song_over">

                             <?= Form::open('home/index',array('id'=>'chkdiv', 'onsubmit'=>'return fnc();')); ?>
						      <?php $i=1; ?>
                               <?php foreach ($contacts as $temp) : ?>
							   
								<input id="ss" type="checkbox" value="<?php echo $temp['email']; ?> " name="<?php echo $i;?>" class="email" checked>
                               
								<b><?php echo $temp['name']; ?> </b>

								  <?php echo $temp['email']; ?>
								  <br> 
                                  
								  <?php $i++; ?>
							   <?php endforeach; ?>
                              <?php echo Form::hidden('formid', '2'); ?>
							  
                               <!---<tr class="no_back">
                                <td width="5%" valign="middle" align="left"><input type="checkbox" value="" name=""></td>
                                <td width="18%" valign="middle" align="center"><b>Staphane</b></td>
                                  <td width="77%" valign="middle" align="center">Staphane@gmail.com</td>  
                              </tr>
							  ---->
                            
                            </div>
							 
                            <!--<h1 class="achieve_new"><a href="#">Read <b>terms and conditions</b> before participating</a></h1>--->
                                            
          </div>


<div class="congratulations">
<div class="nn_class">
                            						

						    <!--<span class="msg_name">                               dsfgdfgdfgh			                      								  
							 </span>---->
						
							
								<?php if(isset($img2)){ ?>
<img style="
    margin: 0 0 0 9px;" height="313px" width="323px" src="<?php echo URL::site("/uploads/$img2") ?>" alt="Uploaded avatar" />
<?php }else{ ?>
<?php echo Html::image('public/image/giveaway.jpg', array('alt'=>'', 'style'=>'margin: 0 0 0 9px;', 'height'=>'313px',  'width'=>'323px'));  ?>
<?php }?>						
							  
							
							</div>



<a href="<?php echo URL::base(); ?>/home/congrats/<?php echo $id; ?>">


   <!---<img style="float: right; margin: 8px 7px 13px 0;" alt="" src="<?php echo URL::base(); ?>/public/image/next_but.jpg">-->

      <button type="submit" style="background: none repeat scroll 0 0 rgba(0, 0, 0, 0); border: medium none; float:right; margin: 40px 0 10px 0px;">
	     <?php echo Html::image('public/image/next_but.jpg', array('alt'=>'', 'class'=>''));  ?>
        </button>
	
       <?//= Form::submit('create', 'Create'); ?>
       <?= Form::close(); ?>

</a>
</div>

                </div>
                 </div>




 <?php echo Form::close(); ?>
					

			   
         </div>
                
   </div>
		  
</div>



<!-------------------end contents----------------->


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
  