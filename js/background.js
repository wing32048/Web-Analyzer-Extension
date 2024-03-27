chrome.runtime.onMessage.addListener(data => {
    if (data.type === 'notification') {
        chrome.notifications.create('', data.options);
    }
});

chrome.runtime.onMessage.addListener(function(request, sender, sendResponse) {
    if (request.action === 'getCookie') {
        chrome.tabs.query({ active: true, currentWindow: true }, function(tabs) {
            chrome.cookies.get({ name: 'user', url: tabs[0].url }, function(cookie) {
                sendResponse({ cookie: cookie });
            });
        });
        chrome.storage.local.get('phpCookieValue', function(result) {
            const phpCookieValue = result.phpCookieValue;
            console.log(phpCookieValue);
            if (phpCookieValue === undefined ) {
                chrome.action.setPopup({ popup: 'popup/html/setting.html' });
            } else {
                chrome.action.setPopup({ popup: 'popup/html/scanning.html' });
              }
          });
        return true; // Indicates that the response will be sent asynchronously
    }
});