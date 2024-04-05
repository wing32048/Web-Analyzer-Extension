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
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var fromDatePicker = flatpickr("#from-datepicker", {
                dateFormat: "Y-m-d",
                allowInput: false,
                onClose: function(selectedDates) {
                if (selectedDates[0]) {
                    toDatePicker.set("minDate", selectedDates[0]);
                    filterTableRows();
                }
                }
            });

            var toDatePicker = flatpickr("#to-datepicker", {
                dateFormat: "Y-m-d",
                allowInput: false,
                onClose: function(selectedDates) {
                if (selectedDates[0]) {
                    fromDatePicker.set("maxDate", selectedDates[0]);
                    filterTableRows();
                }
                }
            });

            document.querySelectorAll('#from-datepicker-btn, #to-datepicker-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                btn.previousElementSibling._flatpickr.open();
                });
            });
        });
    </script>
    
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
                    <p class="mb-4">Please select a date to view the action history.</p>

                    <!-- Content Row -->
                    <form class="row" method="get" action="/history.php">
                        <div class="col-5">
                            <div class="input-group">
                                <label for="datepicker" class="col-1 col-form-label">From</label>
                                <input type="text" id="from-datepicker" class="form-control" name="from-date" readonly>
                                <button type="button" id="from-datepicker-btn" class="btn btn-outline-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill" viewBox="0 0 16 16">
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </button>
                                <label for="datepicker" class="col-1 col-form-label">To </label>
                                    <input type="text" id="to-datepicker" class="form-control" name="to-date"readonly>
                                    <button type="button" id="to-datepicker-btn" class="btn btn-outline-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill" viewBox="0 0 16 16">
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Code</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Code</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $pdo = dbconnect();
                                            if (array_key_exists('from-date',$_GET) && array_key_exists('to-date',$_GET)){
                                                $fromDate = $_GET['from-date'];
                                                $toDate = $_GET['to-date'];
                                                try {
                                                    // SELECT * FROM `action_history` WHERE `date` >= '2024-03-24' AND `date` <= '2024-03-25';
                                                    $sql = "SELECT * FROM action_history ";
                                                    $sql .= "WHERE date >= '$fromDate' AND date <= '$toDate' AND user_id = $cookieId";
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
                                                            <td">'.$result["id"].'</td>
                                                            <td">'.$result["url"].'</td>
                                                            <td>'.$result["date"].'</td>
                                                            <td><button type="button" class="btn btn-primary btn-sm" onclick="window.location.href=\'/db/dbdelhistory.php?user_id='.$result["id"].'\'">View User Whitelist</button></td>
                                                        </tr>';
                                                    }                                             
                                                }
                                            }else{
                                                try {
                                                    $sql =  "SELECT * FROM action_history WHERE user_id = $cookieId order by id DESC" ;
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
                                                            <td">'.$result["id"].'</td>
                                                            <td">'.$result["url"].'</td>
                                                            <td>'.$result["date"].'</td>
                                                            <td><button type="button" class="btn btn-primary btn-sm" onclick="window.location.href=\'/db/dbdelhistory.php?user_id='.$result["id"].'\'">View User Whitelist</button></td>
                                                        </tr>';
                                                    }  
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