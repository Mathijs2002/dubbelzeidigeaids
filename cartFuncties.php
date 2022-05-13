<?php
if(!isset($_SESSION))
{

    session_start();                                // altijd hiermee starten als je gebruik wilt maken van sessiegegevens
}

function getCart(){
    if(isset($_SESSION['cart'])){               //controleren of winkelmandje (=cart) al bestaat
        $cart = $_SESSION['cart'];                  //zo ja:  ophalen
    } else{
        $cart = array();                            //zo nee: dan een nieuwe (nog lege) array
    }
    return $cart;                               // resulterend winkelmandje terug naar aanroeper functie
}

function saveCart($cart){
    $_SESSION["cart"] = $cart;                  // werk de "gedeelde" $_SESSION["cart"] bij met de meegestuurde gegevens
}

function addProductToCart($stockItemID, $maxVoorraad){
    $cart = getCart();                          // eerst de huidige cart ophalen

    if(array_key_exists($stockItemID, $cart)){  //controleren of $stockItemID(=key!) al in array staat
        if($cart[$stockItemID] < $maxVoorraad)
        {
            $cart[$stockItemID] += 1;                   //zo ja:  aantal met 1 verhogen
            print("Product toegevoegd aan <a href='cart.php'> winkelmandje!</a>");
        }
        else
        {
            print("Je kunt niet meer toevoegen dan de voorraad toelaat");
        }
    }else{
        if($maxVoorraad >= 1)
        {

            $cart[$stockItemID] = 1;
            //zo nee: key toevoegen en aantal op 1 zetten.
            print("Product toegevoegd aan <a href='cart.php'> winkelmandje!</a>");
        }
    }
    saveCart($cart);                            // werk de "gedeelde" $_SESSION["cart"] bij met de bijgewerkte cart
}
?>