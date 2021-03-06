<?php defined('SYSPATH') or die('No direct script access.'); ?>


<!-----Bootstrap library----->
 <?php echo Html::style('public/bootstrap-3.1.1-dist/css/bootstrap.min.css'); ?>
  <?php echo Html::style('public/bootstrap-3.1.1-dist/css/bootstrap.css'); ?>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <!----Include all compiled plugins (below), or include individual files as needed----> 
  <?php echo Html::style('public/bootstrap-3.1.1-dist/js/bootstrap.min.js'); ?>



<?php echo Html::style('public/css/style.css'); ?>
<?php echo Html::style('public/css/kooltip/kooltip.css'); ?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
	 
	  ////////Pie chart////////
        var data = google.visualization.arrayToDataTable([
         <?php echo $dataresult1; ?>
        ]);

        var options = {
          title: 'Shares'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);

	 ///////Bar chart /////
	 var data = google.visualization.arrayToDataTable([
        <?php echo $dataresult2; ?>
        ]);

        var options = {
          title: 'Clicks',
          vAxis: {title: 'Campaign',  titleTextStyle: {color: 'green'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('bar'));
        chart.draw(data, options);
		
		
     }
</script>

<style type="text/css">
a.change{
background-image:url("<?php echo URL::base(); ?>/public/image/hover.png");
 float: left;
  height: 22px;
 margin: 0;
width: 18px;
}
a.change:hover{
background-image:url("<?php echo URL::base(); ?>/public/image/hover.png");
 float: left;
 margin: 0;

}
* {
    box-sizing: none !important;
    box-sizing: inherit !important;
}

</style>

<div class="wrapper_out">
  <div class="wrapper_in">
   

    <?php echo $header ?>
	
	
    <div class="top_line">
      <div class="top_line_in">
        <h1>
         <?php foreach ($details as $temp) : 
           $temp=$temp['referralProgTitle'];
		   echo $temp= substr($temp,0,42)."..";
			endforeach; 
		  ?>
			
		
		 <span style="float: right; padding: 0 55px 0 0;">
		 <?php if($status=="Active"){ ?>
		 
		   <a title="Play/Pause campaign" style="text-decoration:none;" href="<?php echo URL::base(); ?>/customer/activation/<?php echo $rpdid; ?>/0"><?php echo Html::image('public/image/pause.png', array('alt'=>''));  ?> </a>
		
		 <?php } ?>
		 
		 <?php if($status=="Inactive"){ ?>
		   <a class="" title="Play/Pause campaign" style="text-decoration:none;" href="<?php echo URL::base(); ?>/customer/activation/<?php echo $rpdid; ?>/1"><?php echo Html::image('public/image/play.png', array('alt'=>''));  ?> 
		   </a>
		 
		 <?php } ?>
		 
		   <a title="Delete campaign" href="<?php echo URL::base(); ?>/customer/delete/<?php echo $rpdid; ?>" onclick="javascript: if(!confirm('Are you sure you want to delete thiscampaign ?')){void(0); return false;}"><?php echo Html::image('public/image/del.png', array('alt'=>''));  ?> </a>
		 </span>

		</h1>
		 
      </div>
      <div class="top_line_b">
        <div class="top_line_b_in">
		  
		  <ul class="dash">
            <li><a style="color:#000000;" class="custlink" href="<?php echo URL::base(); ?>/customer/dashboard/<?php echo $rpdid; ?>">Dashboard</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/creward/<?php echo $rpdid; ?>">Reward</a><b class="charc">&#62;</b></li>
            <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/cemails/<?php echo $rpdid; ?>">Emails</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/cappearance/<?php echo $rpdid; ?>">Appearance</a><b class="charc">&#62;</b></li>
           <li><a class="custlink" href="<?php echo URL::base(); ?>/customer/cintegration/<?php echo $rpdid; ?>">Integration</a></li>
          </ul>
		  
        </div>
      </div>
    </div>
    <div class="form">
      <div class="form_in">
        <div class="top_menu">
          <div class="a_top">
            <h1><?php echo $no_impressions;?></h1>
            <span>impressions 
			<?php //echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			<a href="#" class="kooltip"><span class="tooltip skyblue bottom center w200 slide-up">Views of the pages with widget code.</span><?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?></a>
			
			</span> </div>
          <div class="a_top">
            <h2><?php echo $referrals;?></h2>
            <span>Invites
			<?php //echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
		    <a href="#" class="kooltip"><span class="tooltip skyblue bottom center w200 slide-up">Invites to join Referral program.</span> <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));    ?></a>
			
			</span> </div>
          <div class="a_top">
            <h1><?php echo $participants;?></h1>
            <span>Participants
            <?php //echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			 <a href="#" class="kooltip"><span class="tooltip skyblue bottom center w200 slide-up">Campaign participants are people who entered your referral program either by entering your email address or by sharing your site via social network.</span> <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?></a>
			
			</span> </div>
          <div class="a_top">
            <h2><?php echo $referrals;?></h2>
            <span>Shares 
			<?php //echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			 <a href="#" class="kooltip"><span class="tooltip skyblue bottom center w200 slide-up">Indicates how many times your promo message was shared by campaign participants via the channels you choose.</span> <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));   ?></a>
			 
			</span> </div>
          <div class="a_top">
            <h2><?php echo $no_clicks;?></h2>
            <span>Clicks
			<?php //echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			 <a href="#" class="kooltip"><span class="tooltip skyblue bottom center w200 slide-up">Clicks from unique users on the links which were distributed by your campaign participants.</span> <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));    ?></a>
			 
			</span> </div>
          <div class="a_top">
            <h2>0</h2>
            <span>Rewards
            <?php //echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));  ?>
			<a href="#" class="kooltip"><span class="tooltip skyblue bottom center w200 slide-up">Rewards to the users .</span> <?php echo Html::image('public/image/question.jpg', array('alt'=>'','class'=>'qq'));    ?></a>
			
			</span> </div>

			
        </div>
        <div class="map">
          <div class="left_map">
		     <div id="piechart" style="width: 475px; height: 320px;"></div>
		   <?php //echo Html::image('public/image/graph_c.jpg', array('alt'=>''));  ?>
		  </div>
          <div class="left_map">
		   <div id="bar" style="width: 475px; height: 320px;"></div>
		  <?php //echo Html::image('public/image/graph_d.jpg', array('alt'=>''));  ?>
		  </div>
        </div>
        <h1 class="Participants_List">Participants List
		
		    <!-----------Export bytton------->
             <span><a href="<?php echo URL::base(); ?>customer/export/<?php echo $rpdid; ?>"><button class="btn">Export</button></a></span> 
			<!------------- END ------------->
		
		
		</h1>
		
			
			
			
			
			







		<div class="b_textarea" style="">
         

		  

			
<!--------Start participant list--------->			
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Email</th>
<th>Date</th>
<th>Email sent</th>
<th>Subscribed</th>
<th>Reward</th>
</tr>

</thead>
<tbody>


<?php $i=1; 
foreach ($listsn as $temp) : ?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $temp['userName']; ?> </td>
<td><?php echo $temp['userEmail']; ?></td>
<td><?php echo substr($temp['userRegistredDate'],0,10) ; ?></td>
<td><?php echo $temp['email_sent']; ?></td>
<td><?php echo $temp['subscribed']; ?></td>
<td>0 </td>
</tr>


<?php 
$i++;
endforeach; ?>


</thead>
<tbody>
</table>
<!--------end participant list--------->		 

	   </div>
	   

		   
      </div>
	  
	 <a style="margin: 20px 0 0 915px;" href="<?php echo URL::base(); ?>/customer/creward/<?php echo $rpdid; ?>">
		 <button class="btn btn-primary btn-lg" type="button">Next</button>
	  </a>
	  
		
    </div>
	
	
    <?php echo $footer; ?>
	
  </div>
</div>



