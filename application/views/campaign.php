<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/style.css'); ?>



<body>
<div class="wrapper_out">
  <div class="wrapper_in">
    <div class="header_out">
      <div class="header_in">
        <div class="logo">
				<?php echo Html::image('public/image/dummy-logo.png', array('alt'=>''));  ?>

		
		</div>
        <span class="cus_name">Customer Name</span> 
        <!---ul class="main_nav">
          <li><a href="#">Campaigns</a> </li>
          <li> <a href="#">Account </a></li>
          <li> <a href="#">Support </a></li>
          <li><a href="#"> Logout </a></li>
        </ul--->
        
        <div class="new_ul">
          <ul id="menu">
            <li><a href="#">Campaigns</a></li>
            <li><a href="#">Account</a>
              <ul>
                <li><a href="#">The Team</a></li>
                <li><a href="#">History</a></li>
                <li><a href="#">Vision</a></li>
              </ul>
            </li>
            <li><a href="#">Support</a>
              <ul>
                <li><a href="#">Cozy Couch</a></li>
                <li><a href="#">Great Table</a></li>
                <li><a href="#">Small Chair</a></li>
                <li><a href="#">Shiny Shelf</a></li>
                <li><a href="#">Invisible Nothing</a></li>
              </ul>
            </li>
            <li><a href="#">Logout</a> </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="top_line">
      <div class="top_line_in">
        <h1>Dashboard</h1>
      </div>
    </div>
    <div class="form">
      <div class="form_in">
        <div class="top_menu">
          <div class="a_top">
            <h1>0</h1>
            <span>impressions
             <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>

			
			</span> </div>
          <div class="a_top">
            <h1>0</h1>
            <span>Participants 
			 <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			</span> </div>
          <div class="a_top">
            <h2>0</h2>
            <span>Shares 
			 <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			
			
			</span> </div>
          <div class="a_top">
            <h2>0</h2>
            <span>Clicks
           <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			
			</span> </div>
        </div>
        <div class="map">
          <div class="left_map">
	     <?php echo Html::image('public/image/graph_a.jpg', array('alt'=>''));  ?>
	  
		  
		  </div>
          <div class="left_map">
		  	     <?php echo Html::image('public/image/graph_b.jpg', array('alt'=>''));  ?>
		  
		  </div>
          <div class="left_map">
		  	     <?php echo Html::image('public/image/graph_c.jpg', array('alt'=>''));  ?>
		 
		  </div>
          <div class="left_map">
		  	     <?php echo Html::image('public/image/graph_d.jpg', array('alt'=>''));  ?>
		  
		  </div>
        </div>
      </div>
    </div>
   <div class="foter">
      <div class="foter_in">
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
</body>
</html>


