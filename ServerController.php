<?php
include_once "Seaching.php";
$root = new webControler();
$root -> webControler();

class webControler {
    
    function webControler() {
// zkontrolujeme, zda byl požadavek odeslán metodou POST

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // nacteme data z pozadavku
    $data = json_decode(file_get_contents('php://input'), true);

    // vytvoříme odpověď - bude to pole s fretkami ze serveru - vložit pole fretek
    $response =  $this->rooting($data);
    // [  "status", "=>", "success", "message", "=>", "test"];
    // vratime odpoved ve formatu JSON s kodem 200 pro uspesnou odpoved

    // vratime odpoved ve formatu JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
    }

    function rooting($data){
        //vyber funkce
        $fn = $data["fn"];
        
        //switch fungujici jako routa
        switch ($fn){
            case "searchAll":
                //zakladní volaní funkce která vrátí vsechny data
                return  TakeAnimal();
            case "test":
                return $data;

        }

        foreach ($data as &$value){
         //   print_r ($value);
        }
    }
}


?>