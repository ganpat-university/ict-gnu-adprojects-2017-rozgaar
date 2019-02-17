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
			.postBtn:hover:after
			{
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
				padding: :20px;
				width: 30%;
				border-radius:7%;
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


				input[type=submit]{
					background-color:#172a55;
					font-family:Century Gothic;
					cursor: pointer;
					color:white;
					width:65px;
					height:30px;
					outline: none;
					border-radius:15%;
					border:none;
				}

				input[type=submit]:hover
				{
					background-color: white;
					color: #172a55;
					transition: 0.4s;
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
					<h1>Post Job</h1>
				<form>
					<table style="margin:0 auto;">
						<tr>
						<td colspan="2">Job Topic:</td>
						<td colspan="2"><input type="text" placeholder="Please Enter Job Topic Here" style="width:100%" required></td>
					</tr>
					<tr><td><br/></td></tr>

				<tr>
				<td colspan="2">Job Deadline:</td>
				<td colspan="2"><input type="text" placeholder="Please Enter Deadline" style="width:100%" required></td>
				</tr>
				<tr><td><br/></td></tr>
				<tr>
				<td colspan="2">Amount:</td>
				<td colspan="2"><input type="text" placeholder="Please Enter Amount" style="width:100%" required></td>
				</tr>
				<tr><td><br/></td></tr>
				<tr>
				<td colspan="2">Job Descrpition:</td>
				<td colspan="2"><textarea  rows="4" cols="30" maxlength="225" required	style="resize: none;" placeholder="Please enter description about the job(maximum 225 character)"></textarea></td>
			</tr>
			<tr><td><br/></td></tr>
				<tr>
					<td colspan="4" align="center"><input type="submit"  name="submit" value="Submit"></td>
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
		var modal = document.getElementById('simpleModal');
		//get open modal button
		var modalBtn = document.getElementById('modalBtn');
		//get close button
		var closeBtn = document.getElementById('closeBtn');

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
