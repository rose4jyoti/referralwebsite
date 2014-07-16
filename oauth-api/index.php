<?php
$compaingn_id =$_REQUEST['id'];
$con=mysqli_connect("localhost","softoasi_referal","]N^fwqZ*@7X9","softoasi_referral");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

/*******No. of Impression*******/
$result = mysqli_query($con, "SELECT `no_impressions`FROM `referralprogs`WHERE `refProgID` = '$compaingn_id' limit 1");

while($row = mysqli_fetch_array($result))
  {
  $current_click= $row['no_impressions'];
  
  }
  $current_click = $current_click+1;
mysqli_query($con,"update `referralprogs` set `no_impressions` = $current_click where `refProgID` = '$compaingn_id'");


/*******No. of clicks*******/
$result2 = mysqli_query($con, "SELECT `no_clicks`FROM `rp_referralprogs`WHERE `refProgID` = '$compaingn_id' limit 1");

while($row = mysqli_fetch_array($result2))
  {
  $current_click= $row['no_clicks'];
  
  }
$current_click = $current_click+1;
mysqli_query($con,"update `rp_referralprogs` set `no_clicks` = $current_click where `refProgID` = '$compaingn_id'");

?>

<!----------Data fetching from database----->
<?php
$dbhost = 'localhost';
$dbuser = 'softoasi_referal';
$dbpass = ']N^fwqZ*@7X9';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{  
  die('Could not connect: ' . mysql_error());
}
 //$sql = 'SELECT * FROM rp_referralprog_images';
$sql = "SELECT * FROM rp_referralprog_images WHERE referralProgID='". $compaingn_id."'  ORDER BY referralProgImageID Asc";

mysql_select_db('softoasi_referral');
$result = mysql_query( $sql, $conn );
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
   if($row['referralProgImageOrder']=='1'){
     $img1= $row['referralProgImage'];
   }
}

$sql2 ="SELECT * FROM referralprogdetails WHERE referralProgID='". $compaingn_id."' ";
$result2 = mysql_query( $sql2, $conn );
while($row = mysql_fetch_array($result2, MYSQL_ASSOC))
{
      $refprogdesc= $row['referralProgDescription'];
}

/*********Referralprogs*************/
$sql3 ="SELECT * FROM referralprogs WHERE refProgID='". $_REQUEST['id']."' ";
$result3 = mysql_query( $sql3, $conn );
while($row = mysql_fetch_array($result3, MYSQL_ASSOC))
{
     $progstatus= $row['refProgStatus'];
}

mysql_close($conn);
?>

<?php 
define("SITE","http://softoasistech.com/dev2013/referral");
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Referral contacts importer</title>
<!---<LINK href="style.css" rel="stylesheet" type="text/css">--->

<LINK href="style1.css" rel="stylesheet" type="text/css">
<LINK href="page7.css" rel="stylesheet" type="text/css">

</head>
<body>

<div class="wrapper_out">
  <div class="wrapper_in" style="width:auto;">
     
	
<!-------------------start contents----------------->

<div class="block_out" style='width:auto;'>
   <div class="img1" style="margin: 0px">
                	<div class="img_in">
                                  
				     <div style="padding: 0 0 0 0; min-height: 401px;" class="left">
                        

                         <?php  if(isset($img1)){ ?>
  
					        <img height="397px" width="344px" src="http://softoasistech.com/dev2013/referral/uploads/<?php echo $img1?>" alt="Uploaded avatar" />
					
							<?php }else{ ?>
							
							    <img height="397px" width="344px" src="http://softoasistech.com/dev2013/referral/public/image/a.jpg" alt="Uploaded avatar" />
						
						<?php }	?>
							   
                            </div>
                            <div class="right">
                            <p>
								<b style="font-weight:bold;text-transform: capitalize;"> 
								        <?php //echo substr($refprogdesc, '0', '30').'..';?>                     	
								        <?php echo $refprogdesc;?>                     	
							    </b>
						
	                       </p>
	
	
	                    
					


<?php// require_once $this->include_form; ?>


<?php if($progstatus=="Active"){ ?>

<span style="display:none; color: #FF0000;" id="warning"> Requset could not be handled.Try again Later. </span>
			 
<form name="myForm" action="" class="center" method="post" onsubmit="return validateForm();" >
	
		<table height="229" class="table">
		    
			<tbody>
			<tr>				  
			<td>
			<h1>Login to your webmail account below <b>(Hotmail,Gmail,Yahoo,AOL)</b>
			 and discover how much money you colud receive!</h1>
			</td>
            </tr>
				<tr> 
							  
                </tr>

				
			<tr>
				<td>Email</td></tr>
				
				<tr>
				<td><input id='email' type="text" name="email" value="" class="in_box" /></td>
			</tr>
			<tr>
				<td><span id='pf'>Your password</span></td></tr>
				<tr>
				<td><input id="password" type="password" name="pswd" value="" class="in_box" onclick="check()"/>
				
				
				<!---------------------->
				</td>
				
				<td>
				

        <!------------------------------------------>
	  <input  type="hidden" name="stage" value="1"/>			
	   
	   <input id="soption" type="hidden" name="contacts_option" value="<?php echo $selected_option; ?>"/>

	   
		<button type="submit" id="btnContactsForm" value="import" style="border:none; background:none;">
		  <img src="<?php echo SITE; ?>/public/image/next_but.jpg"/>
		<?php //echo $this->current_class->ExternalAuth? "Authorize Externally" : "Next"; ?>
		</button>	

        <!------------------------------------------->				
				
				
				
				
		</td>
	  </tr>
	  


		   
		                     <tr>
                                <td>
								<br>
								<span style="font:11px Verdana,Geneva,sans-serif;">
								Already have a Participant number? <a href="#">Click here</span>
								</a>
								</td>
                              </tr>
		
		   </tbody>
		</table>
		
		
		
	</form>
	
<?php } else{ ?>
  <div style="  background-color: #FFFFFF;
    border: 1px solid #000000;
    float: left;
    font: 14px Verdana,Geneva,sans-serif;
    padding: 94px 10px;
    width: 90%;">
   Sorry, this Referral program is not Active.
  </div>
<?php } ?>













		

	 
	         <div class="lock">
							<img class="bbb_n" alt="" src="/dev2013/referral/public/image/lock.jpg">						
							
							<h1>your password will not be saved and no email message will be sent to your contacts without your consent.</h1>
							</div>
							
							<h2 class="bottom_text">Read the CONTEST <b>term and conditions</b> before participating</h2>
							
                            </div>
                            
                            </div>
                        	
                    </div>
					
		   
         </div>
                
   </div>
		  
</div>


	
	
   </div>
  </div>
  
	
	



<!---------------------------------------------------------->



<script type="text/javascript">
	try
	{
	    var auth_window = window.ExternalAuthentication;
	}
	catch(ignore)
	{
	    var auth_window = undefined;
	}

    (function(){
		var external_auth = "external.php?contacts_option=<?php echo $selected_option; ?>";
        submit_form = function(form){
            return function(){
                if (form_ready){
                    form.submit();
                    return true;
				}
				else if (external_auth != "") {
					if (auth_window)
						auth_window.close();
                    auth_window = window.open(external_auth, "ExternalAuthentication", "top=200,left=200,width=500,height=400,location=yes,status=yes,resizable=yes", true);
                    auth_window.focus();
                    return false;
				}
            }
        }

        toggle_checked = function(check){
            return function(){
                check.checked = !check.checked;
            }
        }

        cancel_propagation = function(e){
            if (!e) {
                var e = window.event;
            }

            e.cancelBubble = true;

            if (e.stopPropagation)
                e.stopPropagation();
        }

        set_checked = function(checkboxes){
            return function(){
                for (i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = this.checked;
                }
            }
        }

        var invite_form = document.getElementById("invite_form");
		if (invite_form) {
			var table_rows = invite_form.getElementsByTagName("tr");
			var form_contacts = [];
			for (var i = 1; i < table_rows.length; i++) {
				var input = table_rows[i].getElementsByTagName("input");
				if (!input || input[0].type != "checkbox")
					continue;
				input[0].onclick = cancel_propagation;
				table_rows[i].onclick = toggle_checked(input[0]);
				form_contacts.push(input[0]);
			}

			var toggleAll = document.getElementById("ToggleSelectedAll");
			toggleAll.onclick = set_checked(form_contacts);
		}
		var import_form = document.getElementById("import_form");
		if (import_form)
		{
			import_form.onsubmit = submit_form(import_form);
		}
    })();

</script>
</body>
</html>