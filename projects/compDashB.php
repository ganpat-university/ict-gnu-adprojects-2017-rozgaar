<!DOCTYPE html>
<html>
	<head>
		<style>
			body {
				font-family: Century Gothic;
			}
			.sidenav {
				height: 100%;
				width: 0;
				position: fixed;
				z-index: 1;
				top: 0;
				left: 0;
				background-color: #172a55;
				overflow-x: hidden;
				transition: 0.3s;
				padding-top: 60px;
			}
			.sidenav a {
				padding: 8px 8px 8px 0px;
				text-decoration: none;
				font-size: 25px;
				color: white;
				display: block;
				transition: 0.3s;
				width: auto;
				height: 30px;
			}
			.sidenav a:hover {
				background-color: white;
				color: #172a55;
			}
			.sidenav .closebtn {
				position: absolute;
				top: 0;
				right: 0px;
				padding-left: 8px;
				width: 50px;
				height: 45px;
				font-size: 36px;
				margin-left: 50px;
			}
			#content{
				width: 100%;
				height: 65%;
			}
		</style>
	</head>
	<body>
		<div class="main">
			<div id="header">
				<?php
					include 'header1.php';
				?>
			</div>
			</br>
			<div style="float:left" width="90%">
				<div id="mySidenav" class="sidenav">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>	<!--&times; is used for 'x' sign.-->
					<br/>
					<br/>
					<br/>
					<a href="#">Hi, #CompanyName</a>
					<br/>
					<a href="#">History</a>
					<br/>
					<a href="#">Setting</a>
					<br/>
					<a href="contactUS.php">Contact Us</a>
				</div>
				<div id="content">
					<span style="font-size:30px;cursor:pointer" onclick="openNav()">&nbsp;&nbsp;&nbsp;&#9776;</span>	<!--&#9776; is used for toggle sign.-->
					&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:30px;text-align:center">Company Dashbaord</span>
				</div>
				<script>
					window.addEventListener('click',outsideClick);
					function openNav() {
						document.getElementById("mySidenav").style.width = "270px";
					}
					function closeNav() {
						document.getElementById("mySidenav").style.width = "0";
					}
				</script>
			</div>
			<br/>
			<br/>
			<br/>
			<hr>
			<div style="float:right">
				<?php
					include 'button.php';
				?>
			</div>
		</div>
	</body>
</html>