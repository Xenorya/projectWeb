<!doctype html>
<?php session_start(); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planner4u - Ceate Note</title>
    <link rel="icon" href="logo2.png" type="image/icon type">



    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styleHome.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>

<header>
    <div class="navbar">

        <div class="icon">
            <img src="p4u.png" class="logo2">
        </div>  
        <div class="icon">
            <h2 class="logo"></h2>
        </div>

        <div class="menu">
            <ul>
            <li><a href="home.php">HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="SERVICE.html">SERVICE</a></li>
                <li><a href="CONTACT.html">CONTACT</a></li>
                <li><a href="Calendar.php">CALENDAR</a></li>
        </div>
        
        <form action="search.php" target="_blank">
        
        <div class="search">
            <input class="btn" type="submit" name="submit" value="search page">
        </div>
        </form>
    </div> 
</header>

<main>
    <?php session_start(); ?>
    <?php
        if(@$_POST['title']!=''){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $title=$_POST['title'];
            $text=$_POST['text'];
            $reminder=$_POST['reminder'];

            try {
                $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO notes (title,text,date)
                VALUES ('$title','$text','$reminder')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            header('Location: home.php');
        }
    ?>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">New note</h1>
          <form method="POST" action="add.php">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp"> 
            </div>
            <div class="form-group">
              <label for="exampleInputnote">Content</label>
              <textarea type="text" class="form-control" id="text" name="text"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleCheck1">Choose date</label>
              <input type="date" class="form-control" id="reminder" name="reminder">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </section>


</main>


    <script src="./js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
