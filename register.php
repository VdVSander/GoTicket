<!DOCTYPE html>
<html lang=nl dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Go Ticket - Uw website voor tickets</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script defer src="register_script.js"></script>
</head>

<body style="background-image: url('achtergrond.jpg'); background-size: cover; background-repeat: no-repeat;
  background-attachment: fixed;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="https://www.goticket.be"><img src="GoTicketlogo.png" alt="Logo" style="width:100px;height:40px" ;></a>
    <p style="margin-left:50px">(!) Opgelet! Deze website is een schoolproject en is dus niet in werking.</p>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="menu-active">
          <a class="menu-active" href="index.php">Home</a>
        </li>
        <li class="menu-1">
          <a class="menu-1" href="tickets.php">Tickets</a>
        </li>
        <li class="menu-1">
          <a class="menu-1" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row">

      <div class="box-2">
        <div class="right">
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
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="card mx-auto p-3" style="width:35rem;">
    <h1>Registreer</h1>
    <div id="error" style="color:red; font-size:15px;"></div>
    <form action="includes/signup.php" method="POST" id="form">
      <fieldset>
        <div id="legend">
          <legend class="h2">Registreer je organisatie</legend>
        </div>
        <div class="form-row">
          <!-- Username -->
          <div class="form-group col-md-6">
            <label for="name">Organisatie</label>
            <div class="controls">
              <input type="text" id="name" name="name" class="form-control" required>
              <p class="subtext">Geef hier de naam van uw organisatie</p>
            </div>
          </div>

          <!-- E-mail -->
          <div class="form-group col-md-6">
            <label for="email">E-mail</label>
            <div class="controls">
              <input type="text" id="email" name="email" class="form-control" type="email" required>
              <p class="subtext">E-mail adres waarop wij u mogen contacteren</p>
            </div>
          </div>
        </div>
        <div class="form-row">
          <!-- Password-->
          <div class="form-group col-md-6">
            <label for="password">Wachtwoord</label>
            <div class="controls">
              <input type="password" id="password" name="password" class="form-control" required>
              <p class="subtext">Uw wachtwoord moet minstens 8 karrakters lang zijn</p>
            </div>
          </div>

          <!-- Password -->
          <div class="form-group col-md-6">
            <label for="password_confirm">Wachtwoord (bevestiging)</label>
            <div class="controls">
              <input type="password" id="passwordConfirm" name="password_confirm" class="form-control" required>
              <p class="subtext">Bevestig hier uw wachtwoord</p>
            </div>
          </div>
        </div>
        <!-- Button -->
        <div class="controls">
          <button class="btn btn-primary" type="submit" name="signup-submit">Registreer</button>
        </div>
      </fieldset>
    </form>
    <div class="mt-4">
      <div class="d-flex justify-content-center links">
        <a href="#">Wachtwoord vergeten?</a>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
