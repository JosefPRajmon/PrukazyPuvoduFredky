
// zkontrolujeme, zda byl požadavek odeslán metodou POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // naèteme data z požadavku
    $data = json_decode(file_get_contents('php://input'), true);
    
    // zde bude volání funkce která pøeposle požadavek dal
    
    // vytvoøíme odpovìï - bude to pole s fretkami ze serveru - vlozit pole fretek
    $response = [
        "status", "=>", "success",
        "message", "=>", "Data byla úspìšnì uložena"
    ];
   // vrátíme odpovìï ve formátu JSON s kódem 200 pro úspìšnou odpovìï
    http_response_code(200);
    
    // vrátíme odpovìï ve formátu JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

