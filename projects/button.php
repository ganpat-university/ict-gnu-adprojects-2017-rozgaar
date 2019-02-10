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
				background-color: #f4f4f4;
				margin:40% auto;
				padding: :20px;
				width: 70%;
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


		</style>
	</head>
	<body>
		<div id="simpleModal" class="modal">
			<div class = "modal-content">
				<span id="closeBtn" class="closebtn">&times;</span>
				<p>Test Modal</p>
				<p>asdadas

				</p>

			</div>
		</div>
		<div class="bottom">
			<button id="modalBtn" class="postBtn">+</button>
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
