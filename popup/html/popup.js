document.addEventListener("DOMContentLoaded", function() {
    var registerButton = document.getElementById("Setting");
    registerButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'http://127.0.0.1/ui/signin.php'});
    //   chrome.tabs.create({ url: "https://www.google.com" });
    });
  });