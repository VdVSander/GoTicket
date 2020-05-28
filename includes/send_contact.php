<?php
  if(isset($_POST['contactb']))
  {
    if(isset( $_POST['name']))
    {
      $name = $_POST['name'];
    }
    if(isset( $_POST['email']))
    {
      $email = $_POST['email'];
    }
    if(isset( $_POST['message']))
    {
      $message = $_POST['message'];
    }
    if(isset( $_POST['subject']))
    {
      $subject = $_POST['subject'];
    }
    require 'config.php';
    $content="Van: $name \n E-mail: $email \n Bericht: $message";
    mail($to_mail,$subject,$content);
    header("Location: ../contact-verzonden.php");
  }
  else
  {
    header("Location: ../contact.php?error=btnNotPressed");
  }
?>
