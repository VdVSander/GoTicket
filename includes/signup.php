<?php
  echo '-- TEST START TEST --';
  if(isset($_POST['signup-submit']))
  {
    echo 'Subit knop ingedrukt';
    require 'config.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM organisaties WHERE email=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      echo 'ERROR: SQL 1';
      header("Location: ../register.php?error=sqlerror");
    }
    else
    {
      mysqli_stmt_bind_param($stmt, "s", $email);
      echo 'SQL STMT 1: $stmt';
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if($resultcheck > 0)
      {
        echo 'ERROR: Email $email bestaat al';
        header("Location: ../register.php?error=userexists&email=".$email);
      }
      else
      {
        $sql = "INSERT INTO organisaties (naam,email,wachtwoord) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
          echo 'ERROR: SQL 2';
          header("Location: ../register.php?error=sqlerror");
        }
        else
        {
          $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
          echo 'Hashed pwd: $passwordHashed';
          mysqli_stmt_bind_param($stmt, "sss", $name, $email, $passwordHashed);
          mysqli_stmt_execute($stmt);
          header("Location: ../registered.html");
        }
      }
    }
    echo 'SQL conn sluiten';
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
  else
  {
    header("Location: ../register.php?error=button_not_pressed");
  }
?>
