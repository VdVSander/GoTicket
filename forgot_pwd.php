<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang=nl dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Go Ticket - Uw website voor tickets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-5">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a href="https://www.goticket.be"><img class="mx-4" src="GoTicketlogo.png" alt="Logo" style="width:100px;height:40px";></a>
      <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="menu-1 hover-icon mx-3">
            <a class="menu-1" href="index.php">Home</a>
          </li>
          <li class="menu-active hover-icon mx-3">
            <a class="menu-active" href="tickets.php">Tickets</a>
          </li>
          <li class="menu-1 hover-icon mx-3 mr-2s">
            <a class="menu-1" href="contact.php">Contact</a>
          </li>
        </ul>
    </div>
    </nav>
    <div class="container1">
      <div class="row">
        <div class="box-1">
          <h1 class="para-1">Tickets</h1>
        </div>
        <div class="box-2">
          <div class="right">
            <button type="button" id="register-button" class="btn btn-primary">Verkoop tickets</button>
            <?php
              if(isset($_SESSION['email']))
              {
                echo '<button type="button" id="logout-button" class="btn btn-primary">Logout</button>';
              }
              else
              {
                echo '<button type="button" id="login-button" class="btn btn-primary">Login</button>';
              }
             ?>
            <script type="text/javascript">
                document.getElementById("login-button").onclick = function () {location.href = "login.php";};
            </script>
            <script type="text/javascript">
                document.getElementById("logout-button").onclick = function () {location.href = "includes/logout.php";};
            </script>
            <script type="text/javascript">
                document.getElementById("register-button").onclick = function () {location.href = "register.php";};
            </script>
          </div>
          <form  action="includes/send_new_pwd.php" method="post">
            <label for="email">Geef hier je email in.</label>
            <input type="email" name="email">
            <button type="submit" name="submit_button">Verzend</button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
