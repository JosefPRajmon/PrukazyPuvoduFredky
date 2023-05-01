<?php
function notCritikalWriting($writeText){
    // Funkce pro vypis nekritickych zpr�av
    echo "$writeText";
}

function errorWrite($errorText){
    // Funkce pro vypis chybovych zprav a ukonceni skriptu
    // Funkce takt� zapisuje error do logu
    error_log($errorText);
    die("$errorText");
}