function sendRequest(method, url, data, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-type', 'application/json');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(xhr.responseText);
        }
    };
    xhr.send(JSON.stringify(data));
}

function testVypis(response) {
    console.log(response);
    console.log(" test jede")
}

sendRequest('POST', 'http://localhost/PrukazyPuvoduFredky/ServerController.php', { "fn": "ech" }, function (response) { testVypis(response); });