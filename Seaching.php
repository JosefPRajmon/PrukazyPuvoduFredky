<?php
include "database.php";
function search()
{
    $result = databaseSearching();
    while($row = mysqli_fetch_assoc($result)){
        $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."Rodokmem.php?"."id=".$row["ID"];
        print_r("<p><a href=$link>".$row["Name"]);
    }
}function TakeAnimal()
{
    $result = selectWithID($_GET["id"]);
    while($row = mysqli_fetch_assoc($result)){

        print_r("<pre>");
        print_r($row);
        print_r("</pre>");
    }
}