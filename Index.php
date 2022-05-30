<!DOCTYPE html>
<html lang="en">
<head>
    <title>Planner4U</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo2.png" type="image/icon type">

  </head>
<body>
    <form action="login.php" method="post">



    
    
    <section id="Planner4U">
        <img src="P4u.png" class="logo2">
        </section>
        
        


    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo"></h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="index.php">LOGIN</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="SERVICE.html">SERVICE</a></li>
                    <li><a href="CONTACT.html">CONTACT</a></li>
                </ul>
            </div>
            

           

        </div> 
        <div class="content">
            <h1>Plans are nothing & <br><span>planning </span> <br> <span>IS EVRYTHING</span><br>

            

                <button class="cn"><a href="#">JOIN US</a></button>

                <div class="form">
                    <h2>Login Here</h2>
                    <?php if (isset($_GET['error'])) { ?>
     		        <p class="error"><?php echo $_GET['error']; ?></p>
     	            <?php } ?>
                    <input type="text" name="uname" placeholder="Enter Email Here">
                    <input type="password" name="password" placeholder="Enter Password Here">
                    <button ref="log.php" class="btnn"><a href="#">Login</a></button>

                    <form action="log.php" method="post">
     	        
                </form>

                    <p class="link">Don't have an account<br>
                    <a href="register.php">Sign up </a> here</a></p>
                    

                </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>