<!DOCTYPE html>
<?php
	session_start();
	$user = 	$_SESSION['user'];
 ?>
 <?php
 require 'Connection.php';
 function DeleteAccout()
 {
 	require 'Connection.php';
 		$sql = "delete from companytable where Username='".$_SESSION['user']."'";
 		if ($con->query($sql) === TRUE) {
 			$url = 'login.php';
 			header('Location:'.$url);
 			exit();
 		}
 		else{
 			echo 'Error!';
 		}
 }
 if(isset($_POST['delacc']))
 {
 	DeleteAccout();
 }

 function Adddata()
 {
	require 'Connection.php';
	$current = $_POST['CurPass'];
	$new = $_POST['NewPass'];
	$CompPass = $_POST['CNewPass'];
	if($current == $_SESSION['pass'])
	{
		if($new == $CompPass)
		{
				$_SESSION['pass'] = $new;
				$sql = "update companytable set Password='".$new."'";
				if ($con->query($sql) === TRUE) {
					header('location:login.php');
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
 if(isset($_POST['passchg']))
 {
	Adddata();
 }

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
			#detailspane{
				background-color:#172a55;
				font-family:Century Gothic;
				color:white;
				width:65px;
				height:25px;
				border-radius:3px;
				border:none;
			}
			#detailspane:hover {
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

			.editProfile_modal
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
			.editProfile_modal-content
			{
				background-color: #ffffff;
				margin: 4% auto;
				border-radius: 5%;
				padding: :20px;
				width: 30%;
				height:auto;
				box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2),0 7px 20px 0 rgba(0, 0, 0, 0.2);
				animation-name: modalopen;
				animation-duration: 1s;
			}
			input[type=text],input[type=password],input[type=email]{
				width:auto;
				border-radius:3px;
				border : none;
				border-bottom :1px solid #172a55;
				font-family: Century Gothic;
			}
			select{
				width:135px;
				border-radius:3px;
				border : none;
				border-bottom :1px solid #172a55;
				font-family: Century Gothic;
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
			input[type=number]{
				font-family: Century Gothic;
				border : none;
				border-bottom :1px solid #172a55;
				border-radius:3px;
			}

			.Deletemodal
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
			.Deletemodal-content
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

			#deltxt
			{
				color: #172a55;
			}
			button{
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
				<div id="mySidenav" class="sidenav" style="text-align:center;">
					<div id="Normal">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>	<!--&times; is used for 'x' sign.-->
					<br/>
					<br/>
					<br/>
					<p>Hi, <?php echo $user; ?></p>
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
						<a href="#" id="editProfileBtn">Edit Profile</a>
						<br/>
						<a href="#" id='delbtn' name="delete">Delete Account</a>
						<br/>
						<a href="#" onclick="return Normalpanel();">Back</a>
					</div>
				</div>
      </div>
			<div id="content">
				<div style="font-size:30px;cursor:pointer" onclick="openNav()">&nbsp;&nbsp;&#9776;&nbsp; Company Dashboard</div>	<!--&#9776; is used for toggle sign.-->
			</div>
			<section>
				<div style="float:right">
					<?php
						include 'button.php';
					?>
				</div>
			</section>
		</section>

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

		</section>

		<?php


				require 'Connection.php';

				$sql = "Select * from companytable where Username = ?";
				$stmt = mysqli_stmt_init($con);
				if(!mysqli_stmt_prepare($stmt,$sql)){
					echo 'Error.';
				}
				else{
					mysqli_stmt_bind_param($stmt,"s",$_SESSION['user']);
					mysqli_stmt_execute($stmt);
				}
				$result = mysqli_stmt_get_result($stmt);
				if($row = mysqli_fetch_assoc($result)){

				}

				function UpdateAccout()
			 	{
			 		require 'Connection.php';
					$name = $_POST['name'];
					$oname = $_POST['oname'];
					$addr = $_POST['addr'];
					$city = $_POST['city'];
					$state = $_POST['state'];
					$pincode = $_POST['pincode'];
					$email = $_POST['email'];
					$phone = $_POST['phone'];

					$username = $_POST['username'];

			 			$sql = "update companytable set Name='$name',OwnerName='$oname',Address='$addr',City='$city',State='$state',Pincode='$pincode',Email='$email',Phone='$phone',Username='$username' where Username='".$_SESSION['user']."'";
			 			if ($con->query($sql) === TRUE) {
			 				echo 'Ok';
			 			}
			 			else{
			 				echo 'Error!';
			 			}
			 	}
			 	if(isset($_POST['updateacc']))
			 	{
			 		UpdateAccout();
			 	}


		?>

		<div id="editProfile" class="editProfile_modal">
	    <div class = "editProfile_modal-content">
	      <span id="editProfileClose" class="closebtn">&times;&nbsp;</span>
	      <form method="POST" action="">

	        <table style="margin:0 auto;">
						<tr>
							<td colspan="4"><h1>Update Information</h1></th>
						</tr>
						<tr>
							<td colspan="2">Company Name : </td>
							<td colspan="2"><input type="text" name="name" value="<?php echo $row['Name']; ?>" pattern="[A-Za-z ]+" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Owner Name : </td>
							<td colspan="2"><input type="text" name="oname" value="<?php echo $row['OwnerName']; ?>" pattern="[A-Za-z ]+" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Company Add. : </td>
							<td colspan="2"><input type="text" name="addr" value="<?php echo $row['Address']; ?>" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">City : </td>
							<td colspan="2"><input type="text" name="city" placeholder="City" value="<?php echo $row['City']; ?>" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
						<td colspan="2">State : </td>
							<td colspan="2">
								<select name="state">
									<option value="" disabled selected>Select State</option>
									<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
									<option value="Andhra Pradesh">Andhra Pradesh</option>
									<option value="Arunachal Pradesh">Arunachal Pradesh</option>
									<option value="Assam">Assam</option>
									<option value="Bihar">Bihar</option>
									<option value="Chandigarh">Chandigarh</option>
									<option value="Chhattisgarh">Chhattisgarh</option>
									<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
									<option value="Daman and Diu">Daman and Diu</option>
									<option value="Delhi">Delhi</option>
									<option value="Goa">Goa</option>
									<option value="Gujarat">Gujarat</option>
									<option value="Haryana">Haryana</option>
									<option value="Himachal Pradesh">Himachal Pradesh</option>
									<option value="Jammu and Kashmir">Jammu and Kashmir</option>
									<option value="Jharkhand">Jharkhand</option>
									<option value="Karnataka">Karnataka</option>
									<option value="Kerala">Kerala</option>
									<option value="Lakshadweep">Lakshadweep</option>
									<option value="Madhya Pradesh">Madhya Pradesh</option>
									<option value="Maharashtra">Maharashtra</option>
									<option value="Manipur">Manipur</option>
									<option value="Meghalaya">Meghalaya</option>
									<option value="Mizoram">Mizoram</option>
									<option value="Nagaland">Nagaland</option>
									<option value="Orissa">Orissa</option>
									<option value="Pondicherry">Pondicherry</option>
									<option value="Punjab">Punjab</option>
									<option value="Rajasthan">Rajasthan</option>
									<option value="Sikkim">Sikkim</option>
									<option value="Tamil Nadu">Tamil Nadu</option>
									<option value="Tripura">Tripura</option>
									<option value="Uttaranchal">Uttaranchal</option>
									<option value="Uttar Pradesh">Uttar Pradesh</option>
									<option value="West Bengal">West Bengal</option>
								</select>
							</td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Pin Code : </td>
							<td colspan="2"><input type="text" name="pincode" placeholder="Pin Code" pattern="[0-9]{6}" value="<?php echo $row['Pincode']; ?>" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Email ID : </td>
							<td colspan="2"><input type="email" name="email" placeholder="Email ID" value="<?php echo $row['Email']; ?>" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Phone No. : </td>
							<td colspan="2"><input type="text" name="phone" placeholder="Phone Number" pattern="[0-9]{10}" value="<?php echo $row['Phone']; ?>" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Username : </td>
								<td colspan="2"><input type="text" name="username" placeholder="Username" value="<?php echo $row['Username']; ?>" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr align="center">
							<td colspan="4" align="center"><input type="submit" name="updateacc" id="updatebtn" value="update"></td>
						</tr>
	        </table>
	      </form>
	    </div>
	  </div>

		<!--Delete Modal contents-->
		<div id="DelModal" class="Deletemodal">
			<div class = "Deletemodal-content">
				<span id="cross" class="closebtn">&times;&nbsp;</span>
				<form method="POST">
					<table style="margin:0 auto;color:#172a55;">
						<tr><p id="deltxt">Are you Sure you want to delete the Account?</p></tr>
						<tr>
							<td><button name="delacc">Yes</button></td>
							<td><button>No</button></td>
						</tr>
					</table>
				</form>
			</div>
		</div>

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

		//Edit Profile Pane
		//get modal element
		var mmodal = document.getElementById('editProfile');
		//get open modal button
		var mmodalBtn = document.getElementById('editProfileBtn');
		//get close button
		var ccloseBtn = document.getElementById('editProfileClose');
		mmodalBtn.addEventListener('click',openeModal);
		ccloseBtn.addEventListener('click',closeeModal);
		window.addEventListener('click',outsideeClick);
		function openeModal()
		{
			mmodal.style.display = 'block';
		}
		function closeeModal()
		{
			mmodal.style.display = 'none';
		}
		function outsideeClick(e)
		{
			if(e.target == mmodal)
			mmodal.style.display = 'none';
		}

		//Delete Modal
		//get modal element
		var Delmodal = document.getElementById('DelModal');
		//get open modal button
		var DelmodalBtn = document.getElementById('delbtn');
		//get close button
		var DelcloseBtn = document.getElementById('cross');
		DelmodalBtn.addEventListener('click',openDelModal);
		DelcloseBtn.addEventListener('click',closeDelModal);
		window.addEventListener('click',outsideDelClick);
		function openDelModal()
		{
			Delmodal.style.display = 'block';
		}
		function closeDelModal()
		{
			Delmodal.style.display = 'none';
		}
		function outsideDelClick(e)
		{
			if(e.target == Delmodal)
			Delmodal.style.display = 'none';
		}
    </script>
	</body>
</html>
