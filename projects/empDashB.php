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
				width: auto;
				height:auto;
				float: left;

			}

			.NavBar{
				height: 100%;
				width: 100%;

			}

			.outside
			{
				width: 100%;
				height: 100%;


			}
		</style>
	</head>
	<body>
		<section class="main">
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
					<a href="#">Hi, #EmployeeName</a>
					<br/>
					<a href="#">History</a>
					<br/>
					<a href="#">Setting</a>
					<br/>
					<a href="contactUS.php">Contact Us</a>
				</div>
      </div>
			<div id="content">
				<div style="font-size:30px;cursor:pointer" onclick="openNav()">&nbsp;&nbsp;&#9776;&nbsp; Employee Dashbaord</div>	<!--&#9776; is used for toggle sign.-->
			</div>
		</section>
    <section style="margin-top: 0%;height: 100%;" >
      <fieldset id="le" style="width:auto;height:100%;margin:auto;margin-top:85px;border-radius:4px;">
      </fieldset>
    </section>


			<script>
				window.addEventListener('click',outsideClick);
				var wind = document.getElementById('le');
				function openNav() {
					document.getElementById("mySidenav").style.width = "270px";
					document.getElementById("emp").style.margin = "10%";
				}
				function closeNav() {
					document.getElementById("mySidenav").style.width = "0";
					document.getElementById("emp").style.margin = "0";
				}
				function outsideClick(e)
				{
					if(e.target == wind)
					{
							document.getElementById("mySidenav").style.width = "0";
					}
				}
				</script>
				<br/>
			<br/>
			<br/>
			<div style="float:right">
				<?php
					include 'button.php';
				?>
			</div>
	</body>
</html>
