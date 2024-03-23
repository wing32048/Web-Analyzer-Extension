<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Management</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        .button-cell {
            width: 150px; /* Adjust the width as needed */
        }
    </style>
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
                    <h1 class="h3 mb-4 text-gray-800">User Information</h1>

                    <div class="row">

                    <input class="form-control" id="myInput" type="text" placeholder="Search username">
                    <br>

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
                        if ($numFound < 0){
                            echo "No result";
                        }
                        else if ( $numFound > 0){
                            echo'
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">User ID</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Admin</th>
                                    <th class="text-center">Switch to</th>
                                    <th class="text-center">Switch to</th>
                                    <th class="text-centre">View Malicious Chain</th>
                                    <th class="text-center">Activity</th>
                                    <th class="text-center">Whitelist</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">';
                                while ($result = $stmt->fetch()){
                                    echo '
                                    <tr>
                                        <td class="text-center id">'.$result["id"].'</td>
                                        <td class="text-center username">'.$result["username"].'</td>
                                        <td class="text-center email">'.$result["email"].'</td>
                                        <td class="text-center status">'.$result["status"].'</td>
                                        <td class="text-center admin">'.$result["admin"].'</td>';
                                        if ($result["status"] == "Enable"){
                                            echo "<td class='text-center'><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/db/dbstatus.php?id=".$result['id']."&status=Disable'\">Switch to Disable</button></td>";
                                        }else{
                                            echo "<td class='text-center'><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/db/dbstatus.php?id=".$result['id']."&status=Enable'\">Switch to Enable</button></td>";
                                        }
                                        if ($result["admin"] == "Y"){
                                            echo "<td class='text-center'><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/db/dbadmin.php?id=".$result['id']."&admin=N'\">Switch to User</button></td>";
                                        }else{
                                            echo "<td class='text-center'><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/db/dbadmin.php?id=".$result['id']."&admin=Y'\">Switch to Admin</button></td>";
                                        }
                                    echo "
                                        <td class='text-center'><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/malicious_chain.php?user_id=".$result['id']."'\">View Malicious Chain</button></td>
                                        <td class='text-center'><button type='button' class='btn btn-primary btn-sm' onclick=\"window.location.href='/log.php?user_id=".$result['id']."'\">View User Log</button></td>
                                        <td class='text-center'><button type='button' class='btn btn-primary btn-smb' onclick=\"window.location.href='/whitelist.php?user_id=".$result['id']."'\">View User Whitelist</button></td>
                                    </tr>";

                                }
                            echo'
                                </tbody>
                            </table>';

                        }
                    ?>
                            
                                
                        
                        
                        <p></p>
                        
                        
                        <script>
                        $(document).ready(function(){
                        $("#myInput").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $("#myTable tr").filter(function() {
                            $(this).toggle($(this).find(".username").toLowerCase().indexOf(value) > -1)
                            });
                        });
                        });
                        </script>
                    
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