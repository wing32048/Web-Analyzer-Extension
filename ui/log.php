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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Logs</title>

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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">User Log</h1>
                    <p class="mb-4">Here can check the user logs.</p>

                    <!-- Content Row -->
                    <input class="form-control" id="myInput" type="text" placeholder="Search information">
                    <br>
                    <select class="form-select mb-3" id="mySelect" aria-label=".form-select-lg example">
                        <option value="all" selected>All</option>
                        <option value="login">Login</option>
                        <option value="logout">Logout</option>
                        <option value="add">Add</option>
                        <option value="update">Update</option>
                        <option value="delete">Delete</option>
                    </select>
                    <br>
                    <?php
                        $id = $_GET['user_id'];
                        // echo $id;
                        try {
                            $sql =  "SELECT * FROM log where user_id = :id order by id DESC" ;
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
                            echo'
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Information</th>
                                    <th class="text-center">Datetime</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">';
                                while ($result = $stmt->fetch()){
                                    echo "
                                    <tr>
                                        <td class='text-center id'>".$result['id']."</td>
                                        <td class='text-center type'>".$result['type']."</td>
                                        <td class='text-center information'>".$result['information']."</td>
                                        <td class='text-center datetime'>".$result['datetime']."</td>
                                        <td class='text-center'><button type='button' class='btn btn-primary' onclick=\"window.location.href='/db/dbdellog.php?id=".$result['id']."&user_id=$id'\">Delete</button></td>
                                    </tr>";

                                }
                            echo'
                                </tbody>
                            </table>';

                        }
                    ?>
                        <p></p>
                        
                        
                        <script>
                            $(document).ready(function() {
                                $("#myInput").on("keyup", function() {
                                    var value = $(this).val().toLowerCase();
                                    $("#myTable tr").filter(function() {
                                        $(this).toggle($(this).find(".information").text().toLowerCase().indexOf(value) > -1);
                                    });
                                });
                            });
                            $(document).ready(function() {
                                $("#mySelect").on("change", function() {
                                    var value = $(this).val().toLowerCase();
                                    $("#myTable tr").filter(function() {
                                        var type = $(this).find(".type").text().toLowerCase()
                                        var showAll = value === "all";
                                        var typeMatch = type.indexOf(value) > -1;

                                        $(this).toggle(showAll || typeMatch);
                                    });
                                });
                            });
                            // $(document).ready(function() {
                            //     $("#myInput").on("keyup", function() {
                            //         var value = $(this).val().toLowerCase();
                            //         var filterType = $("#filterType").val().toLowerCase();

                            //         $("#myTable tr").filter(function() {
                            //             var username = $(this).find(".username").text().toLowerCase();
                            //             var activity = $(this).find(".activity").text().toLowerCase();

                            //             var usernameMatch = username.indexOf(value) > -1;
                            //             var activityMatch = activity.indexOf(value) > -1;
                            //             var typeMatch = filterType === "all" || activity.indexOf(filterType) > -1;

                            //             $(this).toggle(usernameMatch && (activityMatch || typeMatch));
                            //         });
                            //     });
                            // });
                        </script>
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