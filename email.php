<?php
$stage=$_GET['stage'];
$address=$_GET['mail'];
//echo 'email '.$address.' '.$stage;
system('email '.$address.' '.$stage);
echo "We have sent an email containing your ftp account for you! <br>";
echo "Please check your email"
?>
