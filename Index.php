<html lang="cs">
<head><?php
include "Head.php";


?>
    <title>Rozcestník</title>
</head>
<body>
<div class="row">
<div class="col-xs-4"></div>
<div class="col-xs-5">
    <?php
session_start();
include "Seaching.php";
?>
    <h1>Rozcestník</h1>
    <?php
if (isset($_SESSION["login"]))
{
    if($_SESSION["login"] === false){
        notCritikalWriting("<p><a href='Login.php'>Přihlášení</a></p>");
    }

}


else{
    notCritikalWriting("<label><a href='CreatingAnimal.php' >Vytvořit novou fretku</a></label>");


}
    ?>
    <br>

<form method="post" >
    <label>zadej jméno Fredky: (min 3 znaky)<input type="text" name="SearchedData" placeholder="" value="<?php

        if(isset($_POST["search"])){
                echo $_POST["SearchedData"];}
        ?>"></label>
    <input type="submit" value="Hledání" name="search">
</form>
<div> <?php
    echo "<br>"."<br>";
    if (isset($_POST["search"])) {

        if(strlen($_POST["SearchedData"])>2){
            $searchedData = $_POST["SearchedData"];
            search($searchedData) ;
        }
    }
    ?>

</div>
</div>
<div class="col-xs-3"></div>
</div>
</body>
</html>

<?php

?>