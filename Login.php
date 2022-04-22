<!DOCTYPE html>
<html lang="cs">
<head><?php
    include "Head.php";
    ?>
    <title>Login</title>
</head>
<body>
<?php
session_start();
$_SESSION["login"] = false;
?>
<form action="Login.php" method="post">
    <label><input type="text" placeholder="Jmeno" name="NAME"></label>
    <label><input type="text" placeholder="Heslo" name="PASSWORD"></label>
    <label><input type="submit" placeholder="Přihlašení" name="LOGIN"></label>
</form>
<?php
if (isset($_POST["LOGIN"])){
    include "Database.php";
    if (isset($_POST["LOGIN"])) {
        fLogin($_POST["NAME"], $_POST["PASSWORD"]);
        $_SESSION["login"] = true;
        header('Location: ' . Index::class, true, 303);
    }

}
?>
</body>
</html>