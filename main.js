if (sessionStorage.times % 2 === 0){
    sessionStorage.setItem('check','true');
    console.log("Checked");
}else{
    sessionStorage.times = 1;
    window.stop()   
    fetch("http://127.0.0.1/connect.php")
        .then(response => response.json())
        .then(malwarecode => {
            // Process and use the retrieved data
            fetch(window.location.href)
                .then(response => response.text())
                .then(data => {
                    // Process the response data
                    console.log(data);
                    var $malweb = false;
                    for (var i = 0; i < malwarecode.length; i++) {
                        console.log(malwarecode[i]);
                        if (data.includes(malwarecode[i])) {
                            $malweb = true;
                            console.log("This is malware website.");
                            // console.log(i)
                        }else {
                            console.log("This is not malware website.");
                        }
                    }
                    if ($malweb === false){
                        window.location.reload();
                        sessionStorage.times = Number(sessionStorage.times) +1;
                    }
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