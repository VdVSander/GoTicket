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

  $sql = "INSERT INTO klanten (voornaam,achternaam,email,geboortedatum,wachtwoord) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    header("Location: ../register_new_user.php?error=sqlerror2");
  }
  else
  {
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $surname , $email, $birthdate, $passwordHashed);
    mysqli_stmt_execute($stmt);
    $message = $name." heeft zich geregistreerd op de website!";
    mail($to_mail,$subject_reg,$message);
    header("Location: ../registered_new_user.php");
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else
{
  header("Location: ../dashboard.php?error=button_not_pressed");
}
?>
