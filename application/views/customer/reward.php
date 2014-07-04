<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-----Bootstrap library----->
 <?php echo Html::style('public/bootstrap-3.1.1-dist/css/bootstrap.min.css'); ?>
  <?php echo Html::style('public/bootstrap-3.1.1-dist/css/bootstrap.css'); ?>

 
<!----date picker jquery---->
<?php echo Html::style('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css', array('media'=>'screen, projection'), TRUE); ?>
<?php echo Html::script('http://code.jquery.com/jquery-1.9.1.js'); ?>
<?php echo Html::script('http://code.jquery.com/ui/1.10.3/jquery-ui.js'); ?>

<script>
  
  function checking(t){
   //alert(t.id);
   //alert(t.value);

  

   
	if(t.id=='select'){
	   var temp= document.getElementById("select").value;
    
    if(temp=="yes"){
          document.getElementById("test").style.display= "inline";
    }else{
          document.getElementById("test").style.display= "none";
      
    }
	}
	
	if(t.id=="select1"){
	   var temp= document.getElementById("select1").value;
    if(temp=="Manually"){
          document.getElementById("test1").style.display= "none";
    }else{
      
          document.getElementById("test1").style.display= "inline";
    }
	}
	
  }
  </script>


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

<div class="wrapper_out">
  <div class="wrapper_in">
   
     <?php echo $header;?>
	<div class="top_line">
	
      <div class="top_line_in">
        <h1>Step 2: Define referral program rules</h1>
      </div>
	  
      <div class="top_line_b">
        <div class="top_line_b_in">
          <ul class="dash">
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/start">Campaign</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" style="color:#000000;" href="<?php echo URL::base(); ?>/customer/reward">Reward</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/emails">Emails</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/appearance">Appearance</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/integration">Integration</a></li>
          </ul>
        </div>
      </div>
    </div>
   

 
<!----<div class="main">--->

     <div class="form">
      <div class="form_in">
        
       <div class="reward">
       
       <h1>Define your campaign</h1>
	   
	    <?= Form::open('customer/reward',  array('enctype'=>'multipart/form-data')); ?>
		
       <div class="cam_input"><span>My campaign title is</span> 
	   
	    <?= Form::input('rpt','',  array('class'=>'aa_new','maxlength'=>'50', 'style'=>'width: 700px;')); ?>
	   <!---<input name="" type="text" class="aa_new" />---->
	   </div>
         <div class="cam_input"><span style="float: left;">My campaign description is</span> 
		 <?= Form::textarea('rpd', '',array('class'=>'aa_new','maxlength'=>'80', 'style'=>'height: 60px; width:648px;')); ?>
		 <!---<input name="" type="text" class="aa_new" />---->
		 
		 </div>
         <div class="cam_input"><span>My campaign will start on</span> 
		 
          <?= Form::input('start','',  array('id'=>'datepicker1','class'=>'aa_new')); ?>
           
		   <!--
		    <input name="" type="text" class="aa_new" />
		   --->
		 
		 <span>and will end on</span> 
		 
		 <?= Form::input('end','',  array('id'=>'datepicker2','class'=>'aa_new')); ?>
		 
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
	 
	 
  <?= Form::input('mrr','',  array('class'=>'aa_new', 'style'=>'width:50px;')); ?>
  
<!--<select name="mrr" class="asc_nn">
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
--->
	 
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


<select name="rwd" class="" id="select1" style="border: 2px solid #d2d2d2;color: #000;cursor: pointer;font: bold 18px Verdana,Geneva,sans-serif; text-align: center;"  onChange="checking(this);">
<option option="Coupon codes">Coupon codes</option>
<option option="Manually">Manually</option>
</select>

<span id="test1" > 
from this
<br>
 XLS 
<b>file</b>(<a style="text-decoration:none;" href="<?php echo URL::base(); ?>/uploads/demo.xlsx">click here</a> to see the organised structure).

<b><?php echo Form::file('codefile1', array('style'=>'margin: 0 0 0 -425px;opacity: 0; width: 75px;cursor: pointer;')); ?> </b>
	
</span>	
</span></div>

       

<?php } ?>

<?php if($paramid==2){ ?>
 <div class="cam_input">
 <span class="bb">
I would like to draw  

<?= Form::input('mrr4','',  array('class'=>'asc_nn', 'style'=>'width:45px;')); ?>
<!--<input name="mrr4" class="asc_nn" style="width:35px;">

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
--->

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
<select name="rf" class="asc_nn">
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

<?= Form::input('mrr','',  array('class'=>'asc_nn', 'style'=>'width:45px;')); ?>


<!--<select name="mrr" class="asc_nn">
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
</select>-->

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



<div class="cam_input">

<span class="bb">I  

<select id="select" name="ira" class="" style="border: 2px solid #d2d2d2;color: #000;cursor: pointer;font: bold 18px Verdana,Geneva,sans-serif; text-align: center;"  onChange="checking(this);">
<option value="yes">want</option>
<option value="no">Don`t want</option>
</select>



to give an instant reward to the participants <span id="test" > with a 

<select name="cc" class="asc">
<option option="one-time use coupon code">one-time use coupon code</option>
<option option="multi-time use coupon code">multi-time use coupon code</option>
</select>
from this XLS
<b>file</b>(<a style="text-decoration:none;" href="<?php echo URL::base(); ?>/uploads/demo.xlsx">click here</a> to see the organised structure).</span>

<b><?php echo Form::file('codefile2', array('style'=>'margin: 0 0 0 -425px;opacity: 0; width: 75px;cursor: pointer;')); ?> </b>

</span>

</div>





<div class="cam_input"><span class="bb">I  
<!--<b>want</b> --->

<select name="peu" class="asc">
<option option="yes">want</option>
<option option="no">Don`t want</option>
</select>

to send the status update once per week to every participant to inform them on their referral
status.</span>
</div>

<div class="cam_input">
 <span class="bb">
 

<?= Form::input('referralProgSocShareReward','',  array('class'=>'asc_nn', 'style'=>'width:45px;')); ?>
  Number of extra entries a participant get for sharing on the social network via the participant interface

</span>
</div>






       
                      <div class="mssgbox">
                           <!---<div class="box_text">
                                  To track visits link to your
                                  website will be shortened and
                                  will look similar to this one
                                  http://urlt.ag/gTue.
                                 </div>
			                ---->
                      </div>
       

	  
	    <?php //echo Form::hidden('refprogid', $refprogid); ?>
	   
	   <div style="margin:0px;float:right;">
	   <button type="submit" class="btn btn-primary btn-lg">Next</button>
	   </div> 
        
	
       <?//= Form::submit('create', 'Create'); ?>

       <?= Form::close(); ?>

       </div> 
        
        
      </div>
    </div>
	  
 
 
<!--- </div>----->
	
   <?php echo $footer;?>
	
   </div>
   </div>