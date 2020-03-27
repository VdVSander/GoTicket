<?php
  if(isset($_POST['event_submit']))
  {
    require 'config.php';
    $eventname = $_POST['event_name'];
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $location = $_POST['location'];
    $startdate = $_POST['start_date'];
    $stopdate = $_POST['stopdate'];
    $tickettype = $_POST['ticket_type'];

    //Check if eventname allready exists
    $sql = "SELECT * FROM evenementen WHERE naam=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      header("Location: ../register.php?error=sqlerror");
    }
    else
    {
      mysqli_stmt_bind_param($stmt, "s", $eventname);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if($resultcheck > 0)
      {
        header("Location: ../register.php?error=eventexists");
      }
      else
      {
        //Get the organisatieID from the logged-in company
        $sql = "SELECT organisatieid FROM organisaties WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
          header("Location: ../register.php?error=sqlerror");
        }
        else
        {
          mysqli_stmt_bind_param($stmt, "s", $_SESSION['email']);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $resultcheck = mysqli_stmt_num_rows($stmt);
          if($resultcheck > 1)
          {
            header("Location: ../register.php?error=databaseerror");
          }
          else
          {
            $organisatieid = $stmt['organisatieid'];
          }
      }
  }
  else
  {
    header("Location: ../new_event.php?error=btn_not_pressed");
  }
 ?>
