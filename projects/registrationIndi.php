<html>
	<head>
		<title>FreeLancer Registeration</title>
		<link rel="stylesheet" src="text/css" href="registrationIndi.css">
	</head>
	<body>
		<?php
			include'header.php';
		?>
		<div>
			<form method="POST" action="#">
				<fieldset style="width:450px;height:auto;margin:auto;margin-top:85px;border-radius:4px;">
					<legend align="center"><b>Individual </b>Registration</legend>
						<h2>Create Account</h2>
						<table style="margin:0 auto;">
							<tr>
								<td colspan="2">Full Name : </td>
									<td colspan="2"><input type="text" placeholder="Full Name" style="width:100%;" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Email : </td>
									<td colspan="2"><input type="email" placeholder="Email" style="width:100%;" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Phone Number : </td>
									<td colspan="2"><input type="text" placeholder="Phone Number" style="width:100%;" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Aadhar Number : </td>
									<td colspan="2"><input type="text" placeholder="Aadhar Number" style="width:100%;" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Skill : </td>
									<td colspan="2"><input type="text" placeholder="Skill" style="width:100%;" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Username : </td>
									<td colspan="2"><input type="text" placeholder="Username" style="width:100%;" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Password : </td>
									<td colspan="2"><input type="password" style="width:100%;" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="2">Confirm Password : </td>
									<td colspan="2"><input type="password" style="width:100%;" required></td>
							</tr>
							<tr><td><br/></td></tr>
							<tr>
								<td colspan="4" align="center"><input type="submit" onsubmit="window.location.href = '';" id="btn" value="Submit"></td>
							</tr>
						</table>
					<br/>
				</fieldset>
			</form>
		</div>
	</body>
</html>