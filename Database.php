<?php

function conectToDatabase(){
    $connecton = mysqli_connect("localhost","root","","fretkydb");
    return $connecton;
}

//vytvoření nové fretky v databasi
function CreatiNewAnimal($name,$studBook,$sex, $born,$breeder,$chip,$colorHair,$typeHair,$boniting,$famili = '-1,-1')
{
    $connecton = conectToDatabase();
    if($connecton){
            $query = "INSERT INTO ferrets (name , studbook, sex, born, breeder, chip, colorHair, typeHair, bonite, famili)
            value ('$name','$studBook','$sex','$born','$breeder','$chip','$colorHair','$typeHair','$boniting','$famili' )";
            $result = mysqli_query($connecton, $query);
            if(!$result){
                errorWrite("dotaz do databze selhal <br>".mysqli_error($connecton));
            }else
                notCritikalWriting( "Vše se uložilo. děkujeme");
        }
}

//give ID
function giweID($searchedData){
    $result =databaseSearching($searchedData);
    while($ressult = mysqli_fetch_assoc($result)){
        return $ressult["ID"];

    }
}

//zavolání SQL pro najití všech zvířat
function databaseSearching($searchedData){
    $connecton = conectToDatabase();
    if($connecton){
        $query = "SELECT * from ferrets WHERE name LIKE '$searchedData%'";
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
return "";
}

//search witch famili
function searchSiblings($famili, $myID,$linkYes=true)
{
    $famili = (string) $famili;
    if ($famili === "-1,-1")
        return "";

    else {
        $connecton = conectToDatabase();
        if ($connecton) {
            $query = "SELECT `ferrets`.* FROM `ferrets` WHERE `ferrets`.`famili` = '$famili' AND `ferrets`.`ID` !=$myID";
            $result = mysqli_query($connecton, $query);

            $ressult = "";
            while($rows = mysqli_fetch_assoc($result)){
                $name = $rows["name"];
                $ID = $rows["ID"];
                if ($linkYes){
                $link = "https://$_SERVER[HTTP_HOST]/".strtok( "$_SERVER[REQUEST_URI]", "/")."/Rodokmem.php?id=$ID";
                if ($ressult ===""){
                    $ressult = $ressult."<a href='$link'>$name</a>";
                }else
                    $ressult = $ressult.", <a href='$link'>$name</a>";
                }else{
                    if ($ressult ===""){
                        $ressult = $ressult."$name";
                    }else
                        $ressult = $ressult.", $name";

                }


            return $ressult;}

            }

        }

    return "";
}

//login
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

