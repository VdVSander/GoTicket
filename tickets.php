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
        </div>
      </div>


      <div class="card">
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
                echo '<div class="card-header">' . $row['naam'] . '</div>';
                echo '<div class="card-body"><h5 class="card-title">Van ' . $row['startdatum'] . ' ';
                echo 'tot ' . $row['stopdatum'] . '</h5>';
              }
            }
            else
            {
              echo "0 evenementen";
            }
            $conn->close();
          }
        ?>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <h6>Tickettypes</h6>
          <?php
          require 'includes/config.php';
          $sql = "SELECT typenaam, prijs, aantal-aantalverkocht as beschikbaar FROM tickettypes WHERE evenementid=3;";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql))
          {
            header("Location: ../login.php?error=SQL_error1");
          }
          else
          {
            mysqli_stmt_bind_param($stmt, "s", $organisatieID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc())
              {
                echo '<p>Naam: ' . $row['typenaam'] . '</p> ';
                echo '<p>Prijs: €'. $row['prijs'] . '</p> ';
                echo '<p>Aantal beschikbaar: ' . $row['beschikbaar'] .'</p>';
              }
            }
            else
            {
              echo "0 evenementen";
            }
            $conn->close();
          }
          ?>
          <a href="#" class="btn btn-primary">Kopen</a>
        </div>
      </div>




    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
