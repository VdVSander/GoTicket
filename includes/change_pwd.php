<?php
  session_start();
  if(isset($_POST['submit_button']))
  {
    require 'config.php';
    $old_pwd = $_POST['old_pwd'];
    $new_pwd = $_POST['new_pwd'];
    $new_pwd_rep = $_POST['new_pwd_rep'];
    $klantID = $_SESSION['klantID'];

    if($new_pwd == $new_pwd_rep)
    {
      $sql = "SELECT * FROM klanten WHERE klantid=?;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql))
      {
        header("Location: ../account.php?error=SQL_error1");
      }
      else
      {
        mysqli_stmt_bind_param($stmt, "s", $klantID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result))
        {
          $pwdCheck = password_verify($old_pwd, $row['wachtwoord']);
          if($pwdCheck == false)
          {
            header("Location: ../acount.php?error=wrongpassword");
          }
          else if ($pwdCheck == true)
          {
            $sql = "UPDATE klanten SET password = ? WHERE klantid = ?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
              header("Location: ../account.php?error=sqlerror1");
            }
            else
            {
              $passwordHashed = password_hash($new_pwd, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt, "ss", $passwordHashed, $klantID);
              mysqli_stmt_execute($stmt);
              header("Location: ../account.php?pwd_change=success");
            }
            header("Location: ../account.php");
          }
          else
          {
            header("Location: ../account.php?error=pwdisnopwd");
          }
        }
        else
        {
          header("Location: ../account.php?error=nouser");
        }
      }
    }
    else
    {
      header("Location: ../account.php?error=password_not_same");
    }
  }

?>
