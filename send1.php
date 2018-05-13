<?php
$message = $_POST['messages'];
$friend = preg_replace('/ /','',$_POST['friend']);
$user1 = $_COOKIE['name'];
$fuser1 = $_COOKIE['fname'];
$user = preg_replace('/ /','',$_COOKIE['name']);
$email = $_COOKIE['email_id'];
$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
$rs1 = pg_query("insert into messages_$user values('$email','$message','$user1','$fuser1');") or die("error");
$rs1 = pg_query("insert into messages_$friend values('$email','$message','$user1','$fuser1');") or die("error");
header("location: chat.php");
?>