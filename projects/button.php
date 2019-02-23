<html>
	<head>
		<!--To include icons-->
		<style>
			.bottom{
				position: fixed;
				width: 55px;
				height: 55px;
				bottom: 20px;
				right: 20px;
			}
			.postBtn{
				position: fixed;
				border-radius: 50%;
				background-color: #172a55;
				color: white;
				border: none;
				width: 55px;
				height: 55px;
				bottom: 20px;
				right: 20px;
				cursor: pointer;
				font-size: 27px;
			}
			.postBtn:hover{
				background-color: white;
				color: #172a55;
				transition: 0.4s;
				box-shadow: 10px 10px 40px grey;
				width:8%;
				height:7%;
				border-radius:12px;
			}
			.postBtn:hover span{
				display:none;
			}
			.postBtn:hover:after{
				content:"Post";
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
				input[type=text],[type=date]{
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
				button:focus{
					outline: none;
				}
		</style>
	</head>
	<body>
		<div id="simpleModal" class="modal">
			<div class = "modal-content">
				<span id="closeBtn" class="closebtn">&times;&nbsp;</span>
				<form method="POST">
					<table style="margin:0 auto;">
						<tr>
							<td><h1 style="text-align: center;font-size:27px">Post Job</h1></td>
						</tr>
						<tr>
							<td colspan="2">Job Topic:</td>
							<td colspan="2"><input type="text" placeholder="Please Enter Job Topic Here" style="width:100%" name="jobtitle" required></td>
						</tr>
						<tr><td><br/></td></tr>

						<tr>
						<td colspan="2">Job Deadline:</td>
						<td colspan="2"><input type="date" placeholder="Please Enter Deadline" style="width:100%" name="jobdeadline" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
						<td colspan="2">Amount:</td>
						<td colspan="2"><input type="text" placeholder="Please Enter Amount" style="width:100%" name="amount" pattern="[0-9]{1,}" required></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
						<td colspan="2">Job Descrpition:</td>
						<td colspan="2"><textarea  rows="4" cols="30" name="jobdescription" maxlength="225"	style="resize: none;font-family: Century Gothic;" placeholder="Please enter description about the job(maximum 225 character)" required></textarea></td>
						</tr>
						<tr><td><br/></td></tr>
						<tr>
							<td colspan="4" align="center"><input type="submit" id="submit" name="submit" value="Submit"></td>
						</tr>

					</table>
				</form>

			</div>
		</div>
		<div class="bottom">
			<button id="modalBtn" class="postBtn"><span>+</span></button>
		</div>

		<script>
		//get modal element
		var mmmodal = document.getElementById('simpleModal');
		//get open modal button
		var mmmodalBtn = document.getElementById('modalBtn');
		//get close button
		var cccloseBtn = document.getElementById('closeBtn');
		mmmodalBtn.addEventListener('click',ooopenModal);
		cccloseBtn.addEventListener('click',cccloseModal);
		window.addEventListener('click',oooutsideClick);
		function ooopenModal()
		{
			mmmodal.style.display = 'block';
		}
		function cccloseModal()
		{
			mmmodal.style.display = 'none';
		}
		function oooutsideClick(e)
		{
			if(e.target == modal)
			mmmodal.style.display = 'none';
		}
		</script>

		<?php
			function AddJobData(){
				require 'Connection.php';

				$topic = $_POST['jobtitle'];
				$deadline = $_POST['jobdeadline'];
				$amount = $_POST['amount'];
				$description = $_POST['jobdescription'];

				$sql = "INSERT INTO postjobtable(Job_Title,Job_Deadline,Amount,Job_Description)
						VALUES ('$topic','$deadline','$amount','$description')";

				if ($con->query($sql) === TRUE) {
						echo 'Done';
				}
				else{
					echo 'Error!';
				}
			}
			if(isset($_POST['submit']))
			{
				AddJobData();
			}
			?>

	</body>
</html>
