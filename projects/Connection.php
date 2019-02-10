<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "rozgaar";
  $con =  new mysqli($servername,$username,$password,$database);
  if($con -> connect_error)
  {
    die("Connection falied" . $con->connect_error);
  }
?>
