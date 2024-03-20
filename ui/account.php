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
                    <h1>Account</h1>
                    <h3>Manage your account settings</h3>
                
                    <!-- Profile -->
                    <h5>Profile</h5>
                    <table>
                        <tr>
                            <td>Add your profile information here.</td>
                        </tr>
                    </table>
                    <hr>
                
                    <!-- Username -->
                    <h5>Username</h5>
                    <table>
                        <tr>
                            <td>Add your username here.</td>
                        </tr>
                    </table>
                    <button type="button" class="btn btn-primary btn-sm">Edit</button>

                    <hr>
                
                    <!-- Email Address -->
                    <h5>Email Address</h5>
                    <table>
                        <tr>
                            <td>Add your email address here.</td>
                        </tr>
                    </table>
                    <button type="button" class="btn btn-primary btn-sm">Edit</button>
                    <hr>
                </div>

            </div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <?php 
        require_once 'logout.php';
    ?>

</body>

</html>