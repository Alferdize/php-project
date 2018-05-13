<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="notification_css/index.css">
    <link rel="stylesheet" href="notification_css/ulli.css">
    <link rel="stylesheet" href="notification_css/form.css">
    <link rel="stylesheet" href="notification_css/notify.css">
    <link rel="stylesheet" href="notification_css/app-base.css">
    <link rel="stylesheet" href="notification_css/app-flex.css">
</head>
<body>
<div class="container">
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
    </div>
<div class="body">
<div class="notf-container" style="overflow-x:auto;overflow-y:scroll;">
<?php
				$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
				$user = preg_replace('/ /','',$_COOKIE['name']);
				$user1 =$_COOKIE['name'];
				$rs = pg_query("select * from messages_$user where uname != '$user1';") or die('error');
    while ($row = pg_fetch_row($rs)){  
$rs1 = pg_query("select profile_image from ttpeople_profile where email_id='$row[0]';") or die('error');
		while ($row1 = pg_fetch_row($rs1)){	
?>
<div class="notf-body">
        <div class="notf-image" style="overflow:hidden"><image src="<?php echo $row1[0];?>"></div>
            <p class="notif-text">
            <?php echo $row[1];?>
			<b>
			<?php echo $row[2];?>
			</b>
            </p>
    </div>
	<?php
		}
	}
	?>
</div>
<div class="notf-container" style="overflow-x:auto;overflow-y:scroll;">
<?php
				$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
				$user = preg_replace('/ /','',$_COOKIE['name']);
				$rs = pg_query("select email_id,name from friend_$user;") or die('error');
    while ($row = pg_fetch_row($rs)){  
$rs1 = pg_query("select profile_image from ttpeople_profile where email_id='$row[0]';") or die('error');
		while ($row1 = pg_fetch_row($rs1)){	
?>
    <div class="notf-body">
	<form action="chat1.php" method="post">
	<input type="hidden" value="<?php echo $row[0];?>" name="id">
	<input type="hidden" value="<?php echo $row[1];?>" name="fname">
        <div class="notf-image" style="overflow:hidden"><image src="<?php echo $row1[0];?>"></div>
            <p class="notif-text">
            <?php echo $row[1];?>
			<input type="submit" value="chat">
            </p>
       </form>
    </div>
		<?php
		}
	}
	?>
</div>
</body>
</html>
