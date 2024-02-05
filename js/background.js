chrome.runtime.onMessage.addListener(data => {
    if (data.type === 'notification') {
        chrome.notifications.create('', data.options);
    }
});

chrome.runtime.onMessage.addListener(function(request, sender, sendResponse) {
    if (request.action === 'getCookie') {
        chrome.tabs.query({ active: true, currentWindow: true }, function(tabs) {
            chrome.cookies.get({ name: 'id', url: tabs[0].url }, function(cookie) {
                sendResponse({ cookie: cookie });
            });
        });
        return true; // Indicates that the response will be sent asynchronously
    }
});