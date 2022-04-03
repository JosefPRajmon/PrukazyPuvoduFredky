<?php
connect_database();
function connect_database()
{
    $connecton = mysqli_connect("localhost","root","","fretkydb");
    if($connecton){
        echo "vše funguje děkujeme";
    }
    else
    echo "Omlouváme se máme serverové potíže :(";

}
?>
