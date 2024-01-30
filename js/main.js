// Store the initial URL
var initialUrl = window.location.href;

// Add an event listener to the onpopstate event
window.onpopstate = function(event) {
  // Check if the URL has changed
  if (window.location.href !== initialUrl) {
    // URL has changed, perform desired actions
    console.log("URL changed!");
  }
};

if (sessionStorage.times % 2 === 0){
    sessionStorage.times = 1;
    console.log("Checked");
    console.log(sessionStorage.times);
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
                console.log('white list true');
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
                console.log('black list true');
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
                console.log(base64VariablesAndConstants.length);
                var anyBase64 = false;
                if (base64VariablesAndConstants.length > 0){
                    for (var i in base64VariablesAndConstants) {
                        console.log("Base64 Variable and Constant Name:", base64VariablesAndConstants[i]);
                        anyBase64 = true;
                    }
                    // console.log(anyBase64);
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
                if (anyTypeObjectsIncluded || anyBase64) {
                    console.log("At least one type has all its objects included in the data.");
                    console.log("Malware types found:", malwareTypes.join(", "));
                    if (window.confirm("Malware types were found. Do you want to continue?")) {
                        sessionStorage.times = Number(sessionStorage.times) +1;
                        console.log('user select continue');                           
                        window.location.reload();
                    } else {
                        console.log('user select not continue');                           
                        history.back();
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
    const base64Pattern = /(?:var|let|const)\s+(\w+)\s*=\s*['"]([A-Za-z0-9+/=]+)['"]/g;
    const matches = [];
    let match;
    while ((match = base64Pattern.exec(scriptData)) !== null) {
        const variableName = match[1];
        const encodedString = match[2];
        if (!encodedString.includes('message')) {
            matches.push(variableName);
            // console.log(`Variable: ${variableName}, Encoded String: ${encodedString}`);
        }else{
            console.log(`Variable: ${variableName}, Encoded String: ${encodedString}`);
        }
    }
    console.log(matches);
    return matches;
};
