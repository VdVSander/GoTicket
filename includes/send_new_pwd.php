<?php
if(isset($_POST['submit_button']))
{
  require 'config.php';
  $email = $_POST['email'];

  $sql = "SELECT * FROM klanten WHERE email=?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    header("Location: ../account.php?error=SQL_error1");
  }
  else
  {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_fetch_assoc($result))
    {
      $new_pwd = generateRandomString();

      $sql = "UPDATE klanten SET wachtwoord = ? WHERE email = ?;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql))
      {
        header("Location: ../index.php?error=sqlerror2");
      }
      else
      {
        $passwordHashed = password_hash($new_pwd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ss", $passwordHashed, $email);
        mysqli_stmt_execute($stmt);
        $message = "Je nieuwe wachtwoord is:". $new_pwd;
        mail($email,"Wachtwoord aangepast!",$message);
        header("Location: ../account.php?new_pwd=sent");
      }
    }
  }
}
    function generateRandomString($length = 10)
    {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++)
      {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }

?>
