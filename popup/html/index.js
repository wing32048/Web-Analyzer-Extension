document.addEventListener("DOMContentLoaded", function() {
    var signinButton = document.getElementById("signin");
    signinButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/signin.php'});
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var registerButton = document.getElementById("register");
    registerButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/register.php'});
    });
});
