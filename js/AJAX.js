function sendRequest(method, url, data, callback =  function (response) { testVypis(response); }) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, "http://localhost/PrukazyPuvoduFredky/" + url, true);
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
}

function getObjectData(id)
{
    return document.getElementById(id).value;
}


//volání ajaxu
//nahraní dat do databáze
let databaseData = setInterval(sendRequest('POST', 'ServerController.php', { "fn": "searchAll" }, function (response) { testVypis(response); }),10*60*60);

//tlačítka

//odeslani pro novou rodinu
document.getElementById("newFamilySubmit").addEventListener('click',function() {
    sendRequest('POST', 'ServerController.php', 
    { "fn": "test",
    "Name": getObjectData("newFamName"),
    "StudBook": getObjectData("newFamStudBook"),
    "Sex": getObjectData("newFamSex"),
    "Born": getObjectData("newFamBorn"),
    "Breeder": getObjectData("newFamBreeder"),
    "Chip": getObjectData("newFamChip"),
    "ColorHair": getObjectData("newFamColorHair"),
    "TypeHair": getObjectData("newFamTypeHair"),
    "Boniting": document.getElementById("newFamBoniting").checked
     
    }, function (response) { testVypis(response); })

});
