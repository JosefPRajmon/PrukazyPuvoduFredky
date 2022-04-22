<!DOCTYPE html>
<html lang="cs">
<head>
    <?php
include "Head.php";
?>
    <title>Title</title>
</head>
<body>
<h1>Přidání žvířezete</h1>
<form action="CreatingAnimal.php" method="post" >
    <input type="submit" value="Zadat podle rodiču" name="family">
    <input type="submit" value="Zadat uplně novou" name="newAnimal">
</form>
<?php
//podmínky pro vybrání tlačítka
if (isset($button)){
    $button = 0;
}else{
    if (isset($_POST["newAnimal"])){
        $button = 1;
        CheckButtonNumber($button);
    }

        if (isset($_POST["SubmitNew"])){
            ConectCallDatabaseCreatiNewAnimal();
        }
    if (isset($_POST["family"])){
        $button = 2;
        CheckButtonNumber($button);
    }
}

function ConectCallDatabaseCreatiNewAnimal(){
    try {
        $name = $_POST["name"];
        $studBook = $_POST["studBook"];
        $sex = $_POST["sex"];
        $born = $_POST["born"];
        $breeder = $_POST["breeder"];
        $chip = $_POST["chip"];
        $colorHair = $_POST["colorHair"];
        $typeHair = $_POST["typeHair"];
        $boniting = $_POST["boniting"];
        $siblins = $_POST["siblins"];


        require("Database.php");
        creatiNewAnimal($name,$studBook,$sex, $born,$breeder,$chip,$colorHair,$typeHair,$siblins,$boniting);
    }
    catch (Exception $e){
        errorWrite( "Omlouváme se vyskytla se chyba $e");
    }
}

//zkontroluje které tlačítako bylo rozkliknuto
function CheckButtonNumber($button){
     if ($button ==1) {
         WriteFormVnew();
         if (isset($_POST["SubmitNew"])) {
             ConectCallDatabaseCreatiNewAnimal();
         }
     } if ($button ==2) {
         WriteFormVParent();
         if (isset($_POST["SubmitNew"])) {
             ConectCallDatabaseCreatiNewAnimal();
         }
     }
}

//vypíše folmulář pro vytvoření potomka
function WriteFormVParent(){
    notCritikalWriting("
<form method='post'>
<label>První rodič: <input type='text' name='firstParent'></label></label>
<label>Druhý rodič: <input type='text' name='secondParent'></label></label>
<input type='submit' name='creteVparent'>
</form>" );

}
if(isset($_POST["creteVparent"])){

}

//vypíše formulář ke kompletní tvorbě nového jedince
function WriteFormVnew(){
    notCritikalWriting( "<form method='post'>
     <label>Jmeno a Chovná stanice: <input type='text' name='Name'></label><br>
     <label>Zápis v Plemenné knize: <input type='text' name='StudBook'></label><br>
     <label>Pohlaví: <input type='text' name='Sex'></label><br>
     <label>Datum Narození: <input type='date' name='Born'></label><br>
     <label>Chovatel: <input type='text' name='Breeder'></label><br>
     <label>Čip: <input type='number' name='Chip'></label><br>
     <label>Barva srsti: <input type='text' name='ColorHair'></label><br>
     <label>Typ srsti: <input type='text' name='TypeHair'></label><br>
     <label>Doporučení k bonitaci: <input type='checkbox' name='Boniting'></label><br>
     <label>Sourozenci: <input type='text' name='Siblins'></label><br>
     <input type='submit' value='Vytvořit'  name='SubmitNew'>
     </form>");
}
?>
</body>
</html>
