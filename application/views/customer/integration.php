<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/style.css'); ?>
<?php echo Html::style('public/css/j_css.css'); ?>

<?php echo Html::script('public/js/jquerytab.js'); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$(".tabContents").hide(); // Hide all tab conten divs by default
		$(".tabContents:first").show(); // Show the first div of tab content by default
		
		$("#tabContaier ul li a").click(function(){ //Fire the click event
			
			var activeTab = $(this).attr("href"); // Catch the click link
			$("#tabContaier ul li a").removeClass("active"); // Remove pre-highlighted link
			$(this).addClass("active"); // set clicked link to highlight state
			$(".tabContents").hide(); // hide currently visible tab content div
			$(activeTab).fadeIn(); // show the target tab content div by matching clicked link.
		});
	});
</script>	

<div class="wrapper_out">
  <div class="wrapper_in">
    <div class="header_out">
      <div class="header_in">
        <div class="logo">
		
		<?php echo Html::image('public/image/dummy-logo.png', array('style'=>''));  ?>
		
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
        <h1>Step 5: Integrate the referral program into your website</h1>
      </div>
      <div class="top_line_b">
        <div class="top_line_b_in">
          
		  <ul class="dash">
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/start">Campaign</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/reward">Reward</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/emails">Emails</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/appearance">Appearance</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" style="color:#000000;" href="<?php echo URL::base(); ?>/customer/integration">Integration</a></li>
          </ul>
		  
        </div>
      </div>
    </div>
    <div class="form">
      <div class="form_in">
        <h1 class="api_name">API Script</h1>
        <h2 class="s_head">insert the script into your website. you can insert the API as a Widget or as an iframe to your website</h2>
      <div id="tabContaier">
	<ul>
    	<li><a class="active" href="#tab1">Widget</a></li>
    	<li><a href="#tab2">Iframe</a></li> 
  
    </ul>
	
	<!-- //Tab buttons -->
	
	<?= Form::open('customer/integration'); ?>
    <div class="tabDetails">
    	<div id="tab1" class="tabContents">
           <textarea name="widget" style="background-color:#FAFAFA; border: medium none; height: 150px;margin: 0; padding: 0;width: 100%;"><script id="invitebox-script" type="text/javascript">(function() {    var ib = document.createElement('script');    ib.type = 'text/javascript';    ib.async = true;    ib.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'invitebox.com/invitation-camp/5587/invitebox.js?key=713a962709b2585eccc840d3cb26142d&jquery='+(typeof(jQuery)=='undefined');    var s = document.getElementsByTagName('script')[0];    s.parentNode.insertBefore(ib, s);})();</script><a id="invitebox-href" href="<?php echo URL::base(); ?>/home/einsert/<?php echo $wid ?>">Refer a friend</a></textarea>
     
      </div><!-- //tab1 -->
    	<div id="tab2" class="tabContents">

              <textarea name="frame" style="background-color:#FAFAFA; border: medium none; height: 150px;margin: 0; padding: 0;width: 100%;"><script id="invitebox-script" type="text/javascript">(function() {    var ib = document.createElement('script');    ib.type = 'text/javascript';    ib.async = true;    ib.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'invitebox.com/invitation-camp/5587/invitebox.js?key=713a962709b2585eccc840d3cb26142d&jquery='+(typeof(jQuery)=='undefined');    var s = document.getElementsByTagName('script')[0];    s.parentNode.insertBefore(ib, s);})();</script><a id="invitebox-href" href="<?php echo URL::base(); ?>/home/einsert/<?php echo $wid ?>">Refer a friend</a></textarea>
        </div><!-- //tab2 -->
   
  
    </div><!-- //tab Details -->
</div>
         <h1 class="unique_key"> Your unique key ID</h1>
		 <?php $uniquekey=uniqid(); ?>
   
    <input name="ukey" value="<?php echo $uniquekey; ?>" type="text" class="inn_box" disabled/>

    <!-----
	<button type="submit" style=" background: none repeat scroll 0 0 rgba(0, 0, 0, 0); border: medium none; margin:0 0 25px 865px;">
	     <?php echo Html::image('public/image/next.jpg', array('alt'=>'', 'class'=>'next_but'));  ?>
    </button>	
	---->
   
   <?= Form::close(); ?>
   
      </div>
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
