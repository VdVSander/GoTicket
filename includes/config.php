<?php
  $servername = "localhost";
  $username = "ticketsys_php";
  $password = "9r6W6&zo";
  $dbname = "ticketsys_goticket";

  $conn = mysqli_connect($servername,$username,$password,$dbname);

  if(!$conn)
  {
    die("Connection failed: ".mysqli_connect_error());
  }
 ?>
