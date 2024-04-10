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

                <div class="container-xl px-4 mt-4">
                <h1 class="h3 mb-2 text-gray-800">My Malicious Chain</h1>
                    <p class="mb-4">This table displays Malicious Chains what you insert.</p>
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body ">
                            <div class="mb-3">
                                <label class="mb-1" for="inputUsername">Username</label>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-9 text-center">
                                        <input class="form-control" type="text" value="<?php echo $result['username']; ?>" disabled>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <button type="button" class="form-control btn btn-primary btn-sm" onclick="window.location.href='/change_name.php'">Change Username</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="inputUsername">Email address</label>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-9 text-center">
                                        <input class="form-control" type="text" value="<?php echo $result['email']; ?>" disabled>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <button type="button" class="form-control btn btn-primary btn-sm" onclick="window.location.href='/change_email.php'">Change Email Address</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="inputUsername">Password</label>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-9 text-center">
                                        <input class="form-control" type="password" value="<?php echo $result['password']; ?>" disabled>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <button type="button" class="form-control btn btn-primary btn-sm" onclick="window.location.href='/change_pw.php'">Change Password</button>
                                    </div>
                                </div>
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