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
if($_SESSION["login"] === false){
    notCritikalWriting("<p><a href='Login.php'>Přihlášení</a></p>");}

else{
    notCritikalWriting("<label><a href='CreatingAnimal.php' >Vytvořit novou fretku</a></label>");


}    //echo $_SESSION["login"];
    ?>
    <br>

<form method="post" >
    <label><input type="text" placeholder="zadej jméno Fredky"></label>
    <input type="submit" value="Hledání" name="search">
</form>
<div> <?php
    echo "<br>"."<br>";
    if (isset($_POST["search"])) {
        search(strlen(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1))-4);
    }
  //  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"

    ?>

</div>
</div>
<div class="col-xs-3"></div>
</div>
</body>
</html>

<?php

?>