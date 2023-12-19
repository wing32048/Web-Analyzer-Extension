var jsonCheck = {
  base64: ["eval", "atob"],
  DBD: ["createObjectURL", "click"]
};

// Create a new popup window
var popup = window.open("", "_blank", "width=400,height=200");

// Display scanning message in the popup window
popup.document.write("<h2>Scanning for malware...</h2>");

fetch(window.location.href)
  .then(response => response.text())
  .then(data => {
    // Process the response data
    console.log(data);
    var malwareTypes = [];
    var anyTypeObjectsIncluded = false;
    for (var key in jsonCheck) {
      var values = jsonCheck[key];
      var objectsIncluded = values.every(obj => data.includes(obj));
      if (objectsIncluded) {
        anyTypeObjectsIncluded = true;
        malwareTypes.push(key);
      }
    }
    if (anyTypeObjectsIncluded) {
      console.log("At least one type has all its objects included in the data.");
      console.log("Malware types found:", malwareTypes.join(", "));

      // Display the malware types in the popup window
      popup.document.write("<p>Malware types found: " + malwareTypes.join(", ") + "</p>");
    } else {
      console.log("No type has all its objects included in the data.");

      // Display "No malware types found" in the popup window
      popup.document.write("<p>No malware types found.</p>");
    }

    // Close the popup window after scanning is finished
    popup.close();
  });