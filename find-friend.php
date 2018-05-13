<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link href="home/index.css" rel="stylesheet">
    <link href="home/form.css" rel="stylesheet">
    <link href="home/ulli.css" rel="stylesheet">
    <link href="home/image.css" rel="stylesheet">
    <link href="home/drop.css" rel="stylesheet">
    <link rel="stylesheet" href="home/file-style.css">
    <script src="jquery.min.js"></script>
    <link rel="stylesheet" href="find-friends-css\style.css">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="">
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
    <div class="main" align="center">
        <div class="home-body">
     <div class="body">
            <div class="news-main">
                <div class="images-folder" style="background:gray;">
                    Friend-request
                </div>
                <div class="content">
			<?php
				$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
				$user = preg_replace('/ /','',$_COOKIE['name']);
				$rs = pg_query("select uname,email_id from ttpeople where email_id in ( select email_id from request_recieved_$user);") or die('error');
    while ($row = pg_fetch_row($rs)){
		$rs1 = pg_query("select profile_image from ttpeople_profile where email_id='$row[1]';") or die('error');
		while ($row1 = pg_fetch_row($rs1)){
?>
                <div class="notf-body">
                <div class="notf-image"><img src="<?php echo $row1[0];?>" style="width: 61px;
    height: 60px;
    border-radius: 50px;"></div>
                <p class="notif-text">
                    <?php echo $row[0];?>
                </p>
				<form action="add.php" method="post">
                <span class="but">
				<input type="hidden" value="<?php echo $row[1];?>" name="id">
                    <input type="submit" value="accept" class="butt">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="reject" class="button1">
                </span>
				</form>
				<?php
		}
	}
	?>
            </div>
           
        


            </div>
        <div class="event-main">
            <div class="images-folder" style="background:gray; margin-top:40px;">
                Find-Friend
            </div>
            <div class="content">
			<?php
				$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
				$user = preg_replace('/ /','',$_COOKIE['name']);
				$rs = pg_query("select uname,email_id from ttpeople where email_id != '".$_COOKIE['email_id']."' and email_id not in (select email_id from friend_$user) and email_id not in ( select email_id from request_sent_$user) and email_id not in ( select email_id from request_recieved_$user);") or die('error');
    while ($row = pg_fetch_row($rs)){
		$rs1 = pg_query("select profile_image from ttpeople_profile where email_id='$row[1]';") or die('error');
		while ($row1 = pg_fetch_row($rs1)){
		
        
?>
                <div class="notf-body">
                <div class="notf-image"><img class="image1" src="<?php echo $row1[0]; ?>" style="width: 61px;
    height: 60px;
    border-radius: 50px;"></div>
                <p class="notif-text">
                    <?php echo $row[0];?>
                </p>
				<form action="send.php" method="post">
                <span class="but">
				<input type="hidden" value="<?php echo $row[1];?>" name="id">
                    <input type="submit" value="send" class="butt">
                </span>
				</form>
				<?php
		}
	}
	?>
            </div>
           
        


            </div>
        </div>
    </div>

	</div>
</div>
</body>
</html>
