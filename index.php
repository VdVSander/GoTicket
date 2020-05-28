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
          <li class="menu-active hover-icon mx-3">
            <a class="menu-active" href="index.php">Home</a>
          </li>
          <li class="menu-1 hover-icon mx-3">
            <a class="menu-1" href="tickets.php">Tickets</a>
          </li>
          <li class="menu-1 hover-icon mx-3 mr-2s">
            <a class="menu-1" href="contact.php">Contact</a>
          </li>
        </ul>
    </div>
    </nav>
    <div class="container-home backg">
      <div class="row">
        <div class="box-1">
          <h1 class="para-1 mt-4">Welkom op de website van Go Ticket</h1>
        </div>
        <div class="box-2">
          <div class="right">
            <?php
              if (isset($_SESSION['organisatieID']))
              {
                echo '<h3 style="color:white;"> Welkom '.$_SESSION['organisatie'].'</h3>';
                echo '<button type="button" id="dashboard-button" class="btn btn-primary">Dashboard</button>';
                echo '<button type="button" id="logout-button" class="btn btn-primary">Logout</button>';
              }
              else if(isset($_SESSION['klantID']))
              {
                echo '<h3 style="color:white;"> Welkom '.$_SESSION['naam'].'</h3>';
                echo '<button type="button" id="account-button" class="btn btn-primary">Account</button>';
                echo '<button type="button" id="logout-button" class="btn btn-primary">Logout</button>';
              }
              else
              {
                echo '<button type="button" id="register-button" class="btn btn-primary mr-1">Verkoop tickets</button>';
                echo '<button type="button" id="login-button" class="btn btn-primary ml-1">Login</button>';
              }
             ?>
            <script type="text/javascript">
                document.getElementById("login-button").onclick = function () {location.href = "login.php";};
                document.getElementById("logout-button").onclick = function () {location.href = "includes/logout.php";};
                document.getElementById("dashboard-button").onclick = function () {location.href = "dashboard.php";};
                document.getElementById("register-button").onclick = function () {location.href = "register.php";};
                document.getElementById("account-button").onclick = function() {location.href = "account.php";};
            </script>
          </div>
        </div>
      </div>
    </div>

    <div class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
        </div>
      </div>
    </div>
    <div class="px-5 mt-3 mb-4">
      <h2>Komende evenementen</h2>
    </div>
    <div class="px-5 mt-3 mb-3">
    <div class="row">
      <div class="col">
        <div class="card">
          <img class="card-img-top" src="images/No_image.png" alt="Card image cap">
          <div class="card-body">
            <?php
              require 'includes/config.php';
              $eventID = '2';
              $sql = "SELECT * FROM evenementen WHERE evenementid=?;";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql))
              {
                echo "Location: ../login.php?error=SQL_error1";
              }
              else
              {
                mysqli_stmt_bind_param($stmt, "s", $eventID);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($result->num_rows > 0)
                {
                  while($row = $result->fetch_assoc())
                  {
                    echo '<h2>' . $row['naam'] . '</h2>';
                    echo '<p>Van ' . $row['startdatum'] . '</p>';
                    echo '<p>Tot ' . $row['stopdatum'] . '</p>';
                  }
                }
                else
                {
                  echo "0 evenementen";
                }
                $conn->close();
              }
            ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img class="card-img-top" src="images/No_image.png" alt="Card image cap">
          <div class="card-body">
            <?php
              require 'includes/config.php';
              $eventID = '3';
              $sql = "SELECT * FROM evenementen WHERE evenementid=?;";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql))
              {
                echo "Location: ../login.php?error=SQL_error1";
              }
              else
              {
                mysqli_stmt_bind_param($stmt, "s", $eventID);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($result->num_rows > 0)
                {
                  while($row = $result->fetch_assoc())
                  {
                    echo '<h2>' . $row['naam'] . '</h2>';
                    echo '<p>Van ' . $row['startdatum'] . '</p>';
                    echo '<p>Tot ' . $row['stopdatum'] . '</p>';
                  }
                }
                else
                {
                  echo "0 evenementen";
                }
                $conn->close();
              }
            ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img class="card-img-top" src="images/No_image.png" alt="Card image cap">
          <div class="card-body">
            <?php
              require 'includes/config.php';
              $eventID = '4';
              $sql = "SELECT * FROM evenementen WHERE evenementid=?;";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql))
              {
                echo "Location: ../login.php?error=SQL_error1";
              }
              else
              {
                mysqli_stmt_bind_param($stmt, "s", $eventID);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($result->num_rows > 0)
                {
                  while($row = $result->fetch_assoc())
                  {
                    echo '<h2>' . $row['naam'] . '</h2>';
                    echo '<p>Van ' . $row['startdatum'] . '</p>';
                    echo '<p>Tot ' . $row['stopdatum'] . '</p>';
                  }
                }
                else
                {
                  echo "0 evenementen";
                }
                $conn->close();
              }
            ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img class="card-img-top" src="images/No_image.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
