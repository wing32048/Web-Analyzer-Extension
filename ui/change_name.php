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
                    <h1>Change Username</h1>
                    <div class="container">
                        <form id="changeUsernameForm" method="post" action="./db/dbchange_username.php">
                        <div class="container">    
                            <div class="form-group">
                                <label for="new-username">New Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter a new username">
                            </div>

                            <!-- <div class="form-group">
                                <label for="confirm-username">Confirm New Username</label>
                                <input type="text" class="form-control" id="confirm-username" placeholder="Confirm your new username">
                            </div> -->
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                    
            </div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- <script>
    document.getElementById('changeUsernameForm').addEventListener('submit', function(event) {
      var newUsername = document.getElementById('new-username').value;
      var confirmUsername = document.getElementById('confirm-username').value;

      if (newUsername !== confirmUsername) {
        alert("New username and confirm username do not match.");
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