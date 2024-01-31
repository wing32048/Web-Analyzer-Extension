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
        <form form method="post" action="./db/dbregister.php">
            <h1 class="h3 mb-3 fw-normal">Register</h1>

            <div class="form-floating">
                <input type="email" name='email' class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="text" name='username'class="form-control" id="floatingPassword" placeholder="Username">
                <label for="floatingUsername">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name='password' class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        </form>
    </main>
</body>
</html>
