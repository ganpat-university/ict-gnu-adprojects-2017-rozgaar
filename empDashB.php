<!DOCTYPE html>
<?php
	session_start();
 ?>
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
			.sidenav a,p {
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
				height: auto;
				float: left;
				transition: margin-left .5s;

			}
			#anchortable{
				color: #172a55;
			}
			.detailspane{
				background-color:#172a55;
				font-family:Century Gothic;
				color:white;
				width:65px;
				height:25px;
				border-radius:3px;
				border:none;
			}
			.detailspane:hover {
				cursor:pointer;
				background-color: white;
				color: #172a55;
				border-radius: 3px;
				transition: 0.1s;
			}

			#setting
			{
				margin: auto;
				display: none;

			}

			.modal
			{
				display: none;
				position: fixed;
				z-index: 1;
				left: 0;
				top: 0;
				height: 100%;
				width: 100%;
				overflow: auto;
				background-color: rgba(0, 0, 0, 0.5);
			}
			.modal-content
			{
				background-color: #ffffff;
				margin:12% auto;
				border-radius: 7%;
				padding: :20px;
				width: 30%;
				height:auto;
				box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2),0 7px 20px 0 rgba(0, 0, 0, 0.2);
				animation-name: modalopen;
				animation-duration: 1s;
			}
			.cross
			{
				color: #ccc;
				float: right;
				font-size: 30px;
			}
			.cross:hover,.cross:focus{
				color: #000;
				text-decoration: none;
				cursor:pointer;
			}

			.modal
			{
				display: none;
				position: fixed;
				z-index: 1;
				left: 0;
				top: 0;
				height: 100%;
				width: 100%;
				overflow: auto;
				background-color: rgba(0, 0, 0, 0.5);
			}
			.modal-content
			{
				background-color: #ffffff;
				margin:12% auto;
				border-radius: 5%;
				padding: :20px;
				width: 30%;
				height:auto;
				box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2),0 7px 20px 0 rgba(0, 0, 0, 0.2);
				animation-name: modalopen;
				animation-duration: 1s;
			}
			.closebtn
			{
				color: #ccc;
				float: right;
				font-size: 30px;
			}
			.closebtn:hover,.closebtn:focus{
				color: #000;
				text-decoration: none;
				cursor:pointer;
			}
			@keyframes modalopen {
				from{opacity: 0}
				to{opacity: 1}
			}

			input[type=text]{
				width:auto;
				border-radius:3px;
				border : none;
				border-bottom :1px solid #172a55;
				font-family: Century Gothic;
			}
			input:focus{
				outline:none;
			}

			input[type=submit]{
				background-color:#172a55;
				font-family:Century Gothic;
				color:white;
				width:65px;
				height:30px;
				border-radius:3px;
				border:none;
			}

		</style>
	</head>
	<body>
		<section class="main">
			<section>
			<div id="header">
				<?php
					include 'header1.php';
				?>
			</div>
			</br>
			<div style="float:left" width="90%">
				<div id="mySidenav" class="sidenav">
					<div id="Normal">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>	<!--&times; is used for 'x' sign.-->
					<br/>
					<br/>
					<br/>
					<p>Hi, <?php echo $_SESSION['user']; ?></p>
					<br/>
					<a href="#">History</a>
					<br/>
					<a href="#" onclick="return Settingpanel();">Setting</a>
					<br/>
					<a href="contactUS.php">Contact Us</a>
				</div>
					<div id="setting">
						<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>	<!--&times; is used for 'x' sign.-->
						<br/>
						<br/>
						<br/>
						<p>Hi, <?php echo $user; ?></p>
						<br/>
						<a href="#" id='changePass' onclick="">Change Password</a>
						<br/>
						<a href="#">Edit Profile</a>
						<br/>
						<a href="#" id='detailbtn' name="delete">Delete Account</a>
						<br/>
						<a href="#" onclick="return Normalpanel();">Back</a>
					</div>
				</div>
      </div>
			<div id="content">
				<div style="font-size:30px;cursor:pointer" onclick="openNav()">&nbsp;&nbsp;&#9776;&nbsp; Employee Dashboard</div>	<!--&#9776; is used for toggle sign.-->
			</div>
		</section>
    <section style="height: 100%;">
			<fieldset  id="le"  style="width:100%;height:100%;border:none;">

				<!--Modal for Changing Password -->
				<div id="Pass" class="modal">
					<div class = "modal-content">
						<span id="closeBtn" class="closebtn">&times;&nbsp;</span>
						<form method="POST">
							<table style="margin:0 auto;">
								<tr>
									<th><h1 style="text-align: center;">Change Password</h1></th>
								</tr>
								<tr>
									<td colspan="2">Current Password:</td>
									<td colspan="2"><input type="text" name="CurPass"placeholder="Please Enter Current Password here" style="width:100%"  required></td>
								</tr>
								<tr><td><br/></td></tr>
								<tr>
								<td colspan="2">New Password:</td>
								<td colspan="2"><input type="text" name="NewPass" placeholder="Please Enter New Password" style="width:100%" required></td>
								</tr>
								<tr><td><br/></td></tr>
								<tr>
								<td colspan="2">confirm Password:</td>
								<td colspan="2"><input type="text" name="CNewPass" placeholder="Re-Enter your new password" style="width:100%" required></td>
								</tr>
								<tr><td><br/></td></tr>
								<tr>
								<td colspan="2"><input type="submit" id="chgpass" name="passchg" value="Change"></td>
								</tr>
								<tr><td><br/></td></tr>
							</table>
						</form>
					</div>
				</div>


			<fieldset style="border-radius:5px;width:25%;height:auto;margin-left:37%;">
        <table style="margin-left:10px;">
          <tr style="font-size:20px;">
            <th width="100px">Job Title</th>
            <th width="100px">Amount</th>
						<th></th>
          </tr>
          <?php
            require 'Connection.php';
            $sql = "select Job_Title,Amount FROM postjobtable";

            $result = $con->query($sql);
						$desc = $con->query($sql);
            if($result->num_rows > 0){

              while($row = $result->fetch_assoc()){
                echo "<tr data-group='<script>i</script>'  style='text-align:center;'><td width='100px'>".$row["Job_Title"]."</td><td width='100px'>".$row["Amount"]."</td><td data-input='<script>i</script>' width='100px'>&nbsp;&nbsp;&nbsp;<button class='detailspane'  onclick='detailButton()' name='details'> Details</button></td></tr>";
								echo "<script>i = i + 1</script>";
							}
            }
            else{
              echo "Else";
            }


          ?>
        </table>
			</fieldset>

			<div id="simpleModal" class="modal">
				<div class = "modal-content">
					<span id="cross" class="closebtn">&times;&nbsp;</span>
					<form method="POST">
						<table style="margin:0 auto;color:#172a55;">
							<tr><p>Are you Sure you want to delete the Account?</p></tr>
							<tr>
								<td><button name="delacc">Yes</button></td>
								<td><button>No</button></td>
							</tr>
						</table>
					</form>
				</div>
			</div>

		</fieldset>
    </section>
	</section>
  <script>

	window.addEventListener('click',outsideClick);
	var SettingPanel = document.getElementById('setting');
	var NormalPanel = document.getElementById('Normal');
	var wind = document.getElementById('le');
	var content =  document.getElementById('content');
	function openNav() {
		document.getElementById("mySidenav").style.width = "270px";
		document.getElementById('content').style.marginLeft = "270px";
	}
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById('content').style.marginLeft = "0px";
		NormalPanel.style.display = "block";
		SettingPanel.style.display = "none";
	}
	function outsideClick(e)
	{
		if(e.target == wind)
		{
				document.getElementById("mySidenav").style.width = "0";
			document.getElementById('content').style.marginLeft = "0px";
			NormalPanel.style.display = "block";
			SettingPanel.style.display = "none";

		}
	}
	function Settingpanel()
	{
		 NormalPanel.style.display = "none";
		 SettingPanel.style.display = "block";
	}
	function Normalpanel()
	{
		 NormalPanel.style.display = "block";
		 SettingPanel.style.display = "none";

	}
	//Modal of Change Password
	//get modal element
	var modal = document.getElementById('Pass');
	//get open modal button
	var modalBtn = document.getElementById('changePass');
	//get close button
	var closeBtn = document.getElementById('closeBtn');
	modalBtn.addEventListener('click',openModal);
	closeBtn.addEventListener('click',closeModal);
	function openModal()
	{
		modal.style.display = 'block';
	}
	function closeModal()
	{
		modal.style.display = 'none';
	}







	//get modal element
	var modal = document.getElementById('simpleModal');
	//get open modal button
	var modalBtn = document.getElementById('detailbtn');
	//get close button
	var closeBtn = document.getElementById('cross');
	modalBtn.addEventListener('click',openModal);
	closeBtn.addEventListener('click',closeModal);
	window.addEventListener('click',outsideClick);
	function openModal()
	{
		modal.style.display = 'block';
	}
	function closeModal()
	{
		modal.style.display = 'none';
	}
	function outsideClick(e)
	{
		if(e.target == modal)
		modal.style.display = 'none';
	}
    </script>
	</body>
</html>

<?php
require 'Connection.php';
	function Adddata()
	{
		require 'Connection.php';
		$current = $_POST['CurPass'];
		$CompPass = $_POST['CNewPass'];
		if($current == $_SESSION['pass'])
		{
			if($new == $CompPass)
			{
					$_SESSION['pass'] = $new;
					$sql = "update employeetable set Password='".$new."'";
					if ($con->query($sql) === TRUE) {

					}
					else{
						echo 'Error!';
					}
			}
			else {
					echo '<span style = "color:Red;">Password does not match</span>';
			}

		}
		else {

				echo '<span style = "color:Red;">Password is Wrong</span>';

		}
	}

	function DeleteAccout()
	{
		require 'Connection.php';
			$sql = "delete from employeetable where Username='".$_SESSION['user']."'";
			if ($con->query($sql) === TRUE) {
				header("Location:login.php");
			}
			else{
				echo 'Error!';
			}
	}
	if(isset($_POST['delacc']))
	{
		DeleteAccout();
	}

	if(isset($_POST['passchg']))
	{
		Adddata();
	}



?>
