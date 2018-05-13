<?php
$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
$user = preg_replace('/ /','',$_COOKIE['name']);
$name = $_FILES["file2"]["name"];
if($name!='')
{
    $type = $_FILES["file2"]["type"];
    $path = 'storage/'.$_COOKIE['name']."/$name";
    copy($name,$path);
    $rs2 = pg_query("insert into images_$user values('$path','profile','$type');") or die('error');
}
echo "$path";
$rs1 = pg_query("update ttpeople_profile set profile_image='".$path."' where email_id = '".$_COOKIE['email_id']."';") or die('error');
header("location: friends.php");
?>