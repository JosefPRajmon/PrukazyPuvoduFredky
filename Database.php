<?php

// Funkce pro připojení k databázi
function connectToDatabase() {
    $connection = mysqli_connect("localhost", "root", "", "fretkydb");
    // Pokud se nepodaří připojit, vypíšeme chybu a ukončíme skript
    if (!$connection) {
        errorWrite("Nepodařilo se připojit k databázi: " . mysqli_connect_error());
        die();
    }
    // Nastavíme kódování na utf-8 pro správné zobrazení diakritiky
    mysqli_set_charset($connection, "utf8");
    return $connection;
}

// Funkce pro vytvoření nové fretky v databázi
function createNewAnimal($name, $studBook, $sex, $born, $breeder, $chip, $colorHair, $typeHair, $boniting, $famili = '-1,-1')
{
    $connection = connectToDatabase();
    if($connection){
        $query = "INSERT INTO ferrets (name, studbook, sex, born, breeder, chip, colorHair, typeHair, bonite, famili)
                  VALUES ('$name', '$studBook', '$sex', '$born', '$breeder', '$chip', '$colorHair', '$typeHair', '$boniting', '$famili')";
        $result = mysqli_query($connection, $query);
        if(!$result){
            errorWrite("Dotaz do databáze selhal <br>" . mysqli_error($connection));
        } else {
            notCritikalWriting("Vše se uložilo. Děkujeme");
        }
    }
}

// Funkce pro získání ID zvířete podle jména
function getID($searchedData){
    $result = databaseSearching($searchedData);
    while($res = mysqli_fetch_assoc($result)){
        return $res["ID"];
    }
}

// Funkce pro vyhledávání v databázi
function databaseSearching($searchedData){
    $connection = connectToDatabase();
    if($connection){
        $query = "SELECT * FROM ferrets WHERE name LIKE '$searchedData%'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            errorWrite("Dotaz do databáze selhal <br>" . mysqli_error($connection));
        }
        return $result;
    }
}

// Funkce pro výběr konkrétní fretky z databáze podle ID
function selectWithID($id){
    $connection = connectToDatabase();
    if($connection){
        $query = "SELECT `ferrets`.* FROM `ferrets` WHERE `ferrets`.`ID` = '$id';";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            errorWrite("Dotaz do databáze selhal <br>" . mysqli_error($connection));
        }
        return $result;
    }
    return "";
}

// hledání sourozencu pomocí ID
function searchSiblings($famili, $myID, $linkYes = true)
{
    $famili = (string) $famili;
    if ($famili === "-1,-1") {
        return "";
    } else {
        $connecton = conectToDatabase();
        if ($connecton) {
            $query = "SELECT `ferrets`.* FROM `ferrets` WHERE `ferrets`.`famili` = '$famili' AND `ferrets`.`ID` != $myID";
            $result = mysqli_query($connecton, $query);

            $ressult = "";
            while ($rows = mysqli_fetch_assoc($result)) {
                $name = $rows["name"];
                $ID = $rows["ID"];
                if ($linkYes) {
                    $link = "https://$_SERVER[HTTP_HOST]/" . strtok("$_SERVER[REQUEST_URI]", "/") . "/Rodokmem.php?id=$ID";
                    if ($ressult === "") {
                        $ressult = $ressult . "<a href='$link'>$name</a>";
                    } else {
                        $ressult = $ressult . ", <a href='$link'>$name</a>";
                    }
                } else {
                    if ($ressult === "") {
                        $ressult = $ressult . "$name";
                    } else {
                        $ressult = $ressult . ", $name";
                    }
                }
            }

            return $ressult;
        }
    }
    return "";
}

//přihlášení uživatele
function fLogin($name,$password){
    $connecton = conectToDatabase();
    if($connecton) {
        $query = "SELECT * FROM `user` WHERE `user`.`username` = '$name' AND `user`.`password` = '$password' ";
        $result = mysqli_query($connecton, $query);
        if (!$result) {
            errorWrite("dotaz do databze selhal <br>" . mysqli_error($connecton));
        }
    }
}

