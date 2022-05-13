<?php
include __DIR__ . "/header.php";
include "orderFuncties.php";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bestelling geplaatst</title>
</head>
<body>
<div class="orderText">
<h1>Bestelling geplaatst</h1>
    <a>
        De bestelling is succesvol geplaatst en afgeleverd.
    </a>
</div>

<?php
if (!isset ($_SESSION)) {
    session_start();
}


if ((isset ($_SESSION["cart"]))) {
    $cart = ($_SESSION["cart"]);
    foreach ($cart as $id => $hoeveelheid) {
        changeStock($hoeveelheid, $id, $databaseConnection);
    }
    unset($_SESSION["cart"]);

    isFullfilled($databaseConnection);
}
?>
