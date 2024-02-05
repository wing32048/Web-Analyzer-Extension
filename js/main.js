if (sessionStorage.times % 2 === 0){
    sessionStorage.times = 1;
    console.log("Checked");
    console.log(sessionStorage.times);
}else if(window.location.href == 'http://127.0.0.1/ui/signin.php'){
    chrome.storage.local.clear(function() {
        console.log('Local storage cleared.');
    });
}else if(window.location.href == 'http://127.0.0.1/ui/HomePage.php'){
    chrome.runtime.sendMessage({ action: 'getCookie' }, function(response) {
        if (response.cookie) {
            var cookieValue = response.cookie.value;
            chrome.storage.local.set({ 'phpCookieValue': cookieValue }, function() {
            console.log('PHP cookie saved to local storage.');});
        } else {
            console.log('PHP cookie not found.');
        }
    });
    // sessionStorage.times = Number(sessionStorage.times) +1;
    // window.location.reload();
}else{
    sessionStorage.times = 1;
    window.stop();
    chrome.storage.local.get('phpCookieValue', function(result) {
        var phpCookieValue = result.phpCookieValue;
        console.log('Retrieved PHP cookie value:', phpCookieValue);
        if (phpCookieValue == undefined){
            alert('Please log in first.');
            window.location.href = 'http://127.0.0.1/ui/signin.php';
        }
        fetch("http://127.0.0.1/php/connect.php?id="+phpCookieValue)
        .then(response => response.json())
        .then(malwarejs => {
            // Process and use the retrieved data
            console.log(malwarejs);;
                fetch(window.location.href)
                .then(response => response.text())
                .then(data => {
                    // Process the response data
                    console.log(data);
                    if (findbase64(data,malwarejs) == false && findbase32(data,malwarejs) == false && withoutencode(data,malwarejs) == false && findutf8(data,malwarejs) ==false){
                        sessionStorage.times = Number(sessionStorage.times) +1;
                        window.location.reload();
                    }else{
                        if (window.confirm("Malware types were found. Do you want to continue?")) {
                            sessionStorage.times = Number(sessionStorage.times) +1;
                            console.log('user select continue');                           
                            window.location.reload();
                        } else {
                            console.log('user select not continue');                           
                            history.back();
                        }
                    }
                })
                .catch(error => {
                    // Handle the error
                    console.error('Error2:', error.message);
                    // alert('Please log in first.');
                });
            })
        .catch(error => {
            // Handle the error
            console.error('Error:', error.message);
        });
    });
}
function withoutencode(data,malwarejs){
    let anyTypeObjectsIncluded = false;
    for (var id in malwarejs) {
    var type = malwarejs[id].type;
    var chains = malwarejs[id].chains;
    console.log(chains);
    var allChainsFound = chains.every(chain => data.includes(chain));

        if (!allChainsFound) {
            console.log("Not all malware chains of type", type, "found in data.");
        } else {
            console.log("All malware chains of type", type, "found in data.");
            return anyTypeObjectsIncluded = true;
        }
    }
    return anyTypeObjectsIncluded;
}

function findbase64(data,malwarejs){
    const base64Pattern = /(?:var|let|const)\s+(\w+)\s*=\s*['"]([A-Za-z0-9+/=]+)['"]/g;
    let anyTypeObjectsIncluded = false;
    let match;
    while ((match = base64Pattern.exec(data)) !== null) {
        const variableName = match[1];
        const encodedString = match[2];
        console.log(variableName,':',encodedString);
        const decodedString = atob(encodedString);
        console.log(decodedString);
    
        for (var id in malwarejs) {
        var type = malwarejs[id].type;
        var chains = malwarejs[id].chains;
        console.log(chains);
        var allChainsFound = chains.every(chain => decodedString.includes(chain));
    
            if (!allChainsFound) {
                console.log("Not all malware chains of type", type, "found in data.");
            } else {
                console.log("All malware chains of type", type, "found in data.");
                return anyTypeObjectsIncluded = true;
            }
        }
    }
    return anyTypeObjectsIncluded;
}

function findbase32(data,malwarejs){
    const base32Pattern = /(?:var|let|const)\s+(\w+)\s*=\s*['"]([A-Z2-7]+=*)['"]/g;
    let anyTypeObjectsIncluded = false;
    let match;
    while ((match = base32Pattern.exec(data)) !== null) {
        const variableName = match[1];
        const encodedString = match[2];
        console.log(variableName,':',encodedString);
        const decodedString = base32Decode(encodedString);
        console.log(decodedString);
    
        for (var id in malwarejs) {
        var type = malwarejs[id].type;
        var chains = malwarejs[id].chains;
        console.log(chains);
        var allChainsFound = chains.every(chain => decodedString.includes(chain));
    
            if (!allChainsFound) {
                console.log("Not all malware chains of type", type, "found in data.");
            } else {
                console.log("All malware chains of type", type, "found in data.");
                return anyTypeObjectsIncluded = true;
            }
        }
    }
    return anyTypeObjectsIncluded;
}

function base32Decode(encodedString) {
    const base32Chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ234567=";
    const paddingChar = "=";
  
    let bits = 0;
    let bitsCount = 0;
    let decodedBytes = [];
  
    for (let i = 0; i < encodedString.length; i++) {
    const char = encodedString.charAt(i);
    if (char === paddingChar) {
        break; // Reached the padding character, stop decoding
    }

    const charValue = base32Chars.indexOf(char);
    if (charValue === -1) {
        throw new Error("Invalid Base32 encoded string");
    }

    bits = (bits << 5) | charValue;
    bitsCount += 5;

    if (bitsCount >= 8) {
        decodedBytes.push((bits >>> (bitsCount - 8)) & 0xFF);
        bitsCount -= 8;
    }
    }
  
    return new Uint8Array(decodedBytes);
}
ut
function findutf8(data,malwarejs){
    const utf8Pattern = /(?:var|let|const)\s+(\w+)\s*=\s*['"]((?:[\x00-\x7F]|[\xC2-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF4][\x80-\xBF]{3})+)['"]/g;
    let anyTypeObjectsIncluded = false;
    let match;
    while ((match = utf8Pattern.exec(data)) !== null) {
        const variableName = match[1];
        const encodedString = match[2];
        console.log(variableName,':',encodedString);
        const decodedString = utf8Decode(encodedString);
        console.log(decodedString);
    
        for (var id in malwarejs) {
        var type = malwarejs[id].type;
        var chains = malwarejs[id].chains;
        console.log(chains);
        var allChainsFound = chains.every(chain => decodedString.includes(chain));
    
            if (!allChainsFound) {
                console.log("Not all malware chains of type", type, "found in data.");
            } else {
                console.log("All malware chains of type", type, "found in data.");
                return anyTypeObjectsIncluded = true;
            }
        }
    }
    return anyTypeObjectsIncluded;
}

function utf8Decode(encodedString) {
    const bytes = new Uint8Array(encodedString.length);
    for (let i = 0; i < encodedString.length; i++) {
        bytes[i] = encodedString.charCodeAt(i);
    }
  
    const textDecoder = new TextDecoder('utf-8');
    return textDecoder.decode(bytes);
}