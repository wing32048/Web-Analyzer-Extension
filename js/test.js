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

function scanPageForStoredXSS() {
  const elements = document.getElementsByTagName("*");

  for (let element of elements) {
    for (let attribute of element.attributes) {
      if (isPotentiallyMalicious(attribute.value)) {
        console.log(`Potentially malicious attribute value found: ${attribute.value}`);
        // You can perform additional actions here, such as displaying an alert or sending data to a server
        // Note: Be cautious when interacting with user data to prevent introducing security risks
      }
    }
    if (isPotentiallyMalicious(element.innerText)) {
      console.log(`Potentially malicious text found: ${element.innerText}`);
      // You can perform additional actions here
    }
  }
}

function scanPageForDOMXSS() {
  const scripts = document.getElementsByTagName("script");

  for (let script of scripts) {
    if (isPotentiallyMalicious(script.innerText)) {
      console.log(`Potentially malicious script content found: ${script.innerText}`);
      // You can perform additional actions here
    }
  }
}

function scanPageForXSS() {
  scanPageForStoredXSS();
  scanPageForDOMXSS();
}

// Execute the scan when the document starts loading
scanPageForXSS();