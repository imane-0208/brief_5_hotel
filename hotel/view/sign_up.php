<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../styles/sign_up.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Pricing</a>
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </div>
    </div>
  </div>
</nav>

<?php //include'../controller/client_register.php' ?>
       

      <div class="container login">
      <form action="../controller/client_register.php" method="POST">
        <h2>Sign Up</h2>
  <div class="mb-3">
    
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="first name" name="fname">
    
  </div>
  <div class="mb-3">
    
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="last name" name="lname">
    
  </div>
  <div class="mb-3">
    
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="phone number" name="phone">
    
  </div>
  <div class="mb-3">
    
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address" name="email">
    
  </div>
  <div class="mb-3">
  
    
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="passw">
  </div>
  <div class="mb-3">
  
    
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="confirme password" name="">
  </div>
  <button type="submit" class="btn" name="register">Submit</button>
  <a href="login.php">Or Login</a>
</form>
      </div>



         
      <script>

        
      </script>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- CSS only -->

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>