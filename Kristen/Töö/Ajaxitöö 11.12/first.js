/**
 * 
 */
(function() {
  var httpRequest;
  document.getElementById("ajaxButton").onclick = function() { 
      var userName = document.getElementById("ajaxTextbox").value;
      makeRequest('first.php',"POST", "userName=" + userName); 
  };

  function makeRequest(url, method, argumentsToBeSent) {
    httpRequest = new XMLHttpRequest();

    if (!httpRequest) {
      alert('Giving up :( Cannot create an XMLHTTP instance');
      return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open(method, url);
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send(argumentsToBeSent);
  }
  function alertContents() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        alert(httpRequest.responseText);
      } else {
        alert('There was a problem with the request.');
      }
    } else {
    	console.log(httpRequest.readyState);
    }
  }
})();