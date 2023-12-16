chrome.tabs.query({ active: true, currentWindow: true }, (tabs) => {
    if (tabs.length > 0) {
      const tabId = tabs[0].id;
      chrome.tabs.executeScript(tabId, { code: "document.documentElement.outerHTML" }, (result) => {
        if (chrome.runtime.lastError) {
          console.error(chrome.runtime.lastError);
        } else if (result && result.length > 0) {
          const pageSource = result[0];
          console.log(pageSource);
  
          // Further processing or manipulation of the source code
          // ...
        }
      });
    }
  });