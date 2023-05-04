<!DOCTYPE html>
<html lang="cs">
<head>
    <?php
    include "Head.php";
    include "Database.php";
    ?>
    <title>Title</title>
</head>
<body>
<div class="row">
    <div class="col-xs-4"></div>
    <div class="col-xs-5">

        <h1>Přidání žvířezete</h1>
        <form action="CreatingAnimal.php" method="post" onsubmit="return false">
            <input type="submit" value="Zadat podle rodiču" name="family" onclick=vissibilityID("NewInFamily","newFamily");>
            <input type="submit" value="Zadat uplně novou" name="newAnimal" onclick=vissibilityID("newFamily","NewInFamily");>


        </form>
        <div id="NewInFamily" >
            
<form method='post'>
<label>První rodič: <input type='text' name='firstParent'></label></label>
<label>Druhý rodič: <input type='text' name='secondParent'></label></label><br>
     <label>Jmeno a Chovná stanice: <input type='text' name='Name'></label><br>
     <label>Zápis v Plemenné knize: <input type='text' name='StudBook'></label><br>
     <label>Pohlaví: <input type='text' name='Sex'></label><br>
     <label>Datum Narození: <input type='date' name='Born'></label><br>
     <label>Chovatel: <input type='text' name='Breeder'></label><br>
     <label>Čip: <input type='number' name='Chip'></label><br>
     <label>Barva srsti: <input type='text' name='ColorHair'></label><br>
     <label>Typ srsti: <input type='text' name='TypeHair'></label><br>
     <label>Doporučení k bonitaci: <input type='checkbox' name='Boniting'></label><br>
<input type='submit' name='creteVparent'>
</form>
        </div>

        <div id="newFamily">
        <form method='post' onsubmit="return false">
     <label>Jmeno a Chovná stanice: <input type='text' name='Name' id="newFamName"></label><br>
     <label>Zápis v Plemenné knize: <input type='text' name='StudBook' id="newFamStudBook"></label><br>
     <label>Pohlaví: <input type='text' name='Sex' id="newFamSex"></label><br>
     <label>Datum Narození: <input type='date' name='Born' id="newFamBorn"></label><br>
     <label>Chovatel: <input type='text' name='Breeder' id="newFamBreeder"></label><br>
     <label>Čip: <input type='number' name='Chip' id="newFamChip"></label><br>
     <label>Barva srsti: <input type='text' name='ColorHair' id="newFamColorHair"></label><br>
     <label>Typ srsti: <input type='text' name='TypeHair' id="newFamTypeHair"></label><br>
     <label>Doporučení k bonitaci: <input type='checkbox' name='Boniting' id="newFamBoniting"></label><br>
     <input type='submit' value='Vytvořit'  name='SubmitNew'id='newFamilySubmit'>
     </form>

        </div>
        <style>
            #NewInFamily {display: none;}
            #newFamily {display: block;}
        </style>
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

            if (isset($_POST["creteVparent"])){
                ConectCallDatabaseCreatiNewAnimalWParent();
            }

            if (isset($_POST["family"])){
                $button = 2;
                CheckButtonNumber($button);
            }
        }
        //vytvoření nové fretkky bez rodiču
        function ConectCallDatabaseCreatiNewAnimal(){
   /*         try {
                $name = $_POST["Name"];
                $studBook = $_POST["StudBook"];
                $sex = $_POST["Sex"];
                $born = $_POST["Born"];
                $breeder = $_POST["Breeder"];
                $chip = $_POST["Chip"];
                $colorHair = $_POST["ColorHair"];
                $typeHair = $_POST["TypeHair"];
                $boniting = isset($_POST["Boniting"]);
                
                require("Database.php");
                creatiNewAnimal($name, $studBook,$sex, $born,$breeder,$chip,$colorHair,$typeHair,$boniting);
            }
            catch (Exception $e) {
                errorWrite("Omlouváme se vyskytla se chyba $e");
            }*/
        }

        //vytvoření nové fretkky s rodiči
        function ConectCallDatabaseCreatiNewAnimalWParent(){
            try {
                $name = $_POST["Name"];
                $studBook = $_POST["StudBook"];
                $sex = $_POST["Sex"];
                $born = $_POST["Born"];
                $breeder = $_POST["Breeder"];
                $chip = $_POST["Chip"];
                $colorHair = $_POST["ColorHair"];
                $typeHair = $_POST["TypeHair"];
                $boniting = isset($_POST["Boniting"]);

                $firstParent = getID($_POST["firstParent"]);
                $secondParent = getID($_POST["secondParent"]);
                $famili = "$firstParent,$secondParent";
                notCritikalWriting($famili);

                creatiNewAnimal($name, $studBook,$sex, $born,$breeder,$chip,$colorHair,$typeHair,$boniting, $famili);
            }
            catch (Exception $e) {
                errorWrite("Omlouváme se vyskytla se chyba $e");
            }
        }
//zkontroluje které tlačítako bylo rozkliknuto
function CheckButtonNumber($button){
     if ($button ==1) {
        // WriteFormVnew();
         if (isset($_POST["SubmitNew"])) {
             ConectCallDatabaseCreatiNewAnimal();
         }
     } if ($button ==2) {
       //  WriteFormVParent();
         if (isset($_POST["SubmitNew"])) {
             ConectCallDatabaseCreatiNewAnimal();
         }
     }
}


if(isset($_POST["creteVparent"])){
    //nedokončeno
}

?>
    </div>
</div>
<div class="col-xs-3"></div>
</div>
<?php
include_once "Footer.html";
?> 

</body>
</html>
