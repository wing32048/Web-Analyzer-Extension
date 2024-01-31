<!doctype html>
<html lang="en">
<head>
    <?php
      require_once "./inc/session.inc.php";
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Malicious Checker</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

  

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
    </style>
    <script>
        function checkFile(event) {
            const file = event.target.files[0];

            // Check file extension
            const allowedExtensions = ['.json'];
            const fileName = file.name;
            const fileExtension = fileName.substring(fileName.lastIndexOf('.')).toLowerCase();
            const submitButton = document.querySelector('input[type="submit"]');
            
            if (!allowedExtensions.includes(fileExtension)) {
                submitButton.disabled = true;
                alert('Invalid file type. Please select a JSON file.');
                console.log('Invalid file type. Please select a JSON file.');
                return;
            }

            // Read and parse file content
            const reader = new FileReader();
            reader.readAsText(file, 'UTF-8');
            reader.onload = function (event) {
            try {
                const jsonData = JSON.parse(event.target.result);
                const isValidFormat = validateJSONFormat(jsonData);
                if (isValidFormat) {
                    submitButton.disabled = false;
                    console.log('Valid JSON file with the expected format');
                    // alert('Valid JSON file with the expected format');
                } else {
                    submitButton.disabled = true;
                    alert('Invalid JSON file format');
                    console.log('Invalid JSON file format');
                }
            } catch (error) {
                submitButton.disabled = true;
                alert('Invalid JSON file');
                console.log('Invalid JSON file');
                }
            };
        }
        
        function validateJSONFormat(data) {
            if (typeof data !== 'object' || data === null) {
                return false;
            }

            // Check if each key has an array value
            for (const key in data) {
                if (!Array.isArray(data[key])) {
                    return false;
                }
                const pattern = /(function|atob|window.open|createObjectURL|download|eval|var|let|const|if|else|for|while|switch|case|break|return|console\..+|\{|\})/i;
                if (!pattern.test(data[key])){
                    return false;
                }
            }
            return true;
        }
        
    </script>
    
    <!-- Custom styles for this template -->
    <link href="sidebars.css" rel="stylesheet">

</head>
<body>
    
    <main>
        <?php 
            require_once 'sidebars.php';
        ?>
        
        <div class="b-example-divider"></div>
        <div>
            <form method="post" action="./db/dbimport.php" enctype="multipart/form-data">
                <label for="formFileLg" class="h3 form-label fw-normal col py-5">User can import their file onece each. If import more than one file, it will have a wrong message.</label>
                    <p>File type: .json</p>
                <input class="form-control form-control-lg" name="jsonFile" id="formFileLg" type="file" accept=".json" onchange="checkFile(event)">
                    <br>
                <input class="btn btn-primary" type="submit" value="Upload" disabled>
            </form>
        </div>
    </main> 
</body>
</html>
