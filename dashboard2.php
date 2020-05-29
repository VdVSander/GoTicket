<?php
  session_start();
 ?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Go Ticket - Uw website voor tickets</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/png" href="favicon.ico">
</head>

<body>
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
  <!--Top Table UI-->

  <!--Card-->
  <div class="card card-cascade narrower">

    <!--Card header-->
    <div class="view view-cascade py-3 gradient-card-header info-color-dark mx-4 d-flex justify-content-between align-items-center">

      <div>
        <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
          <i class="fa fa-th-large mt-0"></i>
        </button>
        <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
          <i class="fa fa-columns mt-0"></i>
        </button>
      </div>

      <h1>Dashboard</h1>
      <a href="/add_new_event.php" class="btn btn-primary mr-1">Evenement toevoegen</a>
      <div>
        <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
          <i class="fas fa-pencil-alt mt-0"></i> </button>
        <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
          <i class="fas fa-times mt-0"></i>
        </button>
        <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
          <i class="fa fa-info-circle mt-0"></i>
        </button>
      </div>

    </div>
    <!--/Card header-->

    <!--Card content-->
    <div class="card-body">

      <div class="table-responsive">

        <table class="table text-nowrap">
          <thead>
            <tr>
              <th>#</th>
              <th>Evenementnaam</th>
              <th>Start datum</th>
              <th>Stop datum</th>
              <th>Totaal aantal tickets</th>
              <th>Verkocht aantal tickets</th>
            </tr>
          </thead>

          <tbody>
          <?php
            require 'includes/config.php';
            $organisatieID = $_SESSION['organisatieID'];
            $sql = "SELECT * FROM evenementen WHERE organisaties_organisatieid=?;";
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
                  echo '<tr><th scope="row">' . $row['evenementid'] . '</th>';
                  echo '<td>' . $row['naam'] . '</td>';
                  echo '<td>' . $row['startdatum'] . '</td>';
                  echo '<td>' . $row['stopdatum'] . '</td>';
                }
              }
              else
              {
                echo "0 evenementen";
              }
              $conn->close();
            }
            require 'includes/config.php';
            $organisatieID = $_SESSION['organisatieID'];
            $sql = "SELECT SUM(aantal) as totaal1 FROM tickettypes WHERE evenementid IN (SELECT evenementid FROM evenementen WHERE organisaties_organisatieid=?);";
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
                  echo '<td>' . $row['totaal1'] . '</td>';
                }
              }
              else
              {
                echo "0 evenementen";
              }
              $conn->close();
            }
            require 'includes/config.php';
            $organisatieID = $_SESSION['organisatieID'];
            $sql = "SELECT SUM(aantalverkocht) as totaal2 FROM tickettypes WHERE evenementid IN (SELECT evenementid FROM evenementen WHERE organisaties_organisatieid=?);";
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
                  echo '<td>' . $row['totaal2'] . '</td>';
                }
              }
              else
              {
                echo "0 evenementen";
              }
              $conn->close();
            }
          ?>
        </tbody>
</table>

      </div>
      <hr class="my-0">

      <!--Bottom Table UI-->
      <div class="d-flex justify-content-between">

        <!--Name-->
        <div class="wrap">
          <select class="mdb-select colorful-select dropdown-primary mt-2">
            <option value="" disabled>Aantal rijen</option>
            <option value="1" selected>10 rijen</option>
            <option value="2">25 rijen</option>
            <option value="3">50 rijen</option>
            <option value="4">100 rijen</option>
          </select>
        </div>
        <!--Pagination -->
        <nav class="mt-4">
          <ul class="pagination pagination-circle pg-blue mb-0">

            <!--First-->
            <li class="page-item disabled">
              <a class="page-link">Eerste</a>
            </li>

            <!--Arrow left-->
            <li class="page-item disabled">
              <a class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Vorige</span>
              </a>
            </li>

            <!--Numbers-->
            <li class="page-item active">
              <a class="page-link">1</a>
            </li>
            <li class="page-item">
              <a class="page-link">2</a>
            </li>
            <li class="page-item">
              <a class="page-link">3</a>
            </li>
            <li class="page-item">
              <a class="page-link">4</a>
            </li>
            <li class="page-item">
              <a class="page-link">5</a>
            </li>

            <!--Arrow right-->
            <li class="page-item">
              <a class="page-link" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Volgende</span>
              </a>
            </li>

            <!--First-->
            <li class="page-item">
              <a class="page-link">Laatste</a>
            </li>

          </ul>
        </nav>
        <!--/Pagination -->
      </div>
      <!--Bottom Table UI-->
    </div>
    <!--/.Card content-->
      <div class="container">
    <h1 class="text-center mb-4">Tickettype toevoegen</h1>
    <form id="contact-form" name="contact-form" method="POST" onSubmit="return validateForm()">

        <div class="row">
            <div class="col-md-12">
                <div class="md-form mb-0">
                    <label for="event">Welk event?</label>
                    <select name="event" id="event" class="form-control">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="md-form mb-0">
                  <label for="name" class="">Ticketnaam</label>
                  <input type="text" id="name" name="name" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="md-form mb-0 mt-2">
                  <label for="price" class="">Ticketprijs: €</label>
                  <input type="number" id="price" name="price" min="5">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="md-form mb-0">
                  <label for="start">Start geldigheid</label>
                  <input type="datetime-local" id="start" name="start">
                </div>
            </div>
          </div>
        <div class="row">
            <div class="col-md-12">
                <div class="md-form mb-0">
                  <label for="stop">Stop geldigheid</label>
                  <input type="datetime-local" id="stop" name="stop">
                </div>
            </div>
          </div>



    <div class="text-center mb-5">
        <input type="submit" class="btn btn-primary" name="contactb" value="Tickettype toevoegen"/>
    </div>
    <div id="status"></div>
</div>

</form>
  </div>
</div>

</body>
