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
            <h1>About our Web Analysis</h1> 
            <h5>Installing our tools can enhance your browsing safety. Once you visit a website, our tools will automatically scan it to detect potential malware such as XSS (Cross-Site Scripting), Drive-By Downloads, and URL Redirects. This automatic scanning extension ensure a secure browsing for our users.</h5> 

        </div>

    </main>
</body>
</html>
