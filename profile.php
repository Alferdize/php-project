<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script>
        $document.ready(function (){
            $("#btn").hover(function () {
                $(".new").addClass("red-red");
            });
            $("#btn").mouseleave(function () {
                $(".new").addClass("red-red");
            });
        });
    </script>
    <link href="home/index.css" rel="stylesheet">
    <link href="home/form.css" rel="stylesheet">
    <link href="home/ulli.css" rel="stylesheet">
    <link href="home/image.css" rel="stylesheet">
    <link href="home/drop.css" rel="stylesheet">
    <link rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/y9/l/0,cross/x5j2iAbHgMk.css">
    <link rel="stylesheet" href="home/file-style.css">
    <script src="jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div class="profile-image">
            <?php
            $con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
            $rs = pg_query('select profile_image from ttpeople_profile where email_id=\''.$_COOKIE['email_id'].'\';') or die('error');
            while ($row = pg_fetch_row($rs)){

            ?>
		<form action="update.php" method="post"  enctype="multipart/form-data">
            <input type="file" id="btn" name="file2">
            <span class="new">
    <button  class="fa fa-camera" aria-hidden="true">
</button></span>
            <img src="<?php echo $row[0];?>" height="360px" width="840px" class="image">
            <?php
            }
            ?>
			<input type="submit" value="submit">
        </form>
            <div id="container">
                <nav>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="profile.php">Timeline</a>
                            <!-- First Tier Drop Down -->

                        </li>
                        <li><a href="news.php">Events</a></li>
                        <li><a href="friends.php">Friends</a></li>
                        <li><a href="messages.php">Messages</a></li>
                        <li><a href="#">More</a>
                            <!-- First Tier Drop Down -->
                            <ul>
                                <li><a href="photos.php">Photos</a></li>
                                <li><a href="videos.php">Videos</a></li>
                                <li><a href="news.php">News</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="home-body" style="padding: 10px;
    overflow-x: auto;
    overflow-y: scroll;">
            <form action="home1.php" method="post" style="margin:10px;" name=f2 enctype="multipart/form-data">
                <div class="chat-form">
                    <input type="text" class="textarea"  placeholder="Write The Things Of Your Mind" name="write" style="width: 450px;height: 50px;border: 3px solid blue;border-radius: 3px;resize: none;
padding: 30px;font-size: 22px;color: #3C3C3B;margin: 20px; background: #fbfbfb;">
                    <input type="file" id="btn1" name="file1">
                    <span class="next">
    <button  class="fa fa-camera" aria-hidden="true">
</button>Choose a file</span>
                    <input type="submit" value="send" class="button" onclick="post()">
                </div>
            </form>

<div class="post" style="padding:30px;">
<?php
$con = pg_connect('host = localhost port = 5432 dbname = postgres user = postgres password = anubhav123') or die('error');
$user = preg_replace('/ /','',$_COOKIE['name']);
$rs = pg_query("select * from posts_$user;") or die('error');
    while ($row = pg_fetch_row($rs)){
        
?>
<div class="body-post" style="background-color:white; color:black; font-size:32px; font-family: sans-serif;">
<?php
		if($row[0]!='')
		{
			?>
		<div class="images" style="padding:30px;">
		
                    <img src="<?php echo $row[0];?>" style="width: 550px;
    height: 450px;
	overflow:hidden;
    margin-bottom: 10px;" class="image">
                        </div>
						<?php
		}
		?>
		<p><?php echo $row[1];?></p>
        </div>
		<?php
		    }
?>
</div>
        </div>
		
</div>
</body>
</html>