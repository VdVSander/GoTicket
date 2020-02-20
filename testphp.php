<?php
  include_once 'includes/config.php'
 ?>
 <!DOCTYPE html>
 <html lang="nl" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <?php
        $sql = "SELECT * FROM organisaties;";
        $results = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($results);

        if($resultcheck > 0)
        {
          while ($row = mysqli_fetch_assoc($results))
          {
            echo $row['naam'] . "<br>";
          }
        }
      ?>
   </body>
 </html>
