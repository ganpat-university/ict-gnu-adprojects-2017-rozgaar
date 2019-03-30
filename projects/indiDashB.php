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
 		$sql = "delete from individualtable where Username='".$_SESSION['user']."'";
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
	$message = "Password Do Not Match !!!";
	$message1 = "Password Is Wrong !!!";
  if($current == $_SESSION['pass'])
  {
 	 if($new == $CompPass)
 	 {
 			 $_SESSION['pass'] = $new;
 			 $sql = "update individualtable set Password='".$new."'";
 			 if ($con->query($sql) === TRUE) {
 				 header('location:login.php');
 			 }
 			 else{
 				 echo "<script type='text/javascript'>alert('$message');</script>";
 			 }
 	 }
 	 else {
 			 echo "<script type='text/javascript'>alert('$message');</script>";
 	 }

  }
  else {

 		 echo "<script type='text/javascript'>alert('$message1');</script>";

  }
 }
 if(isset($_POST['passchg']))
 {
  Adddata();
 }

?>
<html>
	<head>
		<link rel="stylesheet" href="indiDashB.css">
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
				<div style="font-size:30px;cursor:pointer" onclick="openNav()">&nbsp;&nbsp;&#9776;&nbsp; Individual Dashboard</div>	<!--&#9776; is used for toggle sign.-->
			</div>
			<section>
				<div style="float:right">
					<?php
						include 'button.php';
					?>
				</div>
			</section>
		</section>

		<section style="height: 100%;">
				<fieldset style="border-radius:5px;width:25%;height:auto;margin-left:37%;margin-top:7%;">
					<table style="margin-left:10px;">
						<tr style="font-size:20px;">
							<th width="100px">Job Title</th>
							<th width="100px">Username</th>
							<th></th>
						</tr>

						<?php
							require 'Connection.php';
							$sql = "SELECT jobtitle,auser FROM comjobrequest ";

							$result = $con->query($sql);
							$desc = $con->query($sql);
							echo "<form method=\"POST\">";
							echo "<table>";
							if($result->num_rows > 0){
								while($row = $result->fetch_assoc()){
									echo "<tr style='text-align:center;font-size:16px;'><td width='100px'>".$row['jobtitle']."</td><td width='100px'>".$row["auser"]."</td><td><input type=\"button\" onClick='titleButtonClick(this.name)' name='".$row["auser"]."' value=\"Grant\" class=\"grant\" /></td><td><br/><br/></td></tr>";
								}
								echo "</table>";
								echo "</form >";
							}
							else{
								echo "Else";
							}
						?>
					</table>
				</fieldset>
				<script>
					function titleButtonClick(clickid)
					{
						alert(clickid);
						window.location.replace("?id=" + clickid);
					}
					</script>


									<?php


									function modalDisplay()
									{

															require 'Connection.php';
															$sql =	"update comjobrequest set accept='yes' where auser='".$_GET['id']."'";
															$del = "delete from comjobrequest where accept = 'no'";
															if($con->query($sql)== TRUE)
															{
																echo 'running';
																$con->query($del);
																echo '<script>history.replaceState(null,null,"indiDashB.php");</script>';


															}
															else {
																echo 'error';
																echo mysqli_error($con);
															}
									}



									if(isset($_GET['id']))
									{
										echo 'in if';

										modalDisplay();
									}

								?>

								<?php


										require 'Connection.php';

										$sql = "Select * from individualtable where Username = ?";
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
											$name = $_POST['fname'];
											$email = $_POST['email'];
											$phone = $_POST['phno'];
											$aadhar = $_POST['ano'];
											$skill = $_POST['skill'];
											$username = $_POST['uname'];

												$sql = "update individualtable set Name='$name',Email='$email',Phone='$phone',Aadhar='$aadhar',Skill='$skill',Username='$username' where Username='".$_SESSION['user']."'";
												if ($con->query($sql) === TRUE) {

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
							<td colspan="2">Full Name : </td>
								<td colspan="2"><input type="text" placeholder="Full Name" style="width:100%;" name="fname" value="<?php echo $row['Name']; ?>" pattern="[A-Za-z ]+" required ></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Email : </td>
								<td colspan="2"><input type="email" placeholder="Email" style="width:100%;" value="<?php echo $row['Email']; ?>" name="email" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Phone Number : </td>
								<td colspan="2"><input type="text" placeholder="Phone Number" style="width:100%;" value="<?php echo $row['Phone']; ?>" name="phno" pattern="[0-9]{10}" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Aadhar Number : </td>
								<td colspan="2"><input type="text" placeholder="Aadhar Number" style="width:100%;" value="<?php echo $row['Aadhar']; ?>" name="ano" pattern="[0-9]{16}" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Skill : </td>
								<td colspan="2"><input type="text" placeholder="Skill" style="width:100%;" value="<?php echo $row['Skill']; ?>" name="skill" pattern="[A-Za-z ]+" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Username : </td>
								<td colspan="2"><input type="text" placeholder="Username" style="width:100%;" value="<?php echo $row['Username']; ?>" name="uname" pattern="[A-Za-z0-9]+" required></td>
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

		<!--Modal for Changing Password -->
		<div id="Pass" class="modal">
			<div class = "modal-content">
				<span id="passclose" class="closebtn">&times;&nbsp;</span>
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
		var passmodal = document.getElementById('Pass');
		//get open modal button
		var passmodalBtn = document.getElementById('changePass');
		//get close button
		var passclose = document.getElementById('passclose');
		passmodalBtn.addEventListener('click',openModal);
		passclose.addEventListener('click',closeModal);
		window.addEventListener('click',outsideeeClick);
		function openModal()
		{
			passmodal.style.display = 'block';
		}
		function closeModal()
		{
			passmodal.style.display = 'none';
		}
		function outsideeeClick(e)
		{
			if(e.target == passmodal)
			passmodal.style.display = 'none';
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
