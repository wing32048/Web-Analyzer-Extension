window.stop();

function isPotentiallyMalicious(value) {
  // Add your custom checks here based on your application's context
  const maliciousPatterns = [
    "<script>",
    "alert(",
    "onmouseover="
    // Add more patterns as needed
  ];

  for (let pattern of maliciousPatterns) {
    if (value.toLowerCase().includes(pattern)) {
      return true;
    }
  }

  return false;
}

function scanPageForStoredXSS(data) {     
  const domParser = new DOMParser();
  const htmlDocument = domParser.parseFromString(data, 'text/html');
  const elements = htmlDocument.getElementsByTagName("*");

  for (let element of elements) {
    for (let attribute of element.attributes) {
      if (isPotentiallyMalicious(attribute.value)) {
        console.log(attribute.value);
        // You can perform additional actions here, such as displaying an alert or sending data to a server
        // Note: Be cautious when interacting with user data to prevent introducing security risks
      }
    }
    if (isPotentiallyMalicious(element.innerText)) {
      console.log(element.innerText);
      // You can perform additional actions here
    }
  }
}

function scanPageForDOMXSS(data) {
  const domParser = new DOMParser();
  const htmlDocument = domParser.parseFromString(data, 'text/html');
  const scripts = htmlDocument.getElementsByTagName("script");

  for (let script of scripts) {
    if (isPotentiallyMalicious(script.innerText)) {
      console.log(`Potentially malicious script content found: ${script.innerText}`);
      // You can perform additional actions here
    }
  }
}

function scanPageForXSS(data) {
  scanPageForStoredXSS(data);
  scanPageForDOMXSS(data);
}

fetch(window.location.href)
  .then(response => response.text())
  .then(data => {
    console.log(data);
    // Execute the scan when the document starts loading
    scanPageForXSS(data);
  });