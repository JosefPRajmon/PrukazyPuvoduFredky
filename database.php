<?php

function conectToDatabase(){
    $connecton = mysqli_connect("localhost","root","","fretkydb");
    return $connecton;
}

//vytvoření nové fretky v databasi
function CreatiNewAnimal($name,$studBook,$sex, $born,$breeder,$chip,$colorHair,$typeHair,$siblins,$boniting,$RecommendedToBreedingExam=false)
{
    $connecton = conectToDatabase();
    if($connecton){
            $query = "INSERT INTO ferrets (Name , Studbook, sex, born, Breeder, chip, colorHair, typeHair, siblings, Bonite)
            value ('$name','$studBook','$sex','$born','$breeder','$chip','$colorHair','$typeHair','$siblins','$RecommendedToBreedingExam' )";
            $result = mysqli_query($connecton, $query);
            if(!$result){
                errorWrite("dotaz do databze selhal <br>".mysqli_error($connecton));
            }else
                notCritikalWriting( "Vše se uložilo. děkujeme");
        }
}

//zavolání SQL pro najití všech zvířat
function databaseSearching(){
    $connecton = conectToDatabase();
    if($connecton){
        $query = "SELECT * from ferrets";
        $result = mysqli_query($connecton, $query);
        if (!$result) {
            errorWrite("dotaz do databze selhal <br>" . mysqli_error($connecton));}



       return $result;


    }
}function selectWithID($id){
    $connecton = conectToDatabase();
    if($connecton){
        $query = "SELECT `ferrets`.*
FROM `ferrets`
WHERE `ferrets`.`ID` = '$id';";
        $result = mysqli_query($connecton, $query);
        if (!$result) {
            errorWrite("dotaz do databze selhal <br>" . mysqli_error($connecton));}



       return $result;


    }
}

