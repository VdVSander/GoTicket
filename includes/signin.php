<?php
  if(isset($_POST['signin-submit']))
  {
    require 'config.php';
    $mail = $_POST['email'];
    $password = $_POST['password'];

    if(empty($mail) || empty($password))
    {
      header("Location: ../login.php?php?error=not_enough_data");
    }
    else
    {
      $sql = "SELECT * FROM organisaties WHERE email=?;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql))
      {
        header("Location: ../login.php?error=SQL_error1");
      }
      else
      {
        mysqli_stmt_bind_param($stmt, "s", $mail);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result))
        {
          $pwdCheck = password_verify($password, $row['wachtwoord']);
          if($pwdCheck == false)
          {
            header("Location: ../login.php?error=wrongpassword");
          }
          else if ($pwdCheck == true)
          {
            session_start();
            $_SESSION['email'] = $row['email'];
            $_SESSION['organisatie'] = $row['naam'];
            $_SESSION['organisatieID'] = $row['organisatieid'];
            header("Location: ../loggedin.php");
          }
          else
          {
            header("Location: ../login.php?error=pwdisnopwd");
          }
        }
        else
        {
          header("Location: ../login.php?error=nouser");
        }
      }
    }
  }
  else
  {
    header("Location: ../login.php?error=button_not_pressed");
  }
 ?>
