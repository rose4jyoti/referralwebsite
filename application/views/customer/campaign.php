<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php echo Html::style('public/css/style.css'); ?>
<?php echo Html::style('public/css/kooltip/kooltip.css'); ?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
	  

	  ////////Pie chart1//////////
        var data = google.visualization.arrayToDataTable([
         <?php echo $dataresult1; ?>
        ]);

        var options = {
          title: 'Impressions'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
		
	  ////////Pie chart2//////////
	   var data = google.visualization.arrayToDataTable([
          <?php echo $dataresult2; ?>
        ]);

        var options = {
          title: 'Shares'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
		
		
	 ///////Bar chart 1//////
	    var data = google.visualization.arrayToDataTable([
          <?php echo $dataresult3; ?>
        ]);

        var options = {
          title: 'Participant',
          hAxis: {title: 'Campaign', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('bar1'));
        chart.draw(data, options);
		
	///////Bar chart 2//////
	 var data = google.visualization.arrayToDataTable([
        <?php echo $dataresult4; ?>
        ]);

        var options = {
          title: 'Clicks',
          vAxis: {title: 'Campaign',  titleTextStyle: {color: 'green'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('bar2'));
        chart.draw(data, options);
		
		
     }
</script>
	
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
			
			 <a href="#" class="kooltip"><span class="tooltip skyblue bottom center w200 slide-up">Views of the pages with widget code.</span><?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?></a>
             <?php //echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>

			
			</span> </div>
          <div class="a_top" style="width:247px;">
            <h1>0</h1>
            <span>Participants 
			  <a href="#" class="kooltip"><span class="tooltip skyblue bottom center w200 slide-up">Campaign participants are people who entered your referral program either by entering your email address or by sharing your site via social network.</span> <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?></a>
			  
			 <?php //echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			 
			</span> </div>
          <div class="a_top" style="width:247px;">
            <h2>0</h2>
            <span>Shares 
			  <a href="#" class="kooltip"><span class="tooltip skyblue bottom center w200 slide-up">Indicates how many times your promo message was shared by campaign participants via the channels you choose.</span> <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));   ?></a>
			 <?php //echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			
			
			</span> </div>
          <div class="a_top" style="width:247px;">
            <h2>0</h2>
            <span>Clicks
			<a href="#" class="kooltip"><span class="tooltip skyblue bottom center w200 slide-up">Clicks from unique users on the links which were distributed by your campaign participants.</span> <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));    ?></a>
           <?php //echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			
			</span> </div>
        </div>
        <div class="map">
          <div class="left_map">
	        <?php //echo Html::image('public/image/graph_a.jpg', array('alt'=>''));  ?>
	        <div id="piechart1" style="width: 475px; height: 320px;"></div>
		  
		  </div>
          <div class="left_map">
		  	  <?php //echo Html::image('public/image/graph_b.jpg', array('alt'=>''));  ?>
			 <div id="bar1" style="width: 475px; height: 320px;"></div>
		  
		  </div>
          <div class="left_map">
		  	  <?php //echo Html::image('public/image/graph_c.jpg', array('alt'=>''));  ?>
		      <div id="piechart2" style="width: 475px; height: 320px;"></div>
		 
		  </div>
          <div class="left_map">
		  	     <?php //echo Html::image('public/image/graph_d.jpg', array('alt'=>''));  ?>
		         <div id="bar2" style="width: 475px; height: 320px;"></div>
		  </div>
        </div>
      </div>
    </div>
	
	

  </div>
</div>



