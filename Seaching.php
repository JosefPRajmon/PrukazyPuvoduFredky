<?php
include "Database.php";

// Funkce pro vyhledání a vypsání výsledků z databáze
function search($SearchedData)
{
    // Zavolání funkce pro vyhledání dat v databázi
    $result = databaseSearching($SearchedData);

    // Vypsání nalezených výsledků pomocí cyklu while
    while($row = mysqli_fetch_assoc($result)){

        // Vytvoření odkazu pro každý výsledek
        $link = "http://$_SERVER[HTTP_HOST]/".strtok( "$_SERVER[REQUEST_URI]", "/")."/Rodokmem.php?"."id=".$row["ID"];

        // Vypsání jména a data narození každého výsledku
        print_r("<p><a href=$link>".$row["name"]."</a>".$row["born"]."</p>");
    }
}

// Funkce pro získání informací o zvířeti s určitým ID
function TakeAnimal()
{
    // Získání dat z databáze pomocí funkce selectWithID a ID z URL
    $result = selectWithID($_GET["id"]);

    // Vypsání informací o zvířeti pomocí cyklu while
    while($row = mysqli_fetch_assoc($result)){

        // Přiřazení hodnot získaných z databáze do proměnných
        if (isset($row["name"]))
            $name =$row["name"];
        if (isset($row["studbook"]))
            $studbook =$row["studbook"];
        if (isset($row["sex"]))
            $sex =$row["sex"];
        if (isset($row["born"]))
            $born =$row["born"];
        if (isset($row["breeder"]))
            $breeder =$row["breeder"];
        if (isset($row["chip"]))
            $chip =$row["chip"];
        if (isset($row["colorHair"]))
            $colorHair =$row["colorHair"];
        if (isset($row["typeHair"]))
            $typeHair =$row["typeHair"];
        if (isset($row["bonite"]))
            $bonite =$row["bonite"];

        // Vypsání informací o zvířeti v HTML
        $siblings = searchSiblings($row["famili"], $row["ID"]);

        return "
<div>
        <div class='row'>
        <div class='col-lg-2'> <img alt='logo' src='img/logo.png'></div>
        <div class='col-lg-3'>
            <div><h5>Jméno a chovatelská stanice</h5><h6>Name and the Ferretry Name</h6></div>
        </div>
        <div class='col-lg-2'>$name</div>
                        <div class='col-lg-3'>
            <div><h5>Čip</h5><h6>Chip</h6></div>
        </div>
            <div class='col-lg-2'>$chip</div>
</div>


        <div class='row'><div class='col-lg-2'><H3>Spolek Chovatelů fretek</H3> <h6>The Czech Ferret Breeders Association</h6>
        </div>
        <div class='col-lg-3'>
            <div><h5>Zápis v Plemenné knize</h5><h6>Stud Book</h6></div>
        </div>
        <div class='col-lg-2'>$studbook</div>
                <div class='col-lg-3'>
            <div><h5>Barva a druh srsti</h5><h6>Colour and type of hair</h6></div>
        </div>
        <div class='col-lg-2'><p>$colorHair</p><p>$typeHair</p></div>
        </div>

<div class='row'>
        <div class='col-lg-2'><h3>PRŮKAZ PŮVODU FRETKY</h3></div>
        <div class='col-lg-3'>
            <div><h5>Pohlaví</h5><h6>Sex</h6></div>
        </div>
        <div class='col-lg-2'>$sex</div>
</div>

<div class='row'>
        <div class='col-lg-2'>PEDIGREE / STAMMBAUM</div>
        <div class='col-lg-3'>
            <div><h5>Datum narození</h5><h6>Born</h6></div>
        </div>
            <div class='col-lg-2'>$born</div>
        <div class='col-lg-3'>
            <div><h5>Doporučení k bonitaci</h5><h6>Recommended to Breeding Exam</h6></div>
        </div>
            <div class='col-lg-2'>$bonite</div>
</div>

<div class='row'>
        <div class='col-lg-2'></div>
        <div>
            <div class='col-lg-3'><h5>Chovatel</h5><h6>Breeder</h6></div>
        </div>
            <div class='col-lg-4'>$breeder</div>

        <div class='col-lg-3'>
            <div><h5>Sourozenci</h5><h6>Siblings</h6></div>
        </div>
            <div class='col-lg-2'><p>$siblings</p></div>
</div>

</div>";
    }
}