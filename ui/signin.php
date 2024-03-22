<!doctype html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>WEB ANALYZER</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <script src="popup.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

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
    <link href="./css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
    
    <main class="form-signin">
        <form method="post" action="./db/dbsignin.php">
        
            <h1 class="h3 mb-3 fw-normal">Sign in</h1>
            <?php
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                    echo "Incorrect email address/password";
                }else if (isset($_GET['successful']) && $_GET['successful'] == 1) {
                    echo "Register successful";
                }
            ?>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button id="signin" class="btn btn-primary btn-lg px-4 gap-3" type="submit">Sign-in</button>
                <button type="button" id="registerButton" class="btn btn-outline-secondary btn-lg px-4" onclick="window.location.href='./register.php'">Register</button>
            </div>
        </form>
    </main>
</body>
</html>
