document.addEventListener("DOMContentLoaded", function() {
    var registerButton = document.getElementById("registerButton");
    registerButton.addEventListener("click", function() {
    chrome.tabs.create({ url:'http://127.0.0.1/register/register.html'});
    //   chrome.tabs.create({ url: "https://www.google.com" });
    });
  });

//   document.addEventListener("DOMContentLoaded", function() {
//     document.getElementById("register").addEventListener("click", function() {
//     });
//   });