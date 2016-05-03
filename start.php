<!doctype html>

<html lang = "pt-br">
	<head>
		<title>It'sMyLife</title>
		<meta charset = "utf-8"/>
		<script type="text/javascript" src="JS/jquery-2.2.1.js"></script>
		<script type="text/javascript" src="JS/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>

		<link rel="stylesheet" type="text/css" href="CSS/start.css">
		<link rel="icon" type="image/x-icon" href="img/Icon.ico">
	</head>
	<?php
		session_start();
		$Result  = $_SESSION['Result'];
	?>
	
	<body>
		<div id = "SiteArea">
			<div id = "LeftPanel">
				<div id = "UserPicture" >
					<img id = "UserPicture" src = "CSS/img/AvatarDefault.png"/>
				</div>
				<div id = "UserName" name = "UserName">
					<?php 
						echo $Result[3]; 
					?>
				</div>
				<div id = "FriendPanel"></div>
			</div>
			<div id = "FeedArea">
				<div id = "TypefulTextArea">
					<textarea id = "FeedTextArea"></textarea> 
					<input type="submit" value="Fixar" id = "btnPin">
				</div>
				<div id = "PostFeed"></div>
			</div>
		</div>
		<div id = "UserStorage"></div>
		<div id = "loginBar">
			<form id = "frmLogin" method="post" action = "authentic.php">
				<a id = "btnLogout"></a>
				<a id = "logo"></a>
			</form>
		</div>
	</body>
		
</html>