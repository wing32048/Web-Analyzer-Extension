function findURL(data) {
  const urlPattern = /(?:var|let|const)\s+(\w+)\s*=\s*['"]((?:https?:)[^\s'"]+)['"]/g;
  const currentDomain = window.location.hostname;
  console.log(currentDomain);
  let match;
  const urls = [];

  while ((match = urlPattern.exec(data)) !== null) {
    const variableName = match[1];
    const url = match[2];
    console.log(variableName, ':', url);

    if (!url.includes(currentDomain)) {
      urls.push(url);
    }
  }

  return urls;
}

window.stop();
fetch(window.location.href)
  .then(response => response.text())
  .then(data => {
    console.log(data);
    const urls = findURL(data);
    console.log(urls);
  });