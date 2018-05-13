<?php
setcookie("id",$_POST['id']);
setcookie("fname",$_POST['fname']);
header("location: chat.php");
?>