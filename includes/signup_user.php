<?php
  if(isset($_POST['signup-submit']))
  {
    require 'config.php';
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate'];

    $sql = "SELECT * FROM klanten WHERE email=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      header("Location: ../register_new_user.php?error=sqlerror1");
    }
    else
    {
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if($resultcheck > 0)
      {
        header("Location: ../register_new_user.php?error=userexists&email=".$email);
      }
      else
      {
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
          $message = $surname." heeft zich geregistreerd op de website!";
          mail($to_mail,$subject_reg,$message);
          header("Location: ../registered_new_user.php");
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
  else
  {
    header("Location: ../register.php?error=button_not_pressed");
  }
?>
