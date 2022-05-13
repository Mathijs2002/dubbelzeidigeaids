<?php
include "cartfuncties.php";
include __DIR__ . "/header.php";

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST["empty_cart"])) {
    unset($_SESSION["cart"]);
}

if (isset($_POST['verwijderen'])) {
    if (isset($_SESSION)) {
        unset($_SESSION["cart"][$_POST["verwijderen"]]);

        if(empty($_SESSION["cart"]))
        {
            unset($_SESSION["cart"]);
        }
        unset($_POST);
    }
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
</head>
<body>
<h1 style="margin-left: 30px; margin-top: 30px">Winkelwagen</h1>
<?php
if(isset($_SESSION["cart"]))
{
echo '<form method="post" action="Cart.php">
    <input type="submit" name="empty_cart" value="Winkelwagen legen" id="deleteButton">
</form>';
}
?>

<?php

$voorraad = [];

if (isset($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $cartitem => $carthoeveelheid) {
        $StockItem = getStockItem($cartitem, $databaseConnection);
        $hoeveelheid = explode(" ", $StockItem["QuantityOnHand"]);

        $voorraad[$cartitem] = $hoeveelheid[1];

    }
}

else{
    echo "<div style='text-align: center; font-size: larger; margin: 30px'>". "U heeft momenteel niks in uw winkelmandje" . "</div>";
}

if (isset($_GET["lower_id"])) {
    if ($_SESSION["cart"][$_GET["lower_id"]] > 0) {
        $_SESSION["cart"][$_GET["lower_id"]]--;
    }
}
if (isset($_GET["higher_id"])) {
    $StockItem = getStockItem($_GET['higher_id'], $databaseConnection);
    $voor = $StockItem["QuantityOnHand"];
    if ($_SESSION["cart"][$_GET["higher_id"]] <= $voorraad) {
        $_SESSION["cart"][$_GET["higher_id"]]++;
    }
}
$cart = getCart();
echo "<br>";

//print headlines boven de tabel
$totaalPrijs = 0;
foreach ($cart as $key => $value) {
    echo "<div class='row'>
          <div class='col-sm-2'>";

    $StockItem = getStockItem($key, $databaseConnection);
    $pictureArray = getStockItemImage($key, $databaseConnection);
    $StockGroups = getStockGroupImage($key, $databaseConnection);


    //zorgt ervoor dat de foto op de pagina komt
    if (empty($pictureArray)) {
        if (isset($StockGroups)) {
            foreach ($StockGroups as $StockGroup) {
                $backupNaam = $StockGroup["ImagePath"];
                $backupPath = "Public/StockGroupIMG/$backupNaam";
                $backupPath = str_replace(' ', '%20', $backupPath);

                echo "<div>" . "<img class='cartPicture' src=$backupPath>" . "</div>";
                break;
            }

        }
    } else {
        foreach ($pictureArray as $picture) {

            $naam = $picture['ImagePath'];
            $imagePath = "Public/StockItemIMG/$naam";
            $imagePath = str_replace(' ', '%20', $imagePath);


            echo "<div>" . "<img class='cartPicture' src=$imagePath>" . "</div>";
            break;

        }
    }


    echo "</div>";
    echo "<div class='col-sm-10'>";

//zorgt ervoor dat de vooraad wordt geprint
    if($key != null)
    {
        $prijs = round($StockItem['SellPrice'], 2);

        $prijs = $prijs * $value;

        $totaalPrijs += $prijs;


        echo "<div class='winkelwagenData'><b>" . "Artikel: " . "</b>" . $StockItem['StockItemName'] . "</div>";
        echo "<div class='winkelwagenData'><b>" . "Hoeveelheid: " . "</b>";
        if ($_SESSION["cart"][$key] > 1) {
            echo "<a class='arrow' href='Cart.php?lower_id=" . $key . "'><i class='fas fa-chevron-left'></i></a>";
        }
        echo $value;

        if ($_SESSION["cart"][$key] < $voorraad[$key]) {
            echo "<a class='arrow' href='Cart.php?higher_id=" . $key . "'><i class='fas fa-chevron-right'></i></a>";
        }
        echo "</div>";
        echo "<div class='winkelwagenData'><b>" . "Prijs: " . "</b>" . $prijs . "</div>";
        echo "<div class='winkelwagenData'><a href='view.php?id=" . $key . "'>Ga naar product</a></div>";
        echo "<td class='winkelwagenData'><form action='Cart.php' method='post'><button class='winkelwagenData' type='submit'><input type='hidden' name='verwijderen' value=$key />Verwijder</button></form></td>";


    }
    echo "</div>";
    echo "</div>";
}

echo " <br>";
echo "</table>";

?>

<div class="totaalPrijs">
    <?php
     if(isset($_SESSION["cart"])) {
        Print("<h2>"."De totaalprijs is €".$totaalPrijs. "</h2>");
         echo '<form action="bestelling.php">
            <input type="submit" value="Verder naar bestellen"/>
        </form>';
     }
    ?>
</div>
</body>

