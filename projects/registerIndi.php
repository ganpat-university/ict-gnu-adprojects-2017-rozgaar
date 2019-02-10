<html>
	<head>
		<title>Individual Registeration</title>
		<link rel="stylesheet" src="text/css" href="registerIndi.css">
	</head>
	<body>
		<?php
			include'header.php';
		?>
		<div>
			<form method="post" action="">
				<fieldset style="width:450px;height:auto;margin:auto;margin-top:85px;border-radius:4px;">
					<legend align="center"><b>Individual </b>Register</legend>
						<h2>Create Account</h2>
						<table style="margin:0 auto;">
							<tr>
								<td colspan="2">Full Name : </td>
									<td colspan="2"><input type="text" placeholder="Full Name" style="width:100%;" name="fname" pattern="[A-Za-z ]+" required ></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Email : </td>
									<td colspan="2"><input type="email" placeholder="Email" style="width:100%;" name="email" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Phone Number : </td>
									<td colspan="2"><input type="text" placeholder="Phone Number" style="width:100%;" name="phno" pattern="[0-9]{10}" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Aadhar Number : </td>
									<td colspan="2"><input type="text" placeholder="Aadhar Number" style="width:100%;" name="ano" pattern="[0-9]{16}" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Skill : </td>
									<td colspan="2"><input type="text" placeholder="Skill" style="width:100%;" name="skill" pattern="[A-Za-z ]+" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Username : </td>
									<td colspan="2"><input type="text" placeholder="Username" style="width:100%;" name="uname" pattern="[A-Za-z0-9]+" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Password : </td>
									<td colspan="2"><input type="password" style="width:100%;" name="pass" pattern="[A-Za-z0-9]{1,}" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Confirm Password : </td>
									<td colspan="2"><input type="password" style="width:100%;" name="cpass" pattern="[A-Za-z0-9]{1,}" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="4" align="center"><input type="submit" name="submit" id="btn" value="Submit"></td>
							</tr>
						</table>
					<br/>
				</fieldset>
			</form>
		</div>
	</body>
</html>

<?php

	include 'header.php';
	
	function Adddata()
	{
		require 'Connection.php';
		$name = $_POST['fname'];
		$email = $_POST['email'];
		$phone = $_POST['phno'];
		$aadhar = $_POST['ano'];
		$skill = $_POST['skill'];
		$Username=$_POST['uname'];
		$Password = $_POST['pass'];
		$cpassword = $_POST['cpass'];
		
		if($Password==$cpassword){
			$sql = "INSERT INTO individualtable(Name,Email,Phone,Aadhar,Skill,Username,Password)
			VALUES ('$name','$email','$phone','$aadhar','$skill','$Username','$Password')";
			if ($con->query($sql) === TRUE) {

			}
			else{
				header("location:registerIndi.php");
			}
		}
		else {
			echo'<span style = "color:Red;">Password didn\'t matched</span>';	
		}
	}
	if(isset($_POST['submit'])){
		Adddata();
	}
	
?>