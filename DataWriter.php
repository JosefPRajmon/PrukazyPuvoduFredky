<?php
function notCritikalWriting($writeText){
    // Funkce pro výpis nekritických zpráv
    echo "$writeText";
}

function errorWrite($errorText){
    // Funkce pro výpis chybových zpráv a ukonèení skriptu
    // Funkce taktéž zapisuje error do logu
    error_log($errorText);
    die("$errorText");
}