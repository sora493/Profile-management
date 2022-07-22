<?php
    // Attempt to delete pervious profile information
    $sql = "DELETE FROM profiles WHERE username='$username' AND WHERE password='$password'";
    if(mysqli_query($link, $sql)){
    echo "Records were deleted successfully.";
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    // Close connection
        mysqli_close($link);
?>

<!doctype html>
<head>
  <title>Modify Profile</title>
  <style type="text/css">
        /*the CSS style applies to all html elements with class='error'*/
        body      {background-color: lavender}

        .error {
            color: red;
        }
  </style>
</head>
<body>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"
  <h1> Please enter your old login information.</h1>
  <label>Username:
      <input type="text" name="username" value="<?php echo $username; ?>" />
      <?php
        if ($err && empty($username)) {
          echo "<label class='errlabel'>Error: Please enter your existing username.</label>";
        }
      ?>
    </label>
    <br />

    <label>Password:
      <input type="text" name="password" value="<?php echo $password; ?>" />
      <?php
        if ($err && empty($password)) {
          echo "<label class='errlabel'>Error: Please enter your existing password.</label>";
        }
      ?>
    </label>
    <br />
    <input type="submit" name="submit" value="Submit" />
</body>
<?php
  $username = "";
  $password = "";
  $err = false;

  if (isset($_POST["submit"])) {
    if(isset($_POST["Username"])) $username = $_POST["Username"];
    if(isset($_POST["Password"])) $password = $_POST["password"];

    if (!empty($password) && ($username>0)){
      header("HTTP/1.1 307 Temprary Redirect");
      header("Location:  createprofile.php");
    } else {
      $err = true;
    }
  }
?>
<head>
  <title>Create User Profile</title>
  <style type="text/css">
        /*the CSS style applies to all html elements with class='error'*/
        body      {background-color: lavender}

        .error {
            color: red;
        }
  </style>
</head>
<body>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"
  <h1>Please enter your new login information.</h2>
  <label>Username:
      <input type="text" name="username" value="<?php echo $username; ?>" />
      <?php
        if ($err && empty($username)) {
          echo "<label class='errlabel'>Error: Please create a username.</label>";
        }
      ?>
    </label>
    <br />

    <label>Password:
      <input type="text" name="password" value="<?php echo $password; ?>" />
      <?php
        if ($err && empty($password)) {
          echo "<label class='errlabel'>Error: Please create a password.</label>";
        }
      ?>
    </label>
    <br />
    <input type="submit" name="submit" value="Submit" />
</body>