<?php
//session_start();
 //echo $_SESSION['compaingnid'];
?>
<?php 
//define("SITE","http://softoasistech.com/dev2013/referral");
define("SITE","http://local.referowl.com");
?>


<?php if($progstatus=="Active"){ ?>

<span style="display:none; color: #FF0000;" id="warning"> Requset could not be handled.Try again Later. </span>
			 
<!---<form name="myForm" id="import_form" action="" class="center" method="post" onsubmit="myFunction()">-->
<form name="myForm" action="" class="center" method="post" onsubmit="return validateForm();" >
	<?php if (!$this->current_class->ExternalAuth) {?>
		

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

				
			<!----<tr>
				<td>Email</td>
			</tr>
				
			<tr>
				<td><input id='email' type="text" name="email" value="" class="in_box" /></td>
			</tr>
			<tr>
				<td><span id='pf'>Your password</span></td>
			</tr>
			<tr>
				<td><input id="password" type="password" name="pswd" value="" class="in_box" onclick="check()"/>
				
				
				
				</td>
				
				<td>

                
	  <input  type="hidden" name="stage" value="1"/>			
	   
	   <input id="soption" type="hidden" name="contacts_option" value="<?php echo $selected_option; ?>"/>

	   
		<button type="submit" id="btnContactsForm" value="import" style="border:none; background:none;">
		  <img src="<?php echo SITE; ?>/public/image/next_but.jpg"/>
		<?php //echo $this->current_class->ExternalAuth? "Authorize Externally" : "Next"; ?>
		</button>	
			
		
		</td>
	  </tr>
	  ---->
	  
	   <tr>
	    <td>
		 <a href="<?php echo SITE;?>/widget/oauth-api/login_with_microsoft.php"> <img style="height:100px;width:150px;" src="<?php echo SITE; ?>/public/image/gmail.jpg"/></a>
		</td>
	   </tr>

			

	<?php } ?>
	
		
	<?php if ($this->error_returned && $this->error_message) {?>
		<span style="color:red;"><?php echo $this->error_message; ?></span><br/>
	<?php } ?>
		

		   
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

<script>
function validateForm()
{
var x=document.forms["myForm"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  
   document.getElementById("warning").style.display="block"; 
  //alert("Not a valid e-mail address");
  return false;
  }
}
</script>
	