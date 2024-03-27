
document.addEventListener("DOMContentLoaded", function() {
    var registerButton = document.getElementById("account");
    registerButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/account.php'});
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var registerButton = document.getElementById("history");
    registerButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/history.php'});
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var registerButton = document.getElementById("logout");
    registerButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/db/dblogout.php'});
    });
});