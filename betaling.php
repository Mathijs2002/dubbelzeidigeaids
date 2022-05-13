<?php
include __DIR__ . "/header.php";
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Betaling</title>
</head>
<body>
<h1 style="margin-left: 30px; margin-top: 30px">Betaling</h1>
<div style="margin: 0 auto; width:200px; text-align:left;">
    <a>Selecteer een betalingsmethode</a>
    <form method="get" action="overzicht.php" value="Kies een betaalmethode">
        <input type="radio" name="payment" required style="height:15px; width:15px;"> iDEAL<br>
        <input type="radio" name="payment" required style="height:15px; width:15px;"> Visa<br>
        <input type="radio" name="payment" required style="height:15px; width:15px;"> Mastercard<br>
        <input type="radio" name="payment" required style="height:15px; width:15px;"> Paypal<br>
        <input type="radio" name="payment" required style="height:15px; width:15px;"> Klarna<br>
        <input type="radio" name="payment" required style="height:15px; width:15px;"> AfterPay<br>
        <input type="submit" value="Overzicht bekijken">
    </form>
    <?php

    ?>
</div>
</body>

