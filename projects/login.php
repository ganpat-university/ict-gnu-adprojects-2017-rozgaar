<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" src="text/css" href="login.css">
	</head>
	<body>
		<?php
			include'header.php';
		?>
		<div>
			<form action="" method="POST">
				<fieldset style="width:300px;height:auto;margin:auto;margin-top:133px;border-radius:4px;">
					<legend><b>User </b>Login</legend>
						<br/><br/><br/>
						<h2>Rozgaar Login</h2>
						<br/><br/>
						<p>Username &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="text" name="uname" required/> </p>
						<p>Password &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="password" name="pass" required/></p>
						<br/>
						<input type="submit" id="btn" value="Login" name="submit">
						<br/>
						<br/>
						<p>Forget Password ?</p>
				</fieldset>
			</form>
		</div>
	</body>
</html>
<?php
	include 'header.php';

	function ConnectData()
	{
		require 'Connection.php';
		$Username = $_POST['uname'];
		$Password = $_POST['pass'];

		$query = "select * from employeetable where `Username`='$Username' and `Password`='$Password'";
		print_r($query);
		if ($con->query($query) == TRUE) {
			header("location:compDashB.php");
		}
		else{
			echo 'Enter Correct Username or Password.';
		}
		
	}
	if(isset($_POST['submit'])){
		ConnectData();
	}
?>
