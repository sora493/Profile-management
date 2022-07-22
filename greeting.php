<!doctype html>
<html>
<head>
  <title>HW13 Question 4</title>
</head>
<body>
  <?php
    $timeString = "";
    date_default_timezone_set("EST");
    $currentHour = date("H");

    if ($currentHour <12) {
      $timeString = "morning";
    } else {
      $timeString = "afternoon";
    }

    session_start();  //must be specified to use the session array
    echo "<p>Good "."$timeString".", <br /> Please keep in mind that your
          username is ".$_SESSION["Username"].". Your last log in time was ".$_COOKIE["lastLoginTime"].".</p>";
   ?>
</body>
</html>