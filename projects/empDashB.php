<!DOCTYPE html>
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
			.sidenav a {
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
			}
			#anchortable{
				color: #172a55;
			}
			#detailspane{
				background-color:#172a55;
				font-family:Century Gothic;
				color:white;
				width:65px;
				height:25px;
				border-radius:3px;
				border:none;
			}
			#detailspane:hover {
				cursor:pointer;
				background-color: white;
				color: #172a55;
				border-radius: 3px;
				transition: 0.1s;
			}
		</style>
	</head>
	<body>
		<section class="main">
			<div id="header">
				<?php
					include 'header1.php';
				?>
			</div>
			</br>
			<div style="float:left" width="90%">
				<div id="mySidenav" class="sidenav">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>	<!--&times; is used for 'x' sign.-->
					<br/>
					<br/>
					<br/>
					<a href="#">Hi, #EmployeeName</a>
					<br/>
					<a href="#">History</a>
					<br/>
					<a href="#">Setting</a>
					<br/>
					<a href="contactUS.php">Contact Us</a>
				</div>
      </div>
			<div id="content">
				<div style="font-size:30px;cursor:pointer" onclick="openNav()">&nbsp;&nbsp;&#9776;&nbsp; Employee Dashboard</div>	<!--&#9776; is used for toggle sign.-->
			</div>
		</section>
    <section style="margin-top: 0%;height: 100%;">
			<fieldset  id="le"  style="width:100%;height:100%;border:none;">
			<fieldset style="border-radius:5px;width:25%;height:auto;margin-left:37%;margin-top:85px;">
        <table style="margin-left:10px;">
          <tr style="font-size:20px;">
            <th width="100px">Job Title</th>
            <th width="100px">Amount</th>
						<th></th>
          </tr>
          <?php
            require 'Connection.php';
            $sql = "select Job_Title,Amount FROM postjobtable";
            $result = $con->query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                echo "<tr style='text-align:center;'><td width='100px'>".$row["Job_Title"]."</td><td width='100px'>".$row["Amount"]."</td><td width='100px'>&nbsp;&nbsp;&nbsp;<button id='detailspane'>Details</button></td></tr>";
              }
              echo "</table>";
            }
            else{
              echo "Else";
            }
          ?>
        </table>
			</fieldset>
		</fieldset>
    </section>
    <script>
    window.addEventListener('click',outsideClick);
    var wind = document.getElementById('le');
    function openNav() {
      document.getElementById("mySidenav").style.width = "270px";
      document.getElementById("emp").style.margin = "10%";
    }
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("emp").style.margin = "0";
    }
    function outsideClick(e)
    {
      if(e.target == wind)
      {
          document.getElementById("mySidenav").style.width = "0";
      }
    }
    </script>
	</body>
</html>
