<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="chAT/css/style.css">
	<meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="home/index.css">
    <link rel="stylesheet" href="home/ulli.css">
    <link rel="stylesheet" href="home/form.css">
    <link rel="stylesheet" href="photos-css/style.css">
</head>
<body>
<div class="header-container">
        <div class="header">
            <div class="header1">
                <form action="">
                    <input type="search" name="googlesearch">
                    <input type="submit">
                </form>
            </div>
            <div class="header2">
                <ul><li><a href="profile.php"><?php echo $_COOKIE['name'];?></a></li>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="find-friend.php">Find-friends</a></li>
                    <li><a href="login1.html">logout</a></li></ul>
            </div>
        </div>
    </div>
<div class="chatbox" style="overflow-x:auto;overflow-y:scroll;">
<?php
$friend= '';
$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
$id= $_COOKIE['id'];
$rs = pg_query("select * from ttpeople where email_id='$id';") or die('error');
    while ($row = pg_fetch_row($rs)){
		$friend = $row[0];
				$user = preg_replace('/ /','',$_COOKIE['name']);
				$user1 =$_COOKIE['name'];
				$rs1 = pg_query(" select * from messages_$user where uname in (select uname from messages_$user where uname = '$row[0]') or fto in (select fto from messages_$user where fto = '$row[0]');") or die('error');
    while ($row1 = pg_fetch_row($rs1)){
				if($_COOKIE['fname']==$row[0])
				{
					$rs2 = pg_query("select profile_image from ttpeople_profile where email_id='$row1[0]';") or die('error');
		while ($row2 = pg_fetch_row($rs2)){
				?>
        <div class="chat friend">
            <div class="user-photo"><img src="<?php echo $row2[0];?>"></div>
            <p class="chat-message" style="background: light-green;"><?php echo $row1[1];?></p>
        </div>
				<?php
				}
				}
				else if($_COOKIE['name']==$row[0])
				{
					$rs2 = pg_query("select profile_image from ttpeople_profile where email_id='$row1[0]';") or die('error');
		while ($row2 = pg_fetch_row($rs2)){
				?>
        <div class="chat self">
            <div class="user-photo"><img src="<?php echo $row2[0];?>"></div>
            <p class="chat-message" style="background: violet;
    order: -1;"><?php echo $row1[1];?></p>
        </div>
		<?php
				}
				}
	}
	}
	?>
    </div>
    <div class="chat-form">
	<form action="send1.php" method="post">
	<input type="hidden" value="<?php echo $friend;?>" name="friend">
        <input type="text" name="messages" style="background: #fbfbfb;
    width: 550px;
    height: 50px;
    border: 2px solid green;
    border-radius: 3px;
    resize: none;
    padding: 10px;
    font-size: 22px;
    color: purple;
	margin-left:400px">
        <input type="submit" value="send" style="width: 65px;
    height: 40px;
    color: #000022;
    font-size: 22px;
    background: #8740fa;
    border: none;
    border-radius: 3px;
    margin: 0 10px;
    box-shadow: 0 3px 0 #0eb2c1;
    cursor: pointer;
    -webkit-transition: .2s ease;
    -moz-transition: .2s ease;
    -o-transition: .2s ease;">
    </div>
</div>
</body>
</html>