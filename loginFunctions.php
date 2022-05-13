<?php

function setIngelogd ($isIngelogd){
    $_SESSION["ingelogd"] = $isIngelogd;

}

function checkIngelogd (){
    if (isset($_SESSION['login'])) {
        $isIngelogd = $_SESSION['login'];
    }
    else
    {
        $isIngelogd = false;
    }

return $isIngelogd;

}