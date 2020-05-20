<!DOCTYPE html>
<html lang=nl dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Go Ticket - Uw website voor tickets</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/png" href="favicon.ico">
  <script defer src="register_script.js"></script>
  <script defer src="contact_script.js"></script>
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
        <li class="menu-1 hover-icon mx-3">
          <a class="menu-1" href="tickets.php">Tickets</a>
        </li>
        <li class="menu-active hover-icon mx-3 mr-2s">
          <a class="menu-active" href="contact.php">Contact</a>
        </li>
      </ul>
  </div>
  </nav>
  <div class="container1 px-5">
    <div class="row">
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
  </div>

  <section class="mb-4 px-5">

      <h2 class="h1-responsive font-weight-bold text-center my-4">Contacteer ons</h2>
      <p class="text-center w-responsive mx-auto mb-5">Heeft u vragen voor ons? Neem contact op en we beantwoorden deze binnen de 48 uur.</p>

      <div class="row mx-auto">


          <div class="col-md-6 mb-md-0 mb-5">
              <h2 class="h2-responsive font-weight-bold my-4 text-center">Contactformulier</h2>
              <form id="contact-form" name="contact-form" method="POST" onSubmit="return validateForm()">


                  <div class="row">


                      <div class="col-md-6">
                          <div class="md-form mb-0">
                              <input type="text" id="name" name="name" class="form-control">
                              <label for="name" class="">Uw naam</label>
                          </div>
                      </div>



                      <div class="col-md-6">
                          <div class="md-form mb-0">
                              <input type="text" id="email" name="email" class="form-control">
                              <label for="email" class="">Uw email</label>
                          </div>
                      </div>

                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <div class="md-form mb-0">
                              <input type="text" id="subject" name="subject" class="form-control">
                              <label for="subject" class="">Onderwerp</label>
                          </div>
                      </div>
                  </div>

                  <div class="row">

                      <div class="col-md-12">

                          <div class="md-form">
                              <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                              <label for="message">Uw bericht</label>
                          </div>

                      </div>
                  </div>

              <div class="text-center">
                  <input type="submit" class="btn btn-primary" name="contactb" value="Contactaanvraag versturen"/>
              </div>
              <div id="status"></div>
          </div>

  </form>

          <div class="col-md-6 text-center">
              <h2 class="h2-responsive font-weight-bold my-4">Contact informatie</h2>
              <p>Voor het vlotste contact kan u ons contacteren via info@goticket.be<p>
              <h4>Sander Van de Ven</h4>
              <p>E-mail: sander@goticket.be<p>
              <h4>Lukas Ceunen</h4>
              <p>E-mail: lukas@goticket.be<p>
          </div>

      </div>

  </section>


  </section>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
