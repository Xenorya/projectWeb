<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planner4u - Home</title>


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
            <img src="logo2.png" class="logo2">
        </div>  
        <div class="icon">
            <h2 class="logo">Planner4U</h2>
        </div>

        <div class="menu">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="#">SERVICE</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>
        </div>
        

        <div class="search">
            <input class="srch" type="search" name="" placeholder="Type To text">
            <a href="#"> <button class="btn">Search</button></a>
        </div>
    </div> 
</header>

<main>

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
