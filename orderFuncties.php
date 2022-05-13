<?php
if(!isset($_SESSION))
{

    session_start();                                // altijd hiermee starten als je gebruik wilt maken van sessiegegevens
}

function changeStock($value, $StockItemID, $databaseConnection){ //zodra een bestelling wordt geplaatst, worden de bestelde hoeveelheden van de voorraad afgeschreven.
    $Query = "UPDATE StockItemHoldings 
            SET QuantityOnHand = QuantityOnHand - '$value' WHERE StockItemID = '$StockItemID'";
    $result = mysqli_query($databaseConnection, $Query);
}

function isFullfilled($databaseConnection){
    $Query = "INSERT INTO `ordercheck` (`isBetaald`, `isGeleverd`) VALUES ('1', '1')"; //zodra een bestelling wordt geplaatst, wordt deze functie uitgevoerd die in de database de waardes 1 en 1 toevoegd. (wat duidt op TRUE).
    $result = mysqli_query($databaseConnection, $Query);
}






