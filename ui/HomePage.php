<!doctype html>
<html lang="en">
  <head>
    <?php
      require_once "./inc/session.inc.php";
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Malicious Checker</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

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

    
    <!-- Custom styles for this template -->
    <link href="sidebars.css" rel="stylesheet">
  </head>
  <body>
    

<main>
    <?php 
    require_once 'sidebars.php';

    ?>
  
  <div class="b-example-divider"></div>
  
  <div class="h5 mb-3 fw-normal col py-5">
    <h1>Recent browser record</h1> 
    <h4>Users can view their recent browsing history. The browsing record are categorized into four types: Whitelist, Blacklist, Normal website and Malicious Website</h4> 
   
     <table class="table">
      <thead>
        <tr>
          <th scope="col">Date</th>
          <th scope="col">URL</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">11-12-2023</th>
          <td>https://www.youtube.com</td>
          <td>Normal</td>
        </tr>
        <tr>
          <th scope="row">11-12-2023</th>
          <td>https://www.facebook.com</td>
          <td>Normal</td>
        </tr>
        <tr>
          <th scope="row">11-12-2023</th>
          <td>http://amz0n.com</td>
          <td>Malicious</td>
        </tr>
        <tr>
          <th scope="row">10-12-2023</th>
          <td>https://www.facebook.com</td>
          <td>Normal</td>
        </tr>
        <tr>
          <th scope="row">10-12-2023</th>
          <td>https://www.google.com</td>
          <td>Normal</td>
        </tr>
      </tbody>

    </table>
</div>

</main>



    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="sidebars.js"></script>
  </body>
</html>
