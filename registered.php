
<!DOCTYPE html>
<html lang=nl dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Go Ticket - Uw website voor tickets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body style="background-image: url('achtergrond.jpg'); background-size: cover; background-repeat: no-repeat;
  background-attachment: fixed;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <img src="GoTicketlogo.png" alt="Logo" style="width:100px;height:40px";>
          <li class="menu-active">
            <a class="menu-active" href="index.html">Home</a>
          </li>
          <li class="menu-1">
            <a class="menu-1" href="tickets.html">Tickets</a>
          </li>
          <li class="menu-1">
            <a class="menu-1" href="contact.html">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container1">
      <div class="row">
        <div class="box-1">
          <h1 class="para-1">Registratie compleet</h1>
        </div>
        <div class="box-2">
          <div class="right">
            <button type="button" id="login-button" class="btn btn-primary">Login</button>
            <script type="text/javascript">
                document.getElementById("register-button").onclick = function () {location.href = "register.html";};
            </script>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <?php
        if($_POST[password] != $_POST[password_confirm] || $_POST[password] == "" || $_POST[password_confirm] == "")
        {
          alert("Het wachtwoord werd niet correct ingevuld");
          header(location:"/register.html");
        }
        else
        {
          echo "<p class='para-1'> Je hebt je bedrijf: ";
          echo $_POST['bedrijfsnaam'];
          echo " succesvol geregistreerd! <br> We houden je op de hoogte van verdere ontwikkelingen. </p>";
        }
      ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
