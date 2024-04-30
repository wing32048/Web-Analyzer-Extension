<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>home</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                <div class="container-xl px-4 mt-4">
                    
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">About the Web Analyzer</h1>
                    <p>Web Analyzer provides browsing safety protection by automatically scanning the websites you visit.</p>
                    <br>
                    <p>In addition, Web Analyzer offers additional security features, including the ability for users to access their browsing history. 
                        This feature allows users to view their browsing activity, including timestamps of when they were logged in and details about the browser they used.</p>
                    <p>Web Analyzer empowers users to take control of managing malicious links. Users have the ability to manually add any suspicious links that may not be recorded 
                        in our database server. This feature allows users to actively contribute to enhancing the system's effectiveness in detecting and protecting against potential threats.</p>
                        <br>
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <!-- <a href="signin.php" class="btn btn-primary btn-lg px-4 gap-3">Let's start</a> -->
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