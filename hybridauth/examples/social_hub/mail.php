<?php
/**
 * Created by PhpStorm.
 * User: legacy
 * Date: 5/16/14
 * Time: 11:57 AM
 */
$to       = 'recipient@yahoo.com';
$subject  = 'Testing sendmail.exe';
$message  = 'Hi, you just received an email using sendmail!';
$headers  = 'From: sender@gmail.com' . "\r\n" .
    'Reply-To: sender@gmail.com' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
if(mail($to, $subject, $message, $headers))
    echo "Email sent";
else
    echo "Email sending failed";
try{
    var_dump($to);
    var_dump($header);
    var_dump($msg);
    var_dump($subject);

    $status = mail($to, $subject, $msg, $headers);
    var_dump($status);
}catch( Exception $e ){
    echo $e->getMessage();
}
phpinfo();
?>