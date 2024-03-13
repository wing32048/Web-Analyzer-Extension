document.addEventListener("DOMContentLoaded", function() {
    var registerButton = document.getElementById("Setting");
    registerButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'http://192.168.140.100/ui/signin.php'});
    //   chrome.tabs.create({ url: "https://www.google.com" });
    });
  });