<?php
$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
$user = preg_replace('/ /','',$_COOKIE['name']);
$name = $_FILES["file1"]["name"];
if($name!='')
{
$type = $_FILES["file1"]["type"];
$path = 'storage/'.$_COOKIE['name']."/$name";
copy($name,$path);
$rs2 = pg_query("insert into images_$user values('$path','upload','$type');") or die('error');
}
$write = $_POST['write'];
echo $write;
$rs1 = pg_query("insert into posts_$user values ('$path','$write');") or die('error');
header("location: home.php");
?>