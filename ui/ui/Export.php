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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css"/>



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

        .ui-datepicker {
            background-color: #ffffff /* Replace with your desired background color */
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
        <section class="container">
            <h2 class="py-2">Please choose a date to export the file.</h2>
            <form class="row" method='post' action='dbexport.php'>
                <label for="datepicker" class="col-2 col-form-label">Date Before:</label>
                    <div class="col-5">
                        <input type="text" id="datepicker" name="date" class="form-control" />
                    </div>
                <button class="btn btn-primary" type="submit">export</button>
            </form>
            <br>
        </section>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                $('#datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    uiLibrary: 'bootstrap5'
                });
            });
        </script>

      
    </main>
</body>
</html>
