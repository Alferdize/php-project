<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="home/index.css">
    <link rel="stylesheet" href="home/ulli.css">
    <link rel="stylesheet" href="home/form.css">
    <link rel="stylesheet" href="photos-css/style.css">
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
    <div class="body-container">
        <div class="body-main">
            <div class="images-folder">
                Profile
            </div>
            <div class="content">
			<?php
$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
$user = preg_replace('/ /','',$_COOKIE['name']);
$rs = pg_query("select * from images_$user;") or die('error');
    while ($row = pg_fetch_array($rs)){
		if($row['type']=='profile')
		{
        
?>
                    <div class="images" style="margin:5px;">
                    <img src="<?php echo $row['path'];?>" style="width: 350px;
    height: 350px;
    margin-bottom: 10px;" class="image">
                        </div>

            
			<?php
		}
	}
		?>
		</div>
            <div class="images-folder">
               Uploads
            </div>
            <div class="content">
			<?php
$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
$user = preg_replace('/ /','',$_COOKIE['name']);
$rs = pg_query("select * from images_$user;") or die('error');
    while ($row = pg_fetch_array($rs)){
		if($row['type']=='upload')
		{
        
?>
                    <div class="images" style="margin:5px;">
                    <img src="<?php echo $row['path'];?>" style="width: 350px;
    height: 350px;
    margin-bottom: 10px;" class="image">
                        </div>

			<?php
		}
	}
		?>
		            </div>
        </div>
    </div>
</div>
</body>
</html>
