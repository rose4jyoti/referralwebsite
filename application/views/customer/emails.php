<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php //unset($_SESSION['rte']);?>
<?php if(isset($_SESSION['rte'])){
 $rte= $_SESSION['rte'];
 $fnd= $_SESSION['fnd'];
 $sub1= $_SESSION['sub1'];
 $editor1= $_SESSION['editor1'];
 $sub2= $_SESSION['sub2'];
 $editor2= $_SESSION['editor2'];
 $sub3= $_SESSION['sub3'];
 $editor3= $_SESSION['editor3'];
  $sub4= $_SESSION['sub4'];
 $editor4= $_SESSION['editor4'];
}else{
 $rte= '';
 $fnd= '';
 $sub1= '';
 $editor1='';
 
 $sub2= '';
 $editor2= ''; 
 $sub3='';
 $editor3= '';
 $sub4='';
 $editor4= '';
}
//print_r($_SESSION);?>


<?php echo Html::style('public/css/style.css'); ?>
<?php echo Html::style('public/css/page3.css'); ?>
<?php echo Html::script('public/js/ckeditor/ckeditor.js'); ?>


<body>

<div class="wrapper_out">
  <div class="wrapper_in">
    
	 <?php echo $header; ?>
	
    <div class="top_line">
      <div class="top_line_in">
        <h1>Step 3: Built your emails content</h1>
      </div>
      <div class="top_line_b">
        <div class="top_line_b_in">
          <ul class="dash">
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/start">Campaign</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/reward">Reward</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" style="color:#000000;" href="<?php echo URL::base(); ?>/customer/emails">Emails</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/appearance">Appearance</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/integration">Integration</a></li>
          </ul>
        </div>
      </div>
    </div>







<div class="main" style="float:left;">
    <div class="a_main">
          <div class="a">
                <div class="a1">
                   <div class="a1_heading">
				   
			<?= Form::open('customer/emails'); ?>
			
             Email settings
                </div><br />
                Reply to email: &nbsp;
				
				<?= Form::input('rte',$rte,  array('size'=>'24','class'=>'aa_new', 'style'=>'width: 265px;')); ?>
				<!---<input type="email"  size="24"/>---->
				<br />
                <p>From name display:&nbsp;
				
				<?= Form::input('fnd',$fnd, array('class'=>'aa_new')); ?>
				<!------<input type="text" />----->
				</p>
                </div>
          </div>
    </div>
<div class="b_main" style="float:left; height:auto;">
        <div class="b">
             <div class="b1">
                  <div class="b1_heading">Campaign entry confirmation email</div>
                  
                  <div class="b1_img">
				  
				  <?php //echo Html::image('public/image/button.png', array('alt'=>'','height'=>'29px','width'=>'76px'));  ?>
				 
				  
				  <select name="een" class="asc">
                    <option option="send">Send</option>
                   <option option="dontsend">Don`t Send</option>
                   </select>
				   
				   
				   
				  </div>
                  
                   <div class="b1_text">this message to participant when he enters the campaign.</div>
            </div>
            <div class="b2">
                 Subject<br />
				 
				 <?= Form::input('sub1',$sub1,  array('style'=>'width:595px;','class'=>'aa_new')); ?>
                 <!--<input type="text" size="60" />--->
				 
            </div>
            <div class="b3">
               Notification body<br /><br />
                  <div class="b3_img">
				
				  <textarea class="ckeditor" name="editor1"><?php echo $editor1; ?></textarea>
				  
				   <?php //echo Html::image('public/image/mail_box.png', array('alt'=>'','width'=>'700px','height'=>'337px'));  ?>
				 
				 
				  
				  </div>
                  <div class="b3_mssgbox">
                        <div class="b3_text">
                              You can use 
							  <b>[personal_link]
							     [personal_firstname]
                                 [personal_lastname]
							  </b>
							  
							  <br />
                               placeholder to include <br />
                               personal information related <br />
                               to the campaign participant.<br />
							  
							  
							    
                         </div>
                  </div>
            </div>
        </div>
    </div>
    
    <div class="c_main" style="float:left; height:auto;">
         <div class="c">
           <div class="c1">
                 <div class="c1_heading">
                     Reward notification email
                    </div>
                    <!--- <div class="c1_text">
                    when participants complete their referral goal they automatically will get the following message:
                    </div>
					
					---->
					
					<br />
              <div class="c2">
               Subject<br />
			   
			   	<?= Form::input('sub2',$sub2,  array('style'=>'width:595px;','class'=>'aa_new')); ?>
                <!--<input type="text" size="60" />--->
              </div>
              <div class="c3">
              Notification body<br /><br />
			  
                  <div class="c3_img">
				  
				<textarea class="ckeditor" name="editor2"><?php echo $editor2; ?></textarea> 
				  
              <?php //echo Html::image('public/image/mail_box.png', array('alt'=>'','width'=>'700px','height'=>'337px'));  ?>
				  
				  
                  </div>
           
				  <div class="c3_mssgbox">
                        <div class="c3_text">
                  You can use <!--<b>[personal_link]</b>--->  <br />
				           <b>[personal_firstname]</b>
                            <b>[personal_lastname] </b>
				       
				       
                          placeholder to include <br />
                          personal information related <br />
                          to the campaign participant.<br />
                         </div>
                  </div>
	
				  
            </div>    
             
         </div>
   </div>
   </div>
    <div class="d_main" style="float:left; height:auto;">
         <div class="d">
              <div class="d1">
                  <div class="d1_heading">
                        Campaign referral email
                    </div>
                    <div class="d1_text">
                     Email sent when participant invite their contacts to enter the referral program. This<br />email will be received as it was sent by the participants and not by your company.
                    </div>
               </div>
                <div class="d2">
               Subject<br />
			   
			   <?= Form::input('sub3',$sub3,  array('style'=>'width:595px;','class'=>'aa_new')); ?>
                <!----<input type="text" size="60" />---->
              </div>
              <div class="d3">
              Notification body<br /><br />
                  <div class="d3_img">
                 <?php //echo Html::image('public/image/mail_box.png', array('alt'=>'','width'=>'700px','height'=>'337px'));  ?>
				 
				  <textarea class="ckeditor" name="editor3"><?php echo $editor3; ?></textarea>
				  
				  
				 
                  </div>
                  <div class="d3_mssgbox">
                        <div class="d3_text">
                  You can use <b>
				  [personal_link]
					[personal_firstname]
                    [personal_lastname]
				  </b><br />
                    placeholder to include <br />
                    personal information related <br />
                    to the campaign participant.<br />
                         </div>
                  </div>
            </div> 
      </div>
    </div>
<div class="e_main" style="float:left; height:auto;">
      <div class="e">
              <div class="e1">
                  <div class="e1_heading">
                        Reminder email notification 
                    </div>
                    <div class="e1_text">
         Participants who want to remind their invited but not registered contacts to enter<br />
         the referral program can send them an email through their account. this email will<br />be shown as if it was sent by the participants and not from your company.
                    </div>
               </div>
                <div class="e2">
               Subject<br />
			   
			   <?= Form::input('sub4',$sub4,  array('style'=>'width:595px;','class'=>'aa_new')); ?>
                <!---<input type="text" size="60" />---->
              </div>
              <div class="e3">
              Notification body<br /><br />
                  <div class="e3_img">
				  
				  <textarea class="ckeditor" name="editor4"><?php echo $editor4; ?></textarea>
				  
                   <?php //echo Html::image('public/image/mail_box.png', array('alt'=>'','width'=>'700px','height'=>'337px'));  ?>
				 


				
                  </div>
                  <div class="e3_mssgbox">
                        <div class="e3_text">
                  You can use 
				   <b>
				   [personal_link]
				   [personal_firstname]
                   [personal_lastname]
				   
				   </b>
				   
				   <br />
                             placeholder to include <br />
                              personal information related <br />
                             to the campaign participant.<br />
                         </div>
                  </div>
		  
            </div> 
			
			
			 
			 
      </div>
	  

	  </div>
	  
	  
<div style="margin:30px 100px 30px 0px;float:right;">
<button class="btn btn-primary btn-lg" type="submit">Next</button>
</div>
 
	  	  
 <?//= Form::submit('Next', 'Next'); ?>

<?= Form::close(); ?>
	  
	  
</div>


 <?php echo $footer; ?>

  </div>
</div>

</body>
</html>
