<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>History</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css"/>

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
                    <h1 class="h3 mb-1 text-gray-800 ">History</h1>
                    <p class="mb-4">Please select a date to view the browsing history.</p>

                    <!-- Content Row -->
                    <div class="row">
                        <section class="container-fluid">
                          <form class="row">
                            <label for="datepicker" class="col-1 col-form-label">Date : </label>
                            <div class="col-5">
                              <div class="input-group">
                                <input type="text" id="datepicker" class="form-control" readonly>
                                <button type="button" id="datepicker-btn" class="btn btn-outline-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill" viewBox="0 0 16 16">
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </button>
                              </div>
                            </div>
                          </form>
                          <br>
                          <button type="button" class="btn btn-primary">Submit</button>
                        </section>
                      
                        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                      
                        <script>
                            $(document).ready(function () {
                                flatpickr("#datepicker", {
                                    dateFormat: "Y-m-d",
                                    allowInput: false
                                });
                        
                                $('#datepicker-btn').on('click', function () {
                                    $('#datepicker').focus();
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