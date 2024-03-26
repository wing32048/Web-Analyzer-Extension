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
                    <?php
                        $pdo = dbconnect();
                        // echo $cookieId;
                        try {
                            $sql =  "SELECT * FROM user where id = $cookieId" ;
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetch();
                        } catch (PDOException $e) {
                            die($e->getMessage());
                        }
                    ?>  
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <h1 class="text-center">Account</h1>
                                <h3 class="text-center">Manage your account settings</h3>

                                <div class="text-center">
                                    <h5>Username</h5>
                                    <label>
                                        <?php echo $result['username']; ?>
                                    </label>
                                    <br>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/change_name.php'">Change Username</button>
                                </div>

                                <hr>

                                <!-- Email Address -->
                                <div class="text-center">
                                <h5>Email Address</h5>
                                <label>
                                    <?php echo $result['email']; ?>
                                </label>
                                <br>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/change_email.php'">Change Email</button>
                                </div>

                                <hr>

                                <div class="text-center">
                                <h5>Password</h5>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/change_pw.php'">Change Password</button>
                                </div>

                                <hr>
                            </div>
                        </div>
                    </div>
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