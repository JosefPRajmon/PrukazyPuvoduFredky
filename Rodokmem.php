<html lang="cs">
<head>
    <?php
    include "Head.php";
    include "Seaching.php";

    ?>
    <title>Rodokmen fretky</title>

</head>
<body>
<form method="post" action="pdfGenerate.php">
    <input type="submit" value="PDF" name="PDF">
</form>
<?php

notCritikalWriting(TakeAnimal());
?>
<?php



session_start();
$_SESSION["id"] = $_GET["id"];

?>



<br><br><br>


</body>
</html>