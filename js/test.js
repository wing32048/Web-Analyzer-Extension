// var data = {
//     "1": {
//         "base64": ["eval, atob"]
//     },
//     "2": {
//         "URL redirect": ["window.open"]
//     },
//     "3": {
//         "DBD": ["createObjectURL, download"]
//     },
//     "4": {
//         "XSS": ["oncopy"]
//     },
//     "5": {
//         "URL redirect": ["window.location.href"]
//     }
// };

// for (var key in data) {
//     var type = Object.keys(data[key])[0];
//     var value = JSON.stringify(data[key][type]);
//     console.log("Type:", type);
//     console.log("Value:", value);
// }
// Assuming you have the PHP cookie name stored in a variable called 'cookieName'
chrome.runtime.sendMessage({ action: 'getCookie' }, function(response) {
    if (response.cookie) {
      var cookieValue = response.cookie.value;
      chrome.storage.local.set({ 'phpCookieValue': cookieValue }, function() {
        console.log('PHP cookie saved to local storage.');});
      // Use the cookie value as needed
    } else {
      console.log('PHP cookie not found.');
    }
  });
  chrome.storage.local.get('phpCookieValue', function(result) {
    var phpCookieValue = result.phpCookieValue;
    console.log('Retrieved PHP cookie value:', phpCookieValue);
    // Use the PHP cookie value as needed
    fetch("http://127.0.0.1/php/connect.php?id="+phpCookieValue)
    .then(response => response.json())
    .then(malwarejs => {
      console.log(malwarejs);
  })
      .catch(error => {
          // Handle the error
          console.error('Error2:', error.message);
          // alert('Please log in first.');
      });
  });