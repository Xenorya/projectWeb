<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planner4u - Home</title>
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
            <img src="P4u.png" class="logo2">
        </div>

        <div class="menu">
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="#">SERVICE</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>
        </div>
        

        <div class="search">
            <input class="srch" type="search" name="" placeholder="Type To text">
            <a href="view.php"> <button class="btn">Search</button></a>
        </div>
    </div> 
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Quote of the moment</h1>
        <p class="lead text-muted">xxxxx</p>
      </div>
    </div>
  </section>

  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $sql = "SELECT id,title,text,date FROM notes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();    
  ?>

  <div class="album py-5 bg-light">
    <div class="container">
    <center><button onclick="location.href='add.php'" type="button" class="btn btn-sm btn-outline-secondary">Add Note</button></center><br><br>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php while($row = $stmt->fetch()) { 
          echo '
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg"
            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>'. $row['title'] .'</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">'. $row['title'].' </text></svg>
            <div class="card-body">
              <p class="card-text">'. substr($row['text'], 0, 50) .'</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group"> 
                  
                  <button onclick="location.href=\'view.php?id='. $row['id'] .'\'" type="button" class="btn btn-sm btn-outline-secondary">View</button>
                   <button onclick="location.href=\'delete_note.php?id=' .$row['id']. '\'" type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                  
                </div>
                <small class="text-muted">'. $row['date'] .'</small>
              </div>
            </div>
          </div>
        </div>
        ';
        } ?>
      </div>
    </div>
  </div>
  

</main>


    <script src="./js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
