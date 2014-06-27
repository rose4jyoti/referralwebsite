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
  
     <?php echo $header; ?>
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
    	<!--<li><a class="active" href="#tab1">Widget</a></li>-->
    	<li><a href="#tab2">Iframe</a></li> 
  
    </ul>
	
	<!-- //Tab buttons -->
	
	<?= Form::open('customer/integration'); ?>
    <div class="tabDetails">
    	<!--<div id="tab1" class="tabContents">
           <textarea name="widget" style="background-color:#FAFAFA; border: medium none; height: 150px;margin: 0; padding: 0;width: 100%;"><script id="invitebox-script" type="text/javascript">(function() {    var ib = document.createElement('script');    ib.type = 'text/javascript';    ib.async = true;    ib.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'invitebox.com/invitation-camp/5587/invitebox.js?key=713a962709b2585eccc840d3cb26142d&jquery='+(typeof(jQuery)=='undefined');    var s = document.getElementsByTagName('script')[0];    s.parentNode.insertBefore(ib, s);})();</script><a id="invitebox-href" href="<?php echo 'http://softoasistech.com/dev2013/referral/'; ?>importer/index.php?id=<?php echo $wid ?>">Refer a friend</a></textarea>
     
      </div><!-- //tab1 -->
    	<div id="tab2" class="tabContents">

              <textarea name="frame" style="background-color:#FAFAFA; border: medium none; height: 150px;margin: 0; padding: 0;width: 100%;">
			   <iframe allowtransparency="true" frameborder="0" scrolling="no" width="800px" height="650px" src="http://softoasistech.com/dev2013/referral/importer/index.php?id=<?php echo $wid ;?>">
               </iframe>

			  </textarea>
        </div><!-- //tab2 -->
   
  
    </div><!-- //tab Details -->
</div>
         <h1 class="unique_key"> Your unique key ID</h1>
		 <?php //$ukey=uniqid(); ?>
   
    <input name="ukey" value="<?php echo $ukey; ?>" type="text" class="inn_box" disabled/>

    <!----- 
	<button type="submit" style=" background: none repeat scroll 0 0 rgba(0, 0, 0, 0); border: medium none; margin:0 0 25px 865px;">
	     <?php echo Html::image('public/image/next.jpg', array('alt'=>'', 'class'=>'next_but'));  ?>
    </button>	
	---->
   
   <?= Form::close(); ?>
   
      </div>
    </div>
	
   
    <?php echo $footer; ?>
	
  </div>
</div>
