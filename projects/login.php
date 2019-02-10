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




		$query = "select * from employeetable where Username=?;";
		$stmt = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt,$query)){
			header("Location:login.php?error=sqlerror");
			exit();

		}
		else {
			mysqli_stmt_bind_param($stmt,"s",$Username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result))
			{
				if($Password != $row['Password'])
				{
					header("Location:login.php?error=wrongpass");
					exit();
				}
				else if($Password == $row['Password'] )
				{
						session_start();
						$_SESSION['user'] = $row['Username'];

					header("Location:index.php?login=success");
					exit();
				}
				else {
					header("Location:login.php?error=wrongpass");
					exit();
				}

			}

			else {
				{
					header("Location:login.php?error=nouser");
					exit();
				}
			}
		}


	}
	if(isset($_POST['submit'])){
		ConnectData();
	}
?>
