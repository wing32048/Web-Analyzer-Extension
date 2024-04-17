<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>WEB ANALYZER</title>
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/"> -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">    
    <main class="form-signin">
        <form form method="post" action="./db/dbregister.php">
            <h1 class="h3 mb-3 fw-normal">Register</h1>
            <?php
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                    echo "Input error";
                }else if (isset($_GET['error']) && $_GET['error'] == 2) {
                    echo "Password not match/Password not strong";
                }
            ?>
            <div class="form-floating">
                <input type="email" name='email' class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="text" name='username'class="form-control" id="floatingUsername" placeholder="Username">
                <label for="floatingUsername">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name='register_password' class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" name='re-enter_password' class="form-control" id="floatingPassword" placeholder="Re-enter Password">
                <label for="floatingPassword">Re-enter Password</label>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button class="btn btn-primary btn-lg px-4 gap-3" type="submit">Register</button>
                <button type="button" id="registerButton" class="btn btn-outline-secondary btn-lg px-4" onclick="window.location.href='/signin.php'">Sign-in</button>
            </div>
        </form>
    </main>
</body>
</html>
