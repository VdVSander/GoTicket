<?php
if(isset($_POST['tickettype-submit']))
{
  require 'config.php';
  $evenementid = $_POST['evenementid'];
  $typename = $_POST['typenaam'];
  $price = $_POST['prijs'];
  $numberavailable = $_POST['aantal_tickets'];
  $number_sold = 0;
  $startaccess = $_POST['start_toegang'];
  $stopaccess = $_POST['stop_toegang'];

  $sql = "INSERT INTO tickettypes (evenementid, typenaam, prijs, aantal, aantalverkocht, starttoegang, stoptoegang) VALUES (?, ?, ?, ?, ?, ?, ? )";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    header("Location: ../dashboard.php?error=sqlerror2");
  }
  else
  {
    mysqli_stmt_bind_param($stmt, "sssssssssss", $evenementid, $typename , $price, $numberavailable, $number_sold, $startaccess, $stopaccess);
    mysqli_stmt_execute($stmt);
    header("Location: ../dashboard.php?addtype=success");
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else
{
  header("Location: ../dashboard.php?error=button_not_pressed");
}
?>
