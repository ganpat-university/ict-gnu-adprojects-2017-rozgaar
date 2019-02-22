<!DOCTYPE html>
<?php
	session_start();
	$user = 	$_SESSION['user'];
 ?>
<html>
	<head>
		<link rel="stylesheet" href="compDashB.css">
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
						<a href="#">Change Password</a>
						<br/>
						<a href="#" id="editProfileBtn">Edit Profile</a>
						<br/>
						<a href="contactUS.php">Delete Account</a>
						<br/>
						<a href="#" onclick="return Normalpanel();">Back</a>
					</div>
				</div>
      </div>
			<div id="content">
				<div style="font-size:30px;cursor:pointer" onclick="openNav()">&nbsp;&nbsp;&#9776;&nbsp; Company Dashboard</div>	<!--&#9776; is used for toggle sign.-->
			</div>
		</section>
		<section>
			<div style="float:right">
				<?php
					include 'button.php';
				?>
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


		?>

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
														echo '<script>history.replaceState(null,null,"compDashB.php");</script>';


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
							<td colspan="2"><input type="text" name="city" placeholder="City" required></td>
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
							<td colspan="2"><input type="text" name="pincode" placeholder="Pin Code" pattern="[0-9]{6}" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Email ID : </td>
							<td colspan="2"><input type="email" name="email" placeholder="Email ID" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Phone No. : </td>
							<td colspan="2"><input type="text" name="phone" placeholder="Phone Number" pattern="[0-9]{10}" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="2">Username : </td>
								<td colspan="2"><input type="text" name="username" placeholder="Username" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr align="center">
							<td colspan="4" align="center"><input type="submit" name="update" id="updatebtn" value="update"></td>
						</tr>
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

		//Edit Profile Pane

		//get modal element
		var modal = document.getElementById('editProfile');
		//get open modal button
		var modalBtn = document.getElementById('editProfileBtn');
		//get close button
		var closeBtn = document.getElementById('editProfileClose');
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
