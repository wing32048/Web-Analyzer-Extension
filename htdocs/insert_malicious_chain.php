<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Insert Malicious Chain</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <?php
    require_once './inc/db.inc.php';
    ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        require_once 'sidebar.php';
        ?>

        <!-- Your existing sidebar code here -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php
                    require_once 'topbar.php';
                ?>
                <!-- Your existing topbar code here -->
                <div class="container-fluid text-center">
                    <h1 class="h3 mb-4 text-gray-800">Insert Malicious Chain</h1>
                    <p>Here can insert malicious chain in the text box.</p>
                    <!-- <p>Today think think.</p> -->
                    <?php
                        if (isset($_GET['error']) && $_GET['error'] == 1) {
                            echo "This malicious chain already in the database";
                        }else if (isset($_GET['error']) && $_GET['error'] == 2) {
                            echo "Please select type/input malicious chain";
                        }else if (isset($_GET['successful']) && $_GET['successful'] == 1) {
                            echo "Input successful";
                        }
                    ?>
                    <form method="post" action="/db/dbinsert_malicious_chain.php">
                        <div class="mb-3 row justify-content-center">
                            <label class="col-sm-1 col-form-label">Type:</label>
                            <div class="col-sm-5">
                                <select class="form-select" name="type" aria-label="Default select example">
                                    <option value="" selected>Please select type</option>
                                    <option value="XSS">XSS</option>
                                    <option value="URL redirect">URL redirect</option>
                                    <option value="DBD">Drive By Download</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-center">
                            <label class="col-sm-1 col-form-label">Chain:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="code" placeholder="javascript:,document.cookie">
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-sm-1 mx-auto">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <?php
    require_once 'logout.php';
    ?>

</body>

</html>