<?php session_start(); ?>
<?php
include 'db_conn.php';

if (isset($_SESSION['username'])) {
  header("Location: index.php");
}

if (isset($_POST['submit'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);

if ($password == $cpassword) {
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  if (!$result->num_rows > 0) {
    $sql = "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script>alert('Wow! User Registration Completed.')</script>";
      $username = "";
      $email = "";
      $_POST['password'] = "";
      $_POST['cpassword'] = "";
    } else {
      echo "<script>alert('Woops! Something Wrong Went.')</script>";
    }
  } else {
    echo "<script>alert('Woops! Email Already Exists.')</script>";
  }
  
} else {
  echo "<script>alert('Password Not Matched.')</script>";
}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>SIGN UP</title>
    <link rel="stylesheet" href="sytle_signup.css">
    <link rel="icon" href="logo2.png" type="image/icon type">
</head>
<body>
    <div class="main">

        <form method="POST" action="login.php">
            <div class="container">
              <h1>Register</h1>
              <p>Please fill in this form to create an account.</p>
              <hr>
          
              <input type="text" placeholder="Enter User Name" name="username" id="email" required><br>

              <input type="text" placeholder="Enter Email" name="email" id="email" required><br>
          
              <input type="password" placeholder="Enter Password" name="password" id="psw" required><br>

              <input type="password" placeholder="Confirm Password" name="cpassword" id="psw" required>
          
              <hr>
          
              <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
              <button type="submit" name="submit" class="registerbtn">Register</button>
           
              <p>Already have an account? <a href="index.php">Log in</a></p>
            </div>
          </form>

    </div>
</body>
</html>