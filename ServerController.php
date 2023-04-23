
// zkontrolujeme, zda byl po�adavek odesl�n metodou POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // na�teme data z po�adavku
    $data = json_decode(file_get_contents('php://input'), true);
    
    // zde bude vol�n� funkce kter� p�eposle po�adavek dal
    
    // vytvo��me odpov�� - bude to pole s fretkami ze serveru - vlozit pole fretek
    $response = [
        "status", "=>", "success",
        "message", "=>", "Data byla �sp�n� ulo�ena"
    ];
   // vr�t�me odpov�� ve form�tu JSON s k�dem 200 pro �sp�nou odpov��
    http_response_code(200);
    
    // vr�t�me odpov�� ve form�tu JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

