<?php
  if(isset($_POST['signup-submit']))
  {
    require 'config.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM organisaties WHERE email=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      header("Location: ../register.php?error=sqlerror");
    }
    else
    {
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if($resultcheck > 0)
      {
        header("Location: ../register.php?error=userexists&email=".$email);
      }
      else
      {
        $sql = "INSERT INTO organisaties (naam,email,wachtwoord) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
          header("Location: ../register.php?error=sqlerror");
        }
        else
        {
          $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "sss", $name, $email, $passwordHashed);
          mysqli_stmt_execute($stmt);
          $message = $name." heeft zich geregistreerd op de website!";
          mail($to_mail,$subject_reg,$message);
          header("Location: ../registered.php");
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
