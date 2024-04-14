
document.addEventListener("DOMContentLoaded", function() {
    var accountButton = document.getElementById("account");
    accountButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/account.php'});
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var historyButton = document.getElementById("action_histroy");
    historyButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/self_action_history.php'});
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var historyButton = document.getElementById("whistlist_histroy");
    historyButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/self_whitelist_history.php'});
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var logoutButton = document.getElementById("logout");
    logoutButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/db/dblogout.php'});
    });
});