<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
<main class="form-signin">
    <form method="post" action="dbbinsert.php">
        <h1 class="h3 mb-3 fw-normal">Blacklist insert</h1>
        <div class="form-floating">
            <input type="url" class="form-control" id="floatingInput" name="url" placeholder="https://example.com">
            <label for="floatingInput">URL</label>
        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <button id="signin" class="btn btn-primary btn-lg px-4 gap-3" type="submit">Submit</button>
        </div>
    </form>
</main>
</body>
</html>