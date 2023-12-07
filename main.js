window.stop();
fetch(window.location.href)
  .then(response => response.text())
  .then(data => {
    // Process the response data
    console.log(data);
  })
  .catch(error => {
    // Handle any errors
    console.error(error);
  });

//   var x_key = '82ec5bce2fe7d0cb1eac0df3f37b4afc818bca2330d2b503315b5f2bed2ac203'
// if (sessionStorage.times % 2 === 0){
//     sessionStorage.setItem('check','true');
// }else{
//     sessionStorage.times = 1;
//     if(sessionStorage.getItem('check') === 'true' ) {
//         // sessionStorage.setItem('check','false');
//         console.log('Stopping execution');
//         chrome.storage.local.clear(function() {
//             console.log('Storage cleared');
//           });
//         console.log(sessionStorage.getItem('check'));
//     }else if (window.location.href !== 'http://127.0.0.1/fyp/php/scanning.php') {
//         var url = window.location.href;
//         chrome.storage.local.set({ myUrl: url }, function() {
//             console.log('URL saved successfully.');
//         });
//         window.onload = function() {
//             window.location.href = 'http://127.0.0.1/fyp/php/scanning.php';
//         };
//     }else if (window.location.href === 'http://127.0.0.1/fyp/php/scanning.php'){
//         chrome.storage.local.get('myUrl', function(result) {
//             var savedUrl = result.myUrl;
//             console.log(savedUrl);
//             const domainBeforeSlash = savedUrl.split('/')[2];
//             const options = {
//                 method: 'GET',
//                 url: 'https://www.virustotal.com/api/v3/search',
//                 params: { query: domainBeforeSlash },
//                 headers: {
//                     accept: 'application/json',
//                     'x-apikey': x_key
//                 }
//             };
//             axios
//                 .request(options)
//                 .then(function (response) {
//                     const data = response.data;
//                     const maliciousDomains = data.data.filter(domain => domain.attributes.last_analysis_stats.malicious);
//                     const numberOfMalicious = maliciousDomains.length;
//                     if (numberOfMalicious > 0) {
//                         alert(savedUrl+' is a malicious website scan from virustotal');
//                         window.open('https://www.google.com/','_self');
//                     } else {
//                         console.log(savedUrl+' is not a malicious website scan from virustotal');
//                         sessionStorage.clear();
//                         window.location.href = savedUrl;
//                     }
//                     })
//                 .catch(function (error) {
//                     console.error('An error occurred:', error);
//                 });
//         });
//     }else{
//         console.log('error');
//     };
//     sessionStorage.times = Number(sessionStorage.times) +1;
// }
