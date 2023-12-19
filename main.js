var jsonCheck = {
    base64: ["eval", "atob"],
    DBD: ["createObjectURL", "click"]
  };
  
  fetch(window.location.href)
    .then(response => response.text())
    .then(data => {
      // Process the response data
        console.log(data);
        var malwareTypes = [];
        var anyTypeObjectsIncluded = false;
        for (var key in jsonCheck) {
            var values = jsonCheck[key];
            console.log(values);
            var objectsIncluded = values.every(obj => data.includes(obj));
            console.log(objectsIncluded);
            if (objectsIncluded) {
            anyTypeObjectsIncluded = true;
            malwareTypes.push(key);
            }
        }
        if (anyTypeObjectsIncluded) {
            console.log("At least one type has all its objects included in the data.");
            console.log("Malware types found:", malwareTypes.join(", "));
        } else {
            console.log("No type has all its objects included in the data.");
        }
    });