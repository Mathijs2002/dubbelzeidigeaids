<!-- dit is het bestand dat wordt geladen zodra je naar de website gaat -->
<?php
include __DIR__ . "/header.php";
include "loginFunctions.php";
?>

<form method="post" action="login.php">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" required><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" required>
    <input type="submit" value="Submit">
</form>


<?php
if (isset($_POST["fname"]) && isset($_POST["lname"])){
    if (($_POST["fname"]=="inkoper") && ($_POST["lname"]=="spekkoper")){
        setIngelogd(TRUE);
    }
    else {setIngelogd(FALSE);}
}
?>

<?php
include __DIR__ . "/footer.php";
?>
