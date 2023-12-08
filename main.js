
    window.stop();
    fetch(window.location.href)
        .then(response => response.text())
        .then(data => {
            // Process the response data
            console.log(data);
        })
        .catch(error => {
            // Handle any errors
            console.error(error);
        });
