<?php
define("PRICE_REINE", 10);
define("PRICE_CALZONE", 12);
define("PRICE_ROYALE", 14);
define("PRICE_ORIENTALE", 16);
define("LIVRAISON", 5);

function prixPizza($pizza)
{
    switch ($pizza) {
        case 'reine':
            $tarif = PRICE_REINE;
            break;
        case 'calzone':
            $tarif = PRICE_CALZONE;
            break;
        case 'royale':
            $tarif = PRICE_ROYALE;
            break;
        case 'orientale':
            $tarif = PRICE_ORIENTALE;
            break;
    }
    return $tarif;
}
