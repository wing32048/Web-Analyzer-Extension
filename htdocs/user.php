<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        require_once './inc/db.inc.php';
        $pdo = dbconnect();
        try {
            $sql =  "SELECT * FROM user where id = $cookieId" ;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            if ($result["admin"] == "N"){
                header('location: /account.php');
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Malicious Chain</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <?php 
        require_once './inc/db.inc.php';
    ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">User Information</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User Information</h6>
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Admin</th>
                                            <th>Switch to</th>
                                            <th>Switch to</th>
                                            <th>View Malicious Chain</th>
                                            <th>Activity</th>
                                            <th>Whitelist</th>
                                            <th>Action list</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Admin</th>
                                            <th>Switch to</th>
                                            <th>Switch to</th>
                                            <th>View Malicious Chain</th>
                                            <th>Activity</th>
                                            <th>Whitelist</th>
                                            <th>Action list</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $pdo = dbconnect();
                                            // $cookieId = $_COOKIE['id'];
                                            // echo $cookieId;
                                            try {
                                                $sql =  "SELECT * FROM user" ;
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                            } catch (PDOException $e) {
                                                die($e->getMessage());
                                            }
                                            $numFound = $stmt->rowCount();
                                            if ( $numFound > 0){
                                                while ($result = $stmt->fetch()){
                                                    echo '
                                                    <tr>
                                                        <td>'.$result["id"].'</td>
                                                        <td>'.$result["username"].'</td>
                                                        <td>'.$result["email"].'</td>
                                                        <td>'.$result["status"].'</td>
                                                        <td>'.$result["admin"].'</td>';
                                                        if ($result["status"] == "Enable"){
                                                            echo "<td><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/db/dbstatus.php?id=".$result['id']."&status=Disable'\">Switch to Disable</button></td>";
                                                        }else{
                                                            echo "<td><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/db/dbstatus.php?id=".$result['id']."&status=Enable'\">Switch to Enable</button></td>";
                                                        }
                                                        if ($result["admin"] == "Y"){
                                                            echo "<td><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/db/dbadmin.php?id=".$result['id']."&admin=N'\">Switch to User</button></td>";
                                                        }else{
                                                            echo "<td><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/db/dbadmin.php?id=".$result['id']."&admin=Y'\">Switch to Admin</button></td>";
                                                        }
                                                    echo "
                                                        <td><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/malicious_chain.php?user_id=".$result['id']."'\">View Malicious Chain</button></td>
                                                        <td><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/log.php?user_id=".$result['id']."'\">View User Log</button></td>
                                                        <td><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/whitelist.php?user_id=".$result['id']."'\">View User Whitelist</button></td>
                                                        <td><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/action_histroy.php?user_id=".$result['id']."'\">View User Action List</button></td>
                                                    </tr>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php 
        require_once 'logout.php';
    ?>

</body>

</html>