<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Malicious Checker</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      body {
        color: #404E67;
        background: #ffffff;
	    }

      .table-wrapper {
        width: auto;
        margin: 30px auto;
          background: #fff;
          padding: 20px;	
          box-shadow: 0 1px 1px rgba(0,0,0,.05);
      }

      .table-title {
          padding-bottom: 10px;
          margin: 0 0 10px;
      }

      .table-title .add-new {
        float: right;
        height: 30px;
        font-weight: bold;
        font-size: 14px;
        text-shadow: none;
        min-width: 100px;
        border-radius: 50px;
        line-height: 13px;
      }

    </style>
    <script src="Whitelist.js"></script>

    
    <!-- Custom styles for this template -->
    <link href="sidebars.css" rel="stylesheet">
    <?php 
      require_once './inc/db.php';
    ?>
  </head>
  <body>

<main>
   <?php 
    require_once 'sidebars.php';
    ?>

  <div class="b-example-divider"></div>
  <div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8"><h2>Blacklist</b></h2></div>
                <!-- <div class="col-sm-4">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                </div> -->
            </div>
        </div>
        <?php
        $pdo = dbconnect();
        try {
          $sql =  'SELECT * FROM blacklist' ;
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
        } catch (PDOException $e) {
          die($e->getMessage());
        }
        $numFound = $stmt->rowCount();
        // echo $numFound;
        if ( $numFound <= 0){
          echo "You can start to edit the Blacklist now.";
        }
        else if ( $numFound > 0){
            echo "<table class='table table-bordered'>\n";
            echo "<thead>\n";
            echo "<tr>\n";
            echo "<th>Date</th>\n";
            echo "<th>URL</th>\n";
            echo "<th>Edit</th>\n";
            echo "</thead>\n";
            // echo "</table>\n";
            while( $result = $stmt->fetch() ) {
              echo "<tbody>\n";
              echo "<tr>\n";
              echo "<td>".$result["date"]."</td>\n";	
              echo "<td>".$result["url"]."</td>\n";
              echo "<td>\n";
              echo "<a class='add' title='Add' data-toggle='tooltip'><i class='material-icons'>&#xE03B;</i></a>\n";
              echo "<a class='edit' title='Edit' data-toggle='tooltip'><i class='material-icons'>&#xE254;</i></a>\n";
              echo "<a class='delete' title='Delete' data-toggle='tooltip'><i class='material-icons'>&#xE872;</i></a>\n";
              echo "</td>\n";
              echo "</tr>\n";      
              echo "</tbody>\n";
            }	
            echo "</table>\n";
                    
        }
        ?>
    </div>
</div>     
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="sidebars.js"></script>
  </body>
</html>
