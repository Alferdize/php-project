<?php
$name1 = $_POST['Firstname'].$_POST['lastname'];
$name = $_POST['Firstname']." ".$_POST['lastname'];
$password = $_POST['PASSWORD'];
$date = $_POST['DATE'];
$email = $_POST['Email'];
$country = $_POST['COUNTRY'];
$gender = $_POST['GENDER'];
$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
$rs1 = pg_query("insert into ttpeople values ('$name','$gender','$country','$date','$password','$email');") or die('error');
$rs2 = pg_query("create table friend_$name1(email_id text,name text);") or die('error');
$rs3 = pg_query("create table images_$name1(path text,type text,format text);") or die('error');
$rs4 = pg_query("create table posts_$name1(images_path text,post text);") or die('error');
$rs5 = pg_query("create table request_recieved_$name1(email_id text,uname text);") or die('error');
$rs6 = pg_query("create table request_sent_$name1(email_id text,uname text);") or die('error');
$rs7 = pg_query("create table messages_$name1(email_id text,messages text,uname text,fto text);") or die('error');
$rs8 = pg_query("create table timeline_$name1(uname text,images_path text,post text);") or die('error');
$rs1 = pg_query("insert into ttpeople_profile values('$email','storage/3d69dfc12c0120b1dd39f7d4be533102.gif');") or die('error');
$path = 'storage/'.$name;
$a = mkdir($path, 0777, true);
header("location: confirmation.html");
?>