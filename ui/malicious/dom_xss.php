<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./dom_xss.php" method="GET">
        <input Type="text" name="myInput" style="width: 500px">
        <button type="submit" class="button">Submit</button>
    </form>
    <div id="searchMessage"></div>
    <script>
        function doSearchQuery(query) {
            document.getElementById('searchMessage').innerHTML = query;
        }
        var query = (new URLSearchParams(window.location.search)).get('myInput');
        if(query) {
            doSearchQuery(query);
        }
    </script>
</body>
</html> 