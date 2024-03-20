document.addEventListener("DOMContentLoaded", function() {
    var registerButton = document.getElementById("Setting");
    registerButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'https://192.168.140.100/signin.php'});
    //   chrome.tabs.create({ url: "https://www.google.com" });
    });
  });