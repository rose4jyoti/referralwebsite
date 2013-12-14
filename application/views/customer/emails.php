<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/style.css'); ?>
<?php echo Html::style('public/css/page3.css'); ?>

<?php echo Html::script('public/js/ckeditor/ckeditor.js'); ?>


<body>

<div class="wrapper_out">
  <div class="wrapper_in">
    <div class="header_out">
      <div class="header_in">
        <div class="logo">
		<?php echo Html::image('public/image/dummy-logo.png', array('alt'=>''));  ?>
		
		
		</div>
       
        <!---ul class="main_nav">
          <li><a href="#">Campaigns</a> </li>
          <li> <a href="#">Account </a></li>
          <li> <a href="#">Support </a></li>
          <li><a href="#"> Logout </a></li>
        </ul--->
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
				
				<?= Form::input('rte','',  array('size'=>'24','class'=>'aa_new', 'style'=>'width: 265px;')); ?>
				<!---<input type="email"  size="24"/>---->
				<br />
                <p>From name display:&nbsp;
				
				<?= Form::input('fnd','', array('class'=>'aa_new')); ?>
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
				 
				 <?= Form::input('sub1','',  array('style'=>'width:595px;','class'=>'aa_new')); ?>
                 <!--<input type="text" size="60" />--->
				 
            </div>
            <div class="b3">
               Notification body<br /><br />
                  <div class="b3_img">
				  
				  
				  <textarea class="ckeditor" name="editor1">Enter..</textarea>
				  
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
			   
			   	<?= Form::input('sub2','',  array('style'=>'width:595px;','class'=>'aa_new')); ?>
                <!--<input type="text" size="60" />--->
              </div>
              <div class="c3">
              Notification body<br /><br />
			  
                  <div class="c3_img">
				  
				<textarea class="ckeditor" name="editor2">Enter..</textarea> 
				  
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
			   
			   <?= Form::input('sub3','',  array('style'=>'width:595px;','class'=>'aa_new')); ?>
                <!----<input type="text" size="60" />---->
              </div>
              <div class="d3">
              Notification body<br /><br />
                  <div class="d3_img">
                 <?php //echo Html::image('public/image/mail_box.png', array('alt'=>'','width'=>'700px','height'=>'337px'));  ?>
				 
				  <textarea class="ckeditor" name="editor3">Enter..</textarea>
				  
				  
				 
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
			   
			   <?= Form::input('sub4','',  array('style'=>'width:595px;','class'=>'aa_new')); ?>
                <!---<input type="text" size="60" />---->
              </div>
              <div class="e3">
              Notification body<br /><br />
                  <div class="e3_img">
				  
				  <textarea class="ckeditor" name="editor4">Enter..</textarea>
				  
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
	  
 <button type="submit" style="    background: none repeat scroll 0 0 rgba(0, 0, 0, 0); border: medium none; margin:0 0 25px 1065px;">
	     <?php echo Html::image('public/image/next.jpg', array('alt'=>'', 'class'=>'next_but'));  ?>
  </button>	  
	  	  
 <?//= Form::submit('Next', 'Next'); ?>

<?= Form::close(); ?>
	  
	  
</div>


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

</body>
</html>
