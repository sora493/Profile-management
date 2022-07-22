<?php
$username = 0;
$password = "";
$error = false;
$loginOK = null;

if (isset($_POST["submit"])) {
  if(isset($_POST["Username"])) $username=$_POST["Username"];
  if(isset($_POST["Password"])) $password=$_POST["password"];

  if(empty($username) || empty($password)) {
    $error=true;
  }

  if (!$error) {
    require_once("db.php");
    $sql = "select Username, Password from usernames where Username=$username and Password='$password";
    $result = $mydb->query($sql);

    $row=mysqli_fetch_array($result);

    if ($row){
      if (strcmp($username, $row["Username"]) == 0 && strcmp($password, $row["Password"]) == 0) {
        $loginOK = true;
      } else {
        $loginOK = false;
      }

      if($loginOK) {
        session_start();
        $_SESSION["Username"] = $username;
        $_SESSION["Password"] = $Password;
        setcookie("lastLoginTime", date("F j, Y, g:i a"), time()+60*60*24*2, "/");  //e.g., March 10, 2001, 5:16 pm
        Header("Location: greeting.php");
      } elseif (!$loginOK) {
        echo "<p>Please make sure you have entered the correct information.</p>";
      }

    } else {
      echo "<p>The username does not exist.</p>";
    }
  }
}
?>

<!doctype html>
<head>
  <title>Login Page</title>
  <style type="text/css">
        /*the CSS style applies to all html elements with class='error'*/
        body      {background-color: lavender}

        .error {
            color: red;
        }
  </style>
</head>
<body>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <label>Username:
      <input type="text" name="username" value="<?php
        if(!empty($username))
          echo $username;
      ?>" />
    </label><br />
    <label>Password:
      <input type="password" name="Password" value="<?php
        if(!empty($password))
          echo $password;
      ?>" />
    </label><br />
    <input type="submit" name="submit" value="Login" />
</body>