<?php
function notCritikalWriting($writeText){
    // Funkce pro v�pis nekritick�ch zpr�v
    echo "$writeText";
}

function errorWrite($errorText){
    // Funkce pro v�pis chybov�ch zpr�v a ukon�en� skriptu
    // Funkce takt� zapisuje error do logu
    error_log($errorText);
    die("$errorText");
}