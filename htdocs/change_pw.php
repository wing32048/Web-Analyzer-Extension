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
    <div id="wrapper">
        <?php 
            require_once 'sidebar.php';
        ?>

        <!-- Your existing sidebar code here -->
        
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php 
                    require_once 'topbar.php';
                ?>
                <!-- Your existing topbar code here -->

                <div class="container-fluid">
                    <h1 class="text-center">Change Password</h1>
                    <p class="text-center">The password should be a minimum of eight characters long and consist of a combination of uppercase and lowercase letters, numbers, and special characters.</p>
                    <div class="container">
                        <form id="resetPasswordForm" method="post" action="./db/dbchange_pw.php">
                            <?php
                                if (isset($_GET['error']) && $_GET['error'] == 1) {
                                    echo "
                                    <script>
                                    alert('Current_password is wrong')
                                    </script>
                                    ";
                                }elseif(isset($_GET['error']) && $_GET['error'] == 2){
                                    echo "
                                    <script>
                                    alert('Password not enough strong/Password not match')
                                    </script>
                                    ";
                                }
                            ?>
                            <div class="mb-3">
                                <label for="old-password" class="form-label">Currrent Password</label>
                                <input type="password" class="form-control" name="current_password" placeholder="Enter your current password">
                            </div>
                            <div class="mb-3">
                                <label for="new-password" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter a new password">
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm your new password">
                            </div>
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Your existing script includes here -->

    <!-- <script>
        document.getElementById('resetPasswordForm').addEventListener('submit', function (event) {
            var newPassword = document.getElementById('new-password').value;
            var confirmPassword = document.getElementById('confirm-password').value;

            if (newPassword !== confirmPassword) {
                alert("Passwords do not match!");
                event.preventDefault();
                return;
            }

            if (newPassword.length < 8) {
                alert("Password must be at least 8 characters long!");
                event.preventDefault();
                return; 
            }

            if (!hasUpperCase(newPassword) || !hasLowerCase(newPassword) || !hasSpecialCharacter(newPassword)) {
                alert("Password must contain at least one uppercase letter, one lowercase letter, and one special character!");
                event.preventDefault();
            }
        });

        function hasUpperCase(str) {
            return /[A-Z]/.test(str);
        }

        function hasLowerCase(str) {
            return /[a-z]/.test(str);
        }

        function hasSpecialCharacter(str) {
            return /[!@#$%^&*(),.?":{}|<>_]/.test(str);
        }
    </script> -->

    <?php 
        require_once 'logout.php';
    ?>

</body>

</html>