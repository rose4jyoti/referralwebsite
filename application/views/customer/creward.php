<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!----date picker jquery---->
<?php echo Html::style('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css', array('media'=>'screen, projection'), TRUE); ?>
<?php echo Html::script('http://code.jquery.com/jquery-1.9.1.js'); ?>
<?php echo Html::script('http://code.jquery.com/ui/1.10.3/jquery-ui.js'); ?>
<script>
$(function() { 
var $j = jQuery.noConflict();
$j( "#datepicker1" ).datepicker({ dateFormat: "yy-m-d" });
$j( "#datepicker2" ).datepicker({ dateFormat: "yy-m-d" });
});
</script>

<?php echo Html::style('public/css/style.css'); ?>
<?php //echo Html::style('public/css/page3.css'); ?>
<?php //echo Html::style('public/css/page4.css'); ?>

<!-----------changing the text content------------>
<script>
function change(first, second){
 document.getElementById(first).style.display="none";
 document.getElementById(second).style.display="inline";
 //alert(first);
}
function afterchange(first, second, main){
 //alert('working');
 document.getElementById(main).value=document.getElementById(second).value;
 document.getElementById(first).style.display="inline";
 document.getElementById(second).style.display="none";
 //alert(first);
}

</script>

<?php foreach ($query as $temp) : 
   $title=$temp['referralProgTitle']; 
   $description=$temp['referralProgDescription']; 
 endforeach; ?>
<?php foreach ($query1 as $temp) : 
   $start=$temp['startTime']; 
   $end=$temp['endTime']; 
 endforeach; ?>

<div class="wrapper_out">
  <div class="wrapper_in">
    <div class="header_out">
      <div class="header_in">
        <div class="logo">
		<?php echo Html::image('public/image/dummy-logo.png', array('alt'=>''));  ?>
		
		
		</div>
         <span class="cus_name"> Welcome &nbsp;<?php echo $customername; ?></span> 
        
        <div class="new_ul">
          <ul id="menu">
            <li><a href="#">Campaigns</a>
			<ul>
			 <?php foreach ($campaigns as $temp) : ?>
                  <li><a href="<?php echo URL::base(); ?>/customer/dashboard/<?php echo $temp['referralProgDetailsID']; ?>"><?php echo $temp['referralProgTitle']; ?></a></li>
			 <?php endforeach; ?>	
                <li><a href="<?php echo URL::base(); ?>/customer/start">Add new Campaigns</a></li> 
              </ul>
			
			</li>
            
			   <li><a href="#">Account</a>
              <ul>
                <li><a href="<?php echo URL::base(); ?>/customer/account">Account Setting</a></li>
                <li><a href="<?php echo URL::base(); ?>/customer/billing">Billing information</a></li>
               
              </ul>
            </li>
            <li><a href="<?php echo URL::base(); ?>/customer/support">Support</a>
            </li>
			
            <li><a href="<?php echo URL::base(); ?>/user/logout">Logout</a> </li>
          </ul>
        </div>
      </div>
    </div>
	<div class="top_line">
	
      <div class="top_line_in">
        <h1>
		 <?php foreach ($details as $temp) : 
             $temp=$temp['referralProgTitle'];
		   echo $temp= substr($temp,0,42)."..";
		  endforeach;?>
		  
		</h1>
      </div>
	  
      <div class="top_line_b">
        <div class="top_line_b_in">
		  
		  <ul class="dash">
            <li><a  class="custlink" href="<?php echo URL::base(); ?>/customer/dashboard/<?php echo $rpdid; ?>">Dashboard</a><b class="charc">&#62;</b></li>
            <li><a style="color:#000000;" class="custlink" href="<?php echo URL::base(); ?>/customer/creward/<?php echo $rpdid; ?>">Reward</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/cemails/<?php echo $rpdid; ?>">Emails</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/cappearance/<?php echo $rpdid; ?>">Appearance</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/cintegration/<?php echo $rpdid; ?>">Integration</a></b></li>
          </ul>
		  
		  
        </div>
      </div>
    </div>
   

 
<!----<div class="main">--->

     <div class="form">
      <div class="form_in">
        
       <div class="reward">
       
       <h1>Define your campaign</h1>
	   
	    <?= Form::open('customer/reward'); ?>
		
       <div class="cam_input"><span>My campaign title is</span> 
	   
	    <?= Form::input('rpt',$title,  array('class'=>'aa_new','maxlength'=>'50', 'style'=>'width: 700px;')); ?>
	   <!---<input name="" type="text" class="aa_new" />---->
	   </div>
         <div class="cam_input"><span style="float: left;">My campaign description is</span> 
		 <?= Form::textarea('rpd', $description,array('class'=>'aa_new','maxlength'=>'80', 'style'=>'height: 60px; width:648px;')); ?>
		 <!---<input name="" type="text" class="aa_new" />---->
		 
		 </div>
         <div class="cam_input"><span>My campaign will start on</span> 
		 
          <?= Form::input('start',$start,  array('id'=>'datepicker1','class'=>'aa_new')); ?>
           
		   <!--
		    <input name="" type="text" class="aa_new" />
		   --->
		 
		 <span>and will end on</span> 
		 
		 <?= Form::input('end',$end,  array('id'=>'datepicker2','class'=>'aa_new')); ?>
		 
		 <!---<input name="" type="text" class="aa_new" />--->
		 
		 </div>
       
	   
<?php if($paramid==1){?>	   
	   
  <div class="cam_input"><span class="bb">I would like to reward campaign participants </span>
	  
<select name="rf" class="asc">

<option value="Once">Once</option>
<option value="every time">every time</option>


</select>
		

     <span class="bb"> when</span>
	   <!----<a class="onchange" href="#">three</a> ---->
	 
<select name="mrr" class="asc_nn">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>

	 
	 <span class="bb">of 

	 their friends</span>
	 
	  <!---- <a class="onchange" href="#">visit</a>-----> 
	 
	   <!---
	   <a id="action" class="onchange"  style="display:inline;" onclick="change('action', 'action2');"> 
		<input id="actionreward" class="change" type="text" name="action" value="visit" />
		</a>
		<input id="action2" onblur="afterchange('action', 'action2', 'actionreward');" class="change2" type="text" name="action2" value="visit" style="display:none;"/>
		----->

<select name="ar" class="asc">
<option value="Visit">Visit</option>
<option value="convert on">convert on</option>
<option value="enter this campaign on">enter this campaign on</option>
</select>
		
	 <br>
     <span class="bb"> my website.</span>
 </div>
       
    
 <div class="cam_input"><span class="bb">I  Want to reward them with 
<!---<b>want</b> --->


<select name="rwd" class="asc">
<option option="Coupon codes">Coupon codes</option>
<option option="Manually">Manually</option>
</select>


from this
<br>
 XLS 
<b>file</b>.
</span></div>

       

<?php } ?>

<?php if($paramid==2){ ?>
 <div class="cam_input">
 <span class="bb">
I would like to draw  

<select name="mrr4" class="asc_nn">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>

winner(s)
<!--
<select name="rf" class="asc_nn">
<option value="1">once</option>
<option value="2">repeatedly</option>
</select>
every
<select name="mrr5" class="asc_nn">
<option value="1">day</option>
<option value="2">week</option>
<option value="2">month</option>
</select>
---->
<select name="mrr5" class="asc_nn">
<option value="1">Every day</option>
<option value="2">Every week</option>
<option value="3">Every month</option>
<option value="4">Every month</option>
<option value="5">On the final date</option>
</select>

<!--after campaign starts.---->

.Winners will be chosen 

randomly. Chances of winning are proportional to the number of entries a participant has earned.
The participant gets 

1 entry when entering this campaign and 
<select name="mrr" class="asc_nn">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>

additional entries each time a friend
<select name="ar" class="asc">
<option value="enter this campaign on">enter this campaign on</option>
<option value="Visit">Visit</option>
<option value="convert on">convert on</option>

</select>

on my website.

</span>
</div>

<?php  } ?>



<div class="cam_input"><span class="bb">I  
<select name="ira" class="asc">
<option option="yes">want</option>
<option option="no">Don`t want</option>
</select>


to give an instant reward to the participants with a 

<select name="cc" class="asc">
<option option="one-time use coupon code">one-time use coupon code</option>
<option option="multi-time use coupon code">multi-time use coupon code</option>
</select>
from this XLS
<b>file</b>.

</span>

</div>


<div class="cam_input">
<span class="bb">I  
<!--<b>want</b> --->

<select name="peu" class="asc">
<option option="yes">want</option>
<option option="no">Don`t want</option>
</select>

to send the status update once per week to every participant to inform them on their referral
status.</span>
</div>


                        <!----
                          <div class="mssgbox">
                                    <div class="box_text">
                                          To track visits link to your
                                          website will be shortened and
                                          will look similar to this one
                                          http://urlt.ag/gTue.
                                     </div>
                           </div>
                          ----->

	  
	    <?php //echo Form::hidden('refprogid', $refprogid); ?>
	   
	   
	   <div class="cam_input">
	  
         <button type="submit" style=" background: none repeat scroll 0 0 rgba(0, 0, 0, 0); border: medium none; margin: 0 0 0 835px;">
	     <?php echo Html::image('public/image/next.jpg', array('alt'=>'', 'class'=>'next_but'));  ?>
         </button>
	
		
	   </div>
	

       <?= Form::close(); ?>

       </div> 
        
        
      </div>
    </div>
	  
 
 
<!--- </div>----->
	
	
	
<div class="foter">
      <div class="foter_in">
        <div class="foter_content">
          <div class="foter_content_in">
            <ul>
              <li><a class="special" href="http://softoasistech.com/dev2013/referral/front/about">About US </a></li>
              |
              <li><a class="special" href="http://softoasistech.com/dev2013/referral/front/quality"> Q&A </a></li>
              |
              <li><a class="special" href="http://softoasistech.com/dev2013/referral/front/tou"> Terms of Use</a></li>
              |
              <li><a class="special" href="http://softoasistech.com/dev2013/referral/front/privacypolicy"> Privacy Policy</a></li>
              |
              <li><a class="special" href="http://softoasistech.com/dev2013/referral/front/contact"> Contact US</a></li>
             
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