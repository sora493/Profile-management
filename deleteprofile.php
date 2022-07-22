<?php
    // Attempt delete query execution
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
  <title>Delete User Profile</title>
  <style>
    .errlabel {color:red;}
  </style>
</head>
<body>
<style type="text/css">
        /*the CSS style applies to all html elements with class='error'*/
        body      {background-color: lavender}

        .error {
            color: red;
        }
  </style>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"
  <h1>Please enter the login information you would like to delete</h1>
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