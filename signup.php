<?php
$gender=$_POST['GENDER'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$passwd = $_POST['PASSWORD'];
$date = $_POST['DATE'];
$emailid = $_POST['emaiid'];
$country = $_POST['COUNTRY'];
$name = $firstname." ".$lastname;
$name1 =$firstname.$lastname;
$con = pg_connect('host = localhost port = 5432 dbname = tref_talk user = postgres password = redhat') or die('error');
$rs1 = pg_query("insert into ttpeople values('$name','$gender','$country','$date','$passwd','$emailid');") or die("error");
$rs1 = pg_query("create table friend$name1(email_id text references ttpeople(email_id),friend_name text);") or die('error');
$rs1 = pg_query("create table images$name1(path text,type text,format text);") or die('error');
$rs1 = pg_query("create table posts$name1(image_path text,post text);") or die('error');
$rs1 = pg_query("create table request_recieved$name1(email_id text references ttpeople(email_id),friend_name text);") or die('error');
$rs1 = pg_query("create table request_sent$name1(email_id text references ttpeople(email_id),friend_name text);") or die('error');
$rs1 = pg_query("insert into ttpeople_profile values('$emailid','storage/3d69dfc12c0120b1dd39f7d4be533102.gif');") or die('error');
echo "you have registered";
?>
