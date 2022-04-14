<html lang="cs">
<head><?php
include "head.php";

?>
    <title>Rozcestník/login</title>
</head>
<body><?php
include "Seaching.php";
?>
    <h1>Rozcestník / Login</h1>
    <form method="post">
        <input type="button" name="LoginBTN" value="Přihlášení">
    </form>

    <p><a href="creatingAnimal.php" >vytvořit novou fretku</a></p>
    <br>

<form method="post" >
    <label><input type="text" placeholder="zadej jméno Fredky"></label>
    <input type="submit" value="Hledání" name="search">
</form>
<div> <?php
    echo "<br>"."<br>";
    if (isset($_POST["search"])) {
        search();
    }
    ?>

</div>
</body>
</html>

<?php

?>