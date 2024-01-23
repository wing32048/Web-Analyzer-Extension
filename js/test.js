if (sessionStorage.times % 2 === 0){
    console.log("Checked");
}else{
    sessionStorage.times = 1;
    window.stop();
    // var check = false;
    fetch("http://127.0.0.1/php/whitelist.php")
        .then(response => response.json())
        .then(whitelist => {
            console.log(whitelist);
            var domainBeforeSlash =  window.location.href;
            var domain = domainBeforeSlash.split("/")[2];
            for (var urls in whitelist){
                var url = whitelist[urls];
                if (domain === url){
                    console.log('true');
                    sessionStorage.times = Number(sessionStorage.times) +1;
                    window.location.reload();
                }
            }
        })
        .catch(error => {
            // Handle any errors
            console.error(error);
        });
    }
