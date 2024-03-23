<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Malicious Chain</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
                    <h1 class="h3 mb-4 text-gray-800">Malicious Chain</h1>

                    <div class="container-fluid">

                        <input class="form-control" id="myInput" type="text" placeholder="Search type">
                        <br>
                        <select class="form-select mb-3" aria-label=".form-select-lg example">
                            <option selected>XSS</option>
                            <option value="1">URL Redirect</option>
                            <option value="2">Drive By Download</option>
                        </select>
                        <?php
                            $pdo = dbconnect();
                            //$cookieId = $_COOKIE['id'];
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
                                <br>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Code</th>
                                        <th class="text-center">Date </th>
                                    </thead>
                                    
                                </table>';

                            }
                        ?>
                            
                                
                        
                        
                        <p></p>
                        
                        
                        <script>
                        $(document).ready(function(){
                        $("#myInput").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $("#myTable tr").filter(function() {
                            $(this).toggle($(this).find(".type").toLowerCase().indexOf(value) > -1)
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