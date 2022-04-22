<?php
include "Database.php";
function search($long)
{
    $result = databaseSearching();
    while($row = mysqli_fetch_assoc($result)){

        $link = "http://$_SERVER[HTTP_HOST]/".strtok( "$_SERVER[REQUEST_URI]", "/")."/Rodokmem.php?"."id=".$row["ID"];
        print_r("<p><a href=$link>".$row["name"]);
    }
}function TakeAnimal()
{
    $result = selectWithID($_GET["id"]);

    while($row = mysqli_fetch_assoc($result)){

        //proměné z DTB
        $name =$row["name"];
        $studbook =$row["studbook"];
        $sex =$row["sex"];
        $born =$row["born"];
        $breeder =$row["breeder"];
        $chip =$row["chip"];
        $colorHair =$row["colorHair"];
        $typeHair =$row["typeHair"];
        $bonite =$row["bonite"];
        $siblings = $row["siblings"];

        $TEXT = "
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
            <div class='col-lg-3'>$breeder</div>
            
        <div class='col-lg-3'>
            <div><h5>Sourozenci</h5><h6>Siblings</h6></div>
        </div>
            <div class='col-lg-2'>$siblings</div>
</div>

</div>";


//vypsání result v divu
        notCritikalWriting($TEXT);
    }
}