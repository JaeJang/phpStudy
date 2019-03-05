<?php
include('functions.php');
require_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>SCAVANGE TEMPLATE</title>
		<link rel="stylesheet" href="CSS/backbone.css">
		<link rel="stylesheet" href="CSS/mainFunctionStyle.css">
		<link rel="stylesheet" href="CSS/aboutus.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<script src="Javascript/navscripts.js"></script>
		<script src="Javascript/mainFunctionScript.js"></script>
	</head>
	<body>
		<div class="topBar">
			<div class="navIcon" onclick="showNavBar()">
				<img src="Images/basket.png" width="100" height="100">
			</div>
			<div id="myTitle">
				<h1 class="topBarTitle">&nbsp;&nbsp;SCAVANGE</h1>
			</div>
		</div>
		<div id="navigationBar" class="navBar hidden">
			<ul class="navBarList">
				<!--<li class="navBarPlaceholder"></li>-->
				<a class="navLink" href="mainFunctionPage.php"><li class="navBarItem">Home</li></a>
				<a class="navLink" href="mobile_recipe.php"><li class="navBarItem">Recipes</li></a>
				<?php
					if(isLoggedIn()){
						echo '<a class="navLink" href="mobileUpload.php"><li class="navBarItem">Share</li></a>';
						echo '<a class="navLink" href="logout.php"><li class="navBarItem">Logout</li></a>';
					} else{
						echo '<a class="navLink" href="mobile_login.php"><li class="navBarItem">Login</li></a>';
					}
				 ?>

				<a class="navLink" href="mobile_aboutus.php"><li class="navBarItem">About Us</li></a>
				<a class="navLink" href="mobile_affilated.php"><li class="navBarItem">Affilates</li></a>
			</ul>
		</div>
		<div id="navigationBarAlt">
			<ul class="navBarListAlt">
				<a class="navLink" href="mainFunctionPage.php"><li class="navBarItemAlt">Home</li></a>
				<a class="navLink" href="mobile_recipe.php"><li class="navBarItemAlt">Recipes</li></a>
				<?php
					if(isLoggedIn()){
						echo '<a class="navLink" href="mobileUpload.php"><li class="navBarItem">Share</li></a>';
						echo '<a class="navLink" href="logout.php"><li class="navBarItem">Logout</li></a>';
					} else{
						echo '<a class="navLink" href="mobile_login.php"><li class="navBarItem">Login</li></a>';
					}
				 ?>
				<a class="navLink" href="mobile_aboutus.php"><li class="navBarItemAlt">About Us</li></a>
				<a class="navLink" href="mobile_affilated.php"><li class="navBarItem">Affilates</li></a>
			</ul>
		</div>
		<div id="contentBox">
		<br>
			<div class="formBox">
				<h1 class="sub">Who we are</h1>
				<div class="row">

					<div class="span2"></div>
					<div class="span8">
						<img src="Images/twotwo.jpg" alt="">
					</div>
					<div class="span2"></div>
				</div>


					<div class="whoweare">
		Why won't a state lark train a repetitive analysis? A fighter forks the technique beside each fooling thumb.
		The queen fellows an internal concrete. When will an intent project compliment the wary handler? Will the ground subroutine fudge?
		Under the collected antidote bobs whatever held sore.




			</div>
		</div>
	</body>
</html>
