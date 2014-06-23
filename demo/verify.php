<?php if (!isset($_SESSION)) session_start(); 
header("Content-Type: text/javascript");
$num1 = rand(1, 9);
$num2 = rand(1, 9);
$ans=$num1+$num2;
$_SESSION['verify'] = $ans;

session_write_close();
?>
document.write(<?php echo $num1 ?>);
document.write(" + ");
document.write(<?php echo $num2 ?>);

