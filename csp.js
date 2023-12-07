const csp = "script-src 'self' 'unsafe-eval'; object-src 'self';";

const script = document.createElement('script');
script.textContent = `
  var meta = document.createElement('meta');
  meta.httpEquiv = 'Content-Security-Policy';
  meta.content = ${JSON.stringify(csp)};
  document.head.appendChild(meta);
`;
document.documentElement.appendChild(script);
script.remove();