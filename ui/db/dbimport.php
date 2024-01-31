<?php
// Check if a file was uploaded successfully
if (isset($_FILES['jsonFile']) && $_FILES['jsonFile']['error'] === UPLOAD_ERR_OK) {
    // Get the temporary filename of the uploaded file
    // $tmpFilePath = $_FILES['jsonFile']['tmp_name'];

    // // Read the contents of the uploaded file
    // $jsonData = file_get_contents($tmpFilePath);

    // // Decode the JSON data into a PHP object or array
    // $data = json_decode($jsonData);
    echo "Hi";
    // // Access and process the data as needed
    // foreach ($data as $item) {
    //     // Process each item
    // }
} else {
    // Handle upload error
    echo "Error uploading the file.";
}
?>