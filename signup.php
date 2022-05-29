<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>SIGN UP</title>
    <link rel="stylesheet" href="sytle_signup.css">
    <link rel="icon" href="logo2.png" type="image/icon type">
</head>
<body>
    <div class="main">
        <form action="action_page.php">
            <div class="container">
              <h1>Register</h1>
              <p>Please fill in this form to create an account.</p>
              <hr>
          
              <input type="text" placeholder="Enter Email" name="email" id="email" required><br>
          
              <input type="password" placeholder="Enter Password" name="psw" id="psw" required><br>
          
              <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
              <hr>
          
              <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
              <button type="submit" class="registerbtn">Register</button>
           
              <p>Already have an account? <a href="index.php">Log in</a></p>
            </div>
          </form>

    </div>
</body>
</html>