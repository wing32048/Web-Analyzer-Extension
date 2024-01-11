
// Create a new popup window
// var popup = window.open("", "_blank", "width=400,height=200");

// Display scanning message in the popup window
// popup.document.write("<h2>Scanning for malware...</h2>");

fetch(window.location.href)
  .then(response => response.text())
  .then(data => {
    // Process the response data
    console.log(data);
    function findBase64VariablesAndConstants() {
      const scriptTags = document.getElementsByTagName('script');
      const matches = [];
    
      for (let i = 0; i < scriptTags.length; i++) {
        const script = scriptTags[i].textContent;
    
        if (script) {
          const pattern = /(?:var|const)\s+(\w+)\s*=\s*["'`]?([A-Za-z0-9+/=]+)["'`]?/g;
          let match;
    
          while ((match = pattern.exec(script)) !== null) {
            const varName = match[1];
            const encodedString = match[2];
    
            if (isBase64(encodedString)) {
              matches.push(varName);
            }
          }
        }
      }
    
      return matches;
    }
    
    function isBase64(encodedString) {
      const decodedString = atob(encodedString);
      const base64Charset = /^[A-Za-z0-9+/=]+$/;
    
      return base64Charset.test(encodedString) && isAscii(decodedString);
    }
    
    function isAscii(str) {
      return /^[\x00-\x7F]*$/.test(str);
    }
    
    const base64VariablesAndConstants = findBase64VariablesAndConstants();
    console.log(base64VariablesAndConstants);
    // var malwareTypes = [];
    // var anyTypeObjectsIncluded = false;
    // for (var key in jsonCheck) {
    //   var values = jsonCheck[key];
    //   var objectsIncluded = values.every(obj => data.includes(obj));
    //   if (objectsIncluded) {
    //     anyTypeObjectsIncluded = true;
    //     malwareTypes.push(key);
    //   }
    // }
    // if (anyTypeObjectsIncluded) {
    //   console.log("At least one type has all its objects included in the data.");
    //   console.log("Malware types found:", malwareTypes.join(", "));

      // Display the malware types in the popup window
    //   popup.document.write("<p>Malware types found: " + malwareTypes.join(", ") + "</p>");
    // } else {
    //   console.log("No type has all its objects included in the data.");

      // Display "No malware types found" in the popup window
    //   popup.document.write("<p>No malware types found.</p>");
    // }

    // // Close the popup window after scanning is finished
    // popup.close();
  });