if (sessionStorage.times % 2 === 0){
    sessionStorage.setItem('check','true');
    console.log("Checked");
}else{
    sessionStorage.times = 1;
    window.stop()   
    fetch(window.location.href)
        .then(response => response.text())
        .then(data => {
            // Process the response data
            console.log(data);
            if (data.includes("eval")) {
                console.log("The is malware.");
            } else {
                window.location.reload();
                sessionStorage.times = Number(sessionStorage.times) +1;
            }
        })
        .catch(error => {
            // Handle any errors
            console.error(error);
        });
}