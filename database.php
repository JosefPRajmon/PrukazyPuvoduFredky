<?php

//vytvoření nové vydry v databasi
function CreatiNewAnimal($name,$studBook,$sex, $born,$breeder,$chip,$colorHair,$typeHair,$siblins,$RecommendedToBreedingExam=false)
{
    $connecton = mysqli_connect("localhost","root","","fretkydb");
    if($connecton){


            $query = "INSERT INTO ferrets (Name , Studbook, sex, born, Breeder, chip, colorHair, typeHair, siblings, Bonite)
            value ('$name','$studBook','$sex','$born','$breeder','$chip','$colorHair','$typeHair','$siblins','$RecommendedToBreedingExam' )";
            $result = mysqli_query($connecton, $query);
            if(!$result){
                die("dotaz do databze selhal <br>".mysqli_error($connecton));
            }else
                echo "Vše se uložilo. děkujeme ";


        }



}

//zavolání SQL pro vytvoření nové fretky
function CallDatabasecreating(){
}

