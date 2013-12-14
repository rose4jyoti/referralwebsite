<h3 style="width:auto; text-align:center;">Selected Contacts</h3>
(no email was sent)<br/><br/>
<div style="font-size:0.8em; text-align:left; color:gray;">
<?php

foreach ($post["contacts"] as $contact_email => $contact_name)
{
	//! do something here: store or send out emails (use PHPMailer or other mailing library)
	echo "{$contact_name} ({$contact_email})<br />";
}
?>
</div>