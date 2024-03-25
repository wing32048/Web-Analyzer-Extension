<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Profile</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <?php 
        require_once './inc/db.inc.php';
    ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php 
            require_once 'sidebar.php';
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                
                <?php 
                    require_once 'topbar.php';
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1>Change Email</h1>
                    <div class="container">
                        <form id="changeEmailForm" method="post" action="./db/dbchange_email.php">
                        <!-- <div class="form-group">
                            <label for="current-email">Current Email</label>
                            <input type="email" class="form-control" id="current-email" placeholder="Enter your current email">
                        </div> -->
                        <?php
                            if (isset($_GET['error']) && $_GET['error'] == 1) {
                                echo "
                                <script>
                                alert('Incorrect email address')
                                </script>
                                ";
                            }
                        ?>
                        <div class="form-group">
                            <label for="new-email">New Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter a new email">
                        </div>

                        <div class="form-group">
                            <label for="confirm-email">Confirm New Email</label>
                            <input type="email" class="form-control" name="confirm_email" placeholder="Confirm your new email">
                        </div>
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                        </form>
            </div>
                    
            </div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- <script>
        document.getElementById('changeEmailForm').addEventListener('submit', function(event) {
            var currentEmail = document.getElementById('current-email').value;
            var newEmail = document.getElementById('new-email').value;
            var confirmEmail = document.getElementById('confirm-email').value;

            if (currentEmail === '') {
                alert("Please enter your current email.");
                event.preventDefault();
                return;
            }

            if (newEmail === '') {
                alert("Please enter a new email.");
                event.preventDefault();
                return;
            }

            if (newEmail !== confirmEmail) {
                alert("New email and confirm email do not match.");
                event.preventDefault();
                return;
            }

        });
    </script> -->

    <?php 
        require_once 'logout.php';
    ?>

</body>

</html>