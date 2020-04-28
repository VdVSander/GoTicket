<?php
  if(isset($_POST['event-submit']))
  {
    require 'config.php';
    $eventname = $_POST['event_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $location = $_POST['location'];
    $startdate = $_POST['start_date'];
    $stopdate = $_POST['stop_date'];
    $organisatieid = $_SESSION['organisatieID'];

    $sql = "INSERT INTO evenementen (naam,adres,stad,postcode,startdatum,stopdatum,organisaties_organisatieid,locatienaam) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      header("Location: ../register.php?error=sqlerror");
    }
    else
    {
      mysqli_stmt_bind_param($stmt, "ssssssss", $eventname, $address, $city, $postalcode, $startdate, $stopdate, $organisatieid, $location);
      mysqli_stmt_execute($stmt);
      $message = $eventname." is een nieuw evenement op de website!";
      mail($to_mail,$subject_reg,$message);
      header("Location: ../add_new_event.php?success");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
  else
  {
    header("Location: ../register.php?error=button_not_pressed");
  }
 ?>
