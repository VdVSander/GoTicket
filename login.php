<!DOCTYPE html>
<!DOCTYPE html>
<html lang=nl dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Go Ticket - Uw website voor tickets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script defer src="signin_script.js"></script>
  </head>
  <body style="background-image: url('achtergrond.jpg'); background-size: cover; background-repeat: no-repeat;
  background-attachment: fixed;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a href="https://www.goticket.be"><img src="GoTicketlogo.png" alt="Logo" style="width:100px;height:40px";></a>
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
            <button type="button" id="register-button" class="btn btn-primary">Verkoop tickets</button>
            <?php
              if(isset($_SESSION['email']))
              {
                echo '<button type="button" id="logout-button" class="btn btn-primary">Logout</button>';
              }
             ?>
            <script type="text/javascript">
                document.getElementById("logout-button").onclick = function () {location.href = "includes/logout.php";};
            </script>
            <script type="text/javascript">
                document.getElementById("register-button").onclick = function () {location.href = "register.php";};
            </script>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="card mx-auto p-3" style="width:18rem;">
      <h1>Login</h1>
      <br />
    <div class="container h-100">
      <div id="error" style="color:red; font-size:15px;"></div>
  <div class="d-flex justify-content-center h-100">
    <div class="user_card">
      <div class="d-flex justify-content-center form_container">
        <form action="includes/signin.php" method="POST" id="form">
            <p><b>Klant of ticketbedrijf?</b></p>
            <input type="radio" name="type" id="type" value="klant">
            <label for="klant">Klant</label><br>
            <input type="radio" name="type" id="type" value="bedrijf">
            <label for="bedrijf">Bedrijf</label><br>
            <p><b>Gegevens</b></p>
          <div class="input-group mb-3">
            <div class="input-group-append">
              <span class="input-group-text"> <img src="open-iconic-master/png/person-2x.png" alt="man"> </span>
            </div>
            <input type="email" name="email" id="email" class="form-control input_user" placeholder="gebruikersnaam" required>
          </div>
          <div class="input-group mb-2">
            <div class="input-group-append">
              <span class="input-group-text"> <img src="open-iconic-master/png/key-2x.png" alt="key"> </span>
            </div>
            <input type="password" name="password" id="password" class="form-control input_pass" placeholder="wachtwoord" required>
          </div>
          <div class="form-group">
          </div>
            <div class="d-flex justify-content-center mt-3 login_container">
        <button type="submit" name="signin-submit" class="btn btn-primary">Login</button>
         </div>
        </form>
      </div>
      <div class="mt-4">
        <div class="d-flex justify-content-center links">
          <a href="forgot_pwd.php">Wachtwoord vergeten?</a>
          <a href="register_new_user.php">Nog geen account?</a>
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
