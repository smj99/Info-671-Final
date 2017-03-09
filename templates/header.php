<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Social Student Registration System</title>
    <link rel="stylesheet" type="text/css" href="templates/style.css" />
  </head>
  <body>
    <div id="container">
        <div class="pageheader">
            <h1>Drexel University Social Registration System</h1>
        </div>
        <div class="studentheader">
            <p><?php echo "student name" ?></p>
            <?php 
                date_default_timezone_set("America/New_York");
                echo date("F j, Y"); ?>

        </div>