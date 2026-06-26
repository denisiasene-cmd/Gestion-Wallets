<?php

include "controller.php";

function menu() {

    do {
        echo "-------- Menu --------\n";
        echo "1 - Creer Wallet\n";
        echo "2 - Faire Dépôt\n";
        echo "3 - Faire Retrait\n";
        echo "4 - Lister les Transactions\n";
        echo "0 - Quitter\n";

        $choix = (int) readline("Veuillez donner votre choix : ");

        if ($choix!==1 && $choix!==2 && $choix!==3 && $choix!==4 && $choix!==0) {
            echo "Choix invalide, veuillez réessayer\n";
        } else {
        
            verifierChoix($choix);
        }

    } while ($choix !== 0);
}

menu();
?>


