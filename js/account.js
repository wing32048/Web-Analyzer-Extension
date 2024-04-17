if (sessionStorage.times % 2 === 0){
    sessionStorage.times = 1;
    console.log("Checked");
    console.log(sessionStorage.times);
    chrome.runtime.sendMessage({ action: 'getCookie' }, function(response) {
        if (response.cookie) {
            var cookieValue = response.cookie.value;
            chrome.storage.local.set({ 'phpCookieValue': cookieValue }, function() {
            console.log('PHP cookie saved to local storage.');});
        } else {
            console.log('PHP cookie not found.');
        }
    });
}else{
    window.stop();
    sessionStorage.times = 1;
    chrome.runtime.sendMessage({ action: 'getCookie' }, function(response) {
        if (response.cookie) {
            var cookieValue = response.cookie.value;
            chrome.storage.local.set({ 'phpCookieValue': cookieValue }, function() {
            console.log('PHP cookie saved to local storage.');});
        } else {
            console.log('PHP cookie not found.');
        }
    });
    sessionStorage.times = Number(sessionStorage.times) +1;
    window.location.reload();
}
// jwt token