<?php
include __DIR__ . "/header.php";
include "persoonsgegevensFuncties.php";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bestellen</title>
</head>
<body>
<h1 style="margin-left: 30px; margin-top: 30px">Bestellen</h1>
<div class="inputwrap">
    <form action="betaling.php" method="post">
        <label style="text-align: right" for="email">E-mailadres* </label>
        <input type="text" name="email" required style="width: 300px; height:30px"<br><br>
        <label style="text-align: right" for="fname">Voornaam* </label>
        <input type="text" name="fname" required style="width: 300px; height:30px"<br><br>
        <label style="text-align: right" for="fname">Achternaam* </label>
        <input type="text" name="lname" required style="width: 300px; height:30px"<br><br>
        <label style="text-align: right" for="address">Straat* </label>
        <input type="text" name="address" required style="width: 300px; height:30px"<br><br>
        <label style="text-align: right" for="zipcode">Postcode* </label>
        <input type="text" name="zipcode" required style="width: 300px; height:30px"<br><br>
        <label style="text-align: right" for="phone">Telefoonnummer* </label>
        <input type="text" name="phone" required style="width: 300px; height:30px"<br><br><br>
        <input type="submit" name="persoonsgegevens" value="Naar betalen" style="width: 300px"/></p>
        <?php
        /*if(!isset($_POST["persoonsgegevens"])) {
            $_SESSION["persoonsgegevens"]["fname"] = $_POST["fname"];     //wordt later nog uitgebreidt.
        }
        */
        ?>
    </form>
    <a href='cart.php'>
        <p align="center">Terug naar winkelmand</p>
    </a>
</div>


</body>
</html>

