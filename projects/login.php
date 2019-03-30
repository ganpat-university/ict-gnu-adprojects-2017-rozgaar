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
						<br/>
						<br/>
						<br/>
						<input type="submit" id="btn" value="Login" name="submit">
						<br/>
						<br/>
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
	$empq = "select * from employeetable where Username=? and Password=?;";
	$indq = "select * from individualtable where Username=? and Password=?;";
	$compq = "select * from companytable where Username=? and Password=?;";
	$stmt = mysqli_stmt_init($con);
	$indstmt =  mysqli_stmt_init($con);
	$compstmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$empq)){
		header("Location:login.php?error=sqlerror");
		exit();
	}
	else {
		mysqli_stmt_bind_param($stmt,"ss",$Username,$Password);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if($row = mysqli_fetch_assoc($result))
		{
			if($Password != $row['Password'])
			{
				echo '<span style="color: Red">Passowrd is Wrong</span>';
				exit();
			}
			else if($Password == $row['Password'] )
			{
				session_start();
				$_SESSION['user'] = $row['Username'];
				$_SESSION['pass'] = $row['Password'];
				//Employee Database
				header("Location:empDashB.php?login=success");
				exit();
			}
			else {
				echo '<span style="color: Red">Passowrd is Wrong</span>';
				exit();
			}
		}
		else {
			if(!mysqli_stmt_prepare($indstmt,$indq)){
				header("Location:login.php?error=sqlerror");
				exit();
			}
			else {
				mysqli_stmt_bind_param($indstmt,"ss",$Username,$Password);
				mysqli_stmt_execute($indstmt);
				$result = mysqli_stmt_get_result($indstmt);
				if($row = mysqli_fetch_assoc($result))
				{
					if($Password != $row['Password'])
					{
						echo '<span style="color: Red">Passowrd is Wrong</span>';
						exit();
					}
					else if($Password == $row['Password'] )
					{
						session_start();
						$_SESSION['user'] = $row['Username'];
						$_SESSION['pass'] = $row['Password'];
						//individual Database
						header("Location:indiDashB.php?login=success");
						exit();
					}
					else {
						echo '<span style="color: Red">Passowrd is Wrong</span>';
						exit();
					}
				}
				else {
					if(!mysqli_stmt_prepare($compstmt,$compq)){
						header("Location:login.php?error=sqlerror");
						exit();
					}
					else {
						mysqli_stmt_bind_param($compstmt,"ss",$Username,$Password);
						mysqli_stmt_execute($compstmt);
						$result = mysqli_stmt_get_result($compstmt);
						if($row = mysqli_fetch_assoc($result))
						{
							if($Password != $row['Password'])
							{
								echo '<span style="color: Red">Passowrd is Wrong</span>';
								exit();
							}
							else if($Password == $row['Password'] )
							{
								session_start();
								$_SESSION['user'] = $row['Username'];
								$_SESSION['pass'] = $row['Password'];
								//Company Database
								header("Location:compDashB.php?login=success");
								exit();
							}
							else {
								echo '<span style="color: Red">Passowrd is Wrong</span>';
								exit();
							}
						}
						else {
							if($Username == 'admin'){
								if($Password != 'admin')
								{
									echo '<span style="color: Red">Admin Passowrd is Wrong</span>';
									exit();
								}
								else if($Password == 'admin' )
								{
									session_start();
									$_SESSION['user'] = $Username;
									$_SESSION['pass'] = $Password;
									//Admin Login
									header("Location:adminDashB.php?login=adminLogin_success");
									exit();
								}
								else {
									echo '<span style="color: Red">Passowrd is Wrong</span>';
									exit();
								}
							}

							else
							{
								echo '<span style="color: Red">User do not Exist</span>';
								exit();
							}

						}
					}
				}
			}
		}
	}
}
	if(isset($_POST['submit'])){
		ConnectData();
	}
?>
