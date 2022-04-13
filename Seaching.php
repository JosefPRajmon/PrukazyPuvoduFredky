<?php
include "database.php";
function search()
{
    $result = databaseSearching();
    while($row = mysqli_fetch_assoc($result)){
        print_r("<p><a href=''>".$row["Name"]);
    }
}