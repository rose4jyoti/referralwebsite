<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/style.css'); ?>


<div class="wrapper_out">
  <div class="wrapper_in">
  
     <div class="header_out">
      <div class="header_in">
        <div class="logo">
		<?php echo Html::image('public/image/dummy-logo.png', array('alt'=>''));  ?>
		
		
		</div>
        <span class="cus_name"> Welcome &nbsp;<?php echo $username; ?></span> 
        <!---ul class="main_nav">
          <li><a href="#">Campaigns</a> </li>
          <li> <a href="#">Account </a></li>
          <li> <a href="#">Support </a></li>
          <li><a href="#"> Logout </a></li>
        </ul--->
        
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
        <h1>Dashboard</h1>
      </div>
    </div>
    <div class="form">
      <div class="form_in">
        <div class="top_menu">
          <div class="a_top" style="width:247px;">
            <h1>0</h1>
            <span>impressions
             <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>

			
			</span> </div>
          <div class="a_top" style="width:247px;">
            <h1>0</h1>
            <span>Participants 
			 <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			</span> </div>
          <div class="a_top" style="width:247px;">
            <h2>0</h2>
            <span>Shares 
			 <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			
			
			</span> </div>
          <div class="a_top" style="width:247px;">
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
	
	

  </div>
</div>



