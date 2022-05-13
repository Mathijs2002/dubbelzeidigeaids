<?php
if(!isset($_SESSION))
{

    session_start();
}

function getPersoonsgegevens(){
    if(isset($_SESSION['persoonsgegevens'])){
        $persoonsgegevens = $_SESSION['persoonsgegevens'];
    } else{
        $persoonsgegevens = array();
    }
    return $persoonsgegevens;
}

function savePersoonsgegevens($persoonsgegevens){
    $_SESSION["persoonsgegevens"] = $persoonsgegevens;
}
?>
