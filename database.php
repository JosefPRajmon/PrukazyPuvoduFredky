<?php
connect_database();
function connect_database()
{
    $connecton = mysqli_connect("localhost","root","","fretkydb");
    if($connecton){
        echo "Máme přistup k datum. Děkujeme za využití.";
    }
    else
    echo "Omlouváme se máme serverové potíže :( Zkuste to prosím později";

}
?>
