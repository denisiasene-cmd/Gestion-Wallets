<?php

function verifierChoix($choix) {

    switch ($choix) {

        case 1:
            echo "Creer Wallet\n";
            break;

        case 2:
            echo "Faire Dépôt\n";
            break;

        case 3:
            echo "Faire Retrait\n";
            break;

        case 4:
            echo "Lister les Transactions\n";
            break;

        case 0:
            echo "Quitter\n";
            break;
    }
}
?>
