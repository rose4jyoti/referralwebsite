<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/style.css'); ?>

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
        <h1>Home</h1>
      </div>
    </div>
    <div class="form">
      <div class="form_in">
       


	  
		
		
		
		
      </div>
	  
	  <h1 class="b_heading">Home page contents goes here </h1>
	  
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
</body>
</html>
