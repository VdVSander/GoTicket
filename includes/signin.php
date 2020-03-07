<?php
  if(isset($_POST['signin-submit']))
  {
    require 'config.php';
    $mail = $_POST['email'];
    $password = $_POST['password'];

    if(empty($mail) || empty($password))
    {
      header("Location: ../signin.php?php?error=not_enough_data");
    }
    else
    {
      $sql = "SELECT * FROM organisaties WHERE email=?;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql))
      {
        header("Location: ../signin.php?error=SQL_error1");
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
            header("Location: ../signin.php?error=wrongpassword");
          }
          else if ($pwdCheck == true)
          {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['organisatie'] = $row['naam'];
            header("Location: ../loggedin.html");
          }
          else
          {
            header("Location: ../signin.php?error=pwdisnopwd");
          }
        }
        else
        {
          header("Location: ../signin.php?error=nouser");
        }
      }
    }
  }
  else
  {
    header("Location: ../signin.php?error=button_not_pressed");
  }
 ?>
