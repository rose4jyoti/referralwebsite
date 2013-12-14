<script>
function check()
{
 var email= document.getElementById("email").value;
 //alert("Hello World!");
 //alert(first);
 
 if(~email.indexOf('gmail')){
    document.getElementById("soption").value='Gmail';
	document.getElementById('pf').innerHTML="Your Gmail Password";
	}
 if(~email.indexOf('yahoo')){
     document.getElementById("soption").value='Yahoo';
	 document.getElementById('pf').innerHTML="Your Yahoo Password";
	}
 if(~email.indexOf('hotmail')){
    document.getElementById("soption").value='Hotmail';
	document.getElementById('pf').innerHTML="Your Hotmail Password";
  }
		
}
</script>


<?php 
define("SITE","http://softoasistech.com/dev2013/referral");
?>

<form id="import_form" action="" class="center" method="post">
	<?php if (!$this->current_class->ExternalAuth) {?>
		  <table height="229" class="table">
		    
			<tbody>
			<tr>
							  
			<td><h1>Login to your webmail account below <b>(Hotmail,Gmail,Yahoo,AOL)</b>
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
				
				 <?php if ($this->display_menu) {?>
				 
				 <!---<select onchange="test(this.value)" name="contacts_option" style="width:200px;">
				   <?php foreach ($this->contacts_classes as $k => $v) {?>
				     <option value="<?php echo $v->ClassName . ($v->ExternalAuth ? "<br/>(External Authentication)" : ""); ?>">
				   <?php echo $v->ClassName . ($v->ExternalAuth ? "<br/>(External Authentication)" : ""); ?>
				     </option>
				   <?php } ?>  
				 </select>--->
				
				<?php } ?>
                <!--------------------->
				
				
        <!------------------------------------------>
	  <input  type="hidden" name="state" value=""/>			
	   
	   <input id="soption" type="hidden" name="contacts_option" value="<?php echo $selected_option; ?>"/>

	   
		<button type="submit" id="btnContactsForm" value="import" style="border:none; background:none;">
		  <img src="<?php echo SITE; ?>/public/image/next_but.jpg"/>
		<?php //echo $this->current_class->ExternalAuth? "Authorize Externally" : "Next"; ?>
		</button>	
        <!------------------------------------------->				
				
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

	