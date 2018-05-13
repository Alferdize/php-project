<?php
$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
$id= $_POST['id'];
$rs = pg_query("select * from ttpeople where email_id='$id';") or die('error');
    while ($row = pg_fetch_row($rs)){
	$user = preg_replace('/ /','',$row[0]);
	$user1 = preg_replace('/ /','',$_COOKIE['name']);
$rs1 = pg_query("insert into request_recieved_$user values('".$_COOKIE['email_id']."','".$_COOKIE['name']."');") or die("error");
$rs1 = pg_query("insert into request_sent_$user1 values('$id','$row[0]');") or die("error");
}
header("location: find-friend.php");
?>