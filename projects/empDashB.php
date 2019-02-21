<!DOCTYPE html>
<?php
	session_start();
	$user = $_SESSION['user'];
 ?>
 <?php

  function DeleteAccout()
  {
 	 require 'Connection.php';
 		 $sql = "delete from employeetable where Username='".$_SESSION['user']."'";
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
 				 $sql = "update employeetable set Password='".$new."'";
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

			.descriptionmodal
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
			.description-modal-content
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
			.desclosebtn
			{
				color: #ccc;
				float: right;
				font-size: 30px;
			}
			.titlebtn{
				cursor:pointer;
				color:#172a55;
				background-color: white;
				border-radius:3px;
				width:100%;
				height:24px;
				background: none;
				border:none;
			}
			.titlebtn:hover{
				color:white;
				background-color:#172a55;
			}
			.desclosebtn:hover,.desclosebtn:focus{
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

			input[type=submit],button{
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
						<a href="#" id="editProfileBtn">Edit Profile</a>
						<br/>
						<a href="#" id='delbtn' name="delete">Delete Account</a>
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
							$i=1;
	            $result = $con->query($sql);
							$desc = $con->query($sql);
	            if($result->num_rows > 0){

	              while($row = $result->fetch_assoc()){
	                echo "<form method=\"POST\"><tr style='text-align:center;'><td width='100px'><input type=\"button\" onClick='titleButtonClick(this.name)' name='".$row["Job_Title"]."' class='titlebtn'  id='topicbtn' value='".$row["Job_Title"]."'></td><td width='100px'>".$row["Amount"]."</td><td width='100px'>&nbsp;&nbsp;&nbsp;</td></form>";
									echo "<script>i = i + 1</script>";
								}
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
				 		window.location.replace("empDashB.php?id=" + clickid);
			 		}
			 </script>

			 <!--Modal for description display-->
				<div id="desmodal" class="descriptionmodal">
					<div class = "description-modal-content">
						<span id="descloseBtn" class="desclosebtn">&times;&nbsp;</span>
						<form method="POST">
							<table style="margin:0 auto;">
								<tr>
									<th><h1 style="text-align: center;">Post Job</h1></th>
								</tr>
								<tr>
								<td colspan="2">Job Descrpition:</td>
								<td colspan="2"><input type="text" id="descriptionbox"  name="jobdescription" style="resize: none;font-family: Century Gothic;" value="<?php echo $row['Job_Description']; ?>" placeholder="Please enter description about the job(maximum 225 character)"></td>
								</tr>
								<tr><td><br/></td></tr>
								<tr>
									<td colspan="4" align="center"><input type="submit" id="submit" name="submit" value="Accept"></td>
								</tr>

							</table>
						</form>

					</div>
				</div>

				<?php
				function test()
				{


										require 'Connection.php';
										$sql = "select Job_Description FROM postjobtable WHERE Job_Title='".$_GET['id']."'";
										$_SESSION['desc'] = "itscalled";
										if($con->query($sql)== TRUE)
										{

											$res = $con->query($sql);
											if($res -> num_rows > 0)
											{
												while($row = $res -> fetch_assoc())
												{
													echo $row['Job_Description'];
													echo "<script>document.getElementById('descriptionbox').value='".$row['Job_Description']."';</script>";
													echo "<script>document.getElementById('desmodal').style.display='block';</script>";
													echo "	<script>	var topicBtn = document.getElementById('topicbtn');
																		descloseBtn.addEventListener('click',closeDesModal);
																		function closeDesModal()
																		{
																			desmodal.style.display = 'none';
																			history.replaceState(null,null,\"empDashB.php\");
																		}</script>";

												}
											}

										}
										else {

										}




				}
				if(isset($_GET['id']))
				{

					echo $_GET['id'];
					test();
				}

				 ?>


			<?php
			require 'Connection.php';

			$sql = "Select * from employeetable where Username = ?";
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
				$address = $_POST['address'];
				$phone = $_POST['phno'];
				$aadhar = $_POST['ano'];
				$username = $_POST['uname'];


					$sql = "update employeetable set Name='$name',Email='$email',Address='$address',Phone='$phone',Aadhar='$aadhar',Username='$username' where Username='".$_SESSION['user']."'";
					if ($con->query($sql) === TRUE) {
						
					}
					else{
						echo "error";
					}
			}
			if(isset($_POST['updateacc']))
			{
				UpdateAccout();
			}
			?>

			<!--Update Information Contents-->
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
									<td colspan="2"><input type="text" placeholder="Full Name" style="width:100%;" name="fname" value="<?php echo $row['Name']; ?>" pattern="[A-Za-z ]+" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Email : </td>
									<td colspan="2"><input type="email" placeholder="Email" style="width:100%;" value="<?php echo $row['Email']; ?>" name="email" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Address : </td>
									<td colspan="2"><input type="text" placeholder="Address" style="width:100%;" value="<?php echo $row['Address']; ?>" name="address" required></td>
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

			<!--Delete Modal Contents-->
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

	//get topic button modal element
		var desmodal = document.getElementById('desmodal');
		//get open topic button modal button
		var topicBtn = document.getElementById('topicbtn');
		//get close button
		var descloseBtn = document.getElementById('descloseBtn');
		topicBtn.addEventListener('click',openDesModal);
		descloseBtn.addEventListener('click',closeDesModal);
		window.addEventListener('click',outsideDesClick);
		function openDesModal()
		{
			desmodal.style.display = 'block';
		}
		function closeDesModal()
		{
			desmodal.style.display = 'none';
		}
		function outsideDesClick(e)
		{
			if(e.target == desmodal)
			desmodal.style.display = 'none';
		}

    </script>
	</body>
</html>
