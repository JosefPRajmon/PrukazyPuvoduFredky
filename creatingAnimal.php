<!DOCTYPE html>
<html lang="cs">
<head>
    <?php
include "head.php";
?>
    <title>Title</title>
</head>
<body>
<h1>Přidání žvířeze</h1>
<form action="creatingAnimal.php" method="post" >
    <input type="submit" value="Zadat podle rodiču" name="family">
    <input type="submit" value="Zadat uplně novou" name="newAnimal">
</form>

<?php
if (isset($_POST["newAnimal"])){
    echo "
<form method='post'>
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
     <input type='submit' value='Vytvořit' name='SubmitNew'>
     </form>";
}
?>
</body>
</html>
