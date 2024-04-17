<?php
if (!array_key_exists('user_id', $_GET)) {
    header('Location: user.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Whitelist</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Whitelist</h1>
                    <p class="mb-4">Here can remove the whitelist what the user add.</p>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Whitelist</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">         
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>URL</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>URL</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                <tbody>
                                    <?php
                                        $id = $_GET['user_id'];
                                        // echo $id;
                                        try {
                                            $sql =  "SELECT * FROM whitelist where user_id = :id" ;
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->bindParam(":id", $id);
                                            $stmt->execute();
                                        } catch (PDOException $e) {
                                            die($e->getMessage());
                                        }
                                        $numFound = $stmt->rowCount();
                                        if ($numFound < 0){
                                            echo "No result";
                                        }
                                        else if ( $numFound > 0){
                                                while ($result = $stmt->fetch()){
                                                    echo "
                                                    <tr>
                                                        <td class='text-center'>".$result['id']."</td>
                                                        <td class='text-center'>".$result['url']."</td>
                                                        <td class='text-center'>".$result['date']."</td>
                                                        <td class='text-center'><button type='button' class='btn btn-primary' onclick=\"window.location.href='/db/dbdelwhitelist.php?id=".$result['id']."&user_id=$id'\">Delete</button></td>
                                                    </tr>";

                                                }

                                        }
                                    ?>
                                </tbody>
                            </table>
                        
                        
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