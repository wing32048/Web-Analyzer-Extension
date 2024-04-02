
document.addEventListener("DOMContentLoaded", function() {
    var accountButton = document.getElementById("account");
    accountButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/account.php'});
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var historyButton = document.getElementById("history");
    historyButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/history.php'});
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var logoutButton = document.getElementById("logout");
    logoutButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/db/dblogout.php'});
    });
});