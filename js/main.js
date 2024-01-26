if (sessionStorage.times % 2 === 0){
    console.log("Checked");
}else{
    sessionStorage.times = 1;
    window.stop();
    chrome.runtime.sendMessage('', {
        type: 'notification',
        options: {
            title: 'Just wanted to notify you',
            message: 'Scanning !!!',
            iconUrl: '/image/ZKZx.gif',
            type: 'basic'
        }
    });
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
                // console.log(sessionStorage.times);
                window.location.reload();
            }
        }
    })
    .catch(error => {
        // Handle any errors
        console.error(error);
    });

    fetch("http://127.0.0.1/php/blacklist.php")
    .then(response => response.json())
    .then(blacklist => {
        console.log(blacklist);
        var domainBeforeSlash =  window.location.href;
        var domain = domainBeforeSlash.split("/")[2];
        for (var urls in blacklist){
            var url = whitelist[urls];
            if (domain === url){
                console.log('true');
                sessionStorage.times = 1;
                history.back();
            }
        }
    })
    .catch(error => {
        // Handle any errors
        console.error(error);
    });    
    

    fetch("http://127.0.0.1/php/connect.php")
    .then(response => response.json())
    .then(malwarejs => {
        // Process and use the retrieved data
        console.log(malwarejs);
        fetch(window.location.href)
            .then(response => response.text())
            .then(data => {
                // Process the response data
                console.log(data);
                

                const base64VariablesAndConstants = findBase64VariablesAndConstants(data);
                if (base64VariablesAndConstants.length > 0){
                    for (var i in base64VariablesAndConstants) {
                        console.log("Base64 Variable and Constant Name:", base64VariablesAndConstants[i]);
                        anyTypeObjectsIncluded = true;
                        }
                };
                var malwareTypes = [];
                var anyTypeObjectsIncluded = false;
                for (var key in malwarejs) {
                    var values = malwarejs[key];
                    console.log(values);
                    var objectsIncluded = values.every(obj => data.includes(obj));
                    console.log(objectsIncluded);
                    if (objectsIncluded) {
                        anyTypeObjectsIncluded = true;
                        malwareTypes.push(key);
                    }
                }
                if (anyTypeObjectsIncluded) {
                    console.log("At least one type has all its objects included in the data.");
                    console.log("Malware types found:", malwareTypes.join(", "));
                    if (window.confirm("Malware types were found. Do you want to continue?")) {
                        sessionStorage.times = Number(sessionStorage.times) +1;                            
                        window.location.reload();
                    } else {
                        history.back()
                    }
                } else {
                    console.log("No type has all its objects included in the data.");
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

function findBase64VariablesAndConstants(scriptData) {
    const pattern = /(?:var|const)\s+(\w+)\s*=\s*["'`]?([A-Za-z0-9+/=]+)["'`]?/g;
    const matches = [];
    let match;
    while ((match = pattern.exec(scriptData)) !== null) {
        const varName = match[1];
        const encodedString = match[2];
    
        if (isBase64(encodedString)) {
            matches.push(varName);
        }
    }
    return matches;
}
  
function isBase64(encodedString) {
    // const decodedString = atob(encodedString);
    const base64Charset = /^[A-Za-z0-9+/=]+$/;
    return base64Charset.test(encodedString);
    // return base64Charset.test(encodedString) && isAscii(decodedString);
}
  
// function isAscii(str) {
//     return /^[\x00-\x7F]*$/.test(str);
// }
