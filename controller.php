<?php
include_once "repository.php";
include_once "validator.php";
include_once "services.php";


function walletInfos() {
    global $wallets;
    echo "\n--- CRÉER WALLET ---\n";
    
    $telephone = readline("Entrez votre numéro de téléphone : ");
    $nom = readline("Entrez votre nom : ");
    $solde = readline("Entrez votre solde initial : ");
    $code = readline("Saisissez votre code secret : ");

   
    enregistrerWallet($nom, $telephone, $solde, $code);
    echo "Wallet créé avec succès !\n";
}


function executerDepot() {
    echo "\n--- FAIRE DÉPÔT ---\n";
    $telephone = readline("Numéro de téléphone : ");
    $montant = (int) readline("Montant à déposer : ");

    if (traiterDepot($telephone, $montant)) {
        echo "Dépôt réussi !\n";
    } else {
        echo "Erreur : Compte introuvable.\n";
    }
}

function executerRetrait() {
    echo "\n--- FAIRE RETRAIT ---\n";
    $telephone = readline("Numéro de téléphone : ");
    $montant = (int) readline("Montant à retirer : ");

    if (traiterRetrait($telephone, $montant)) {
        echo "Retrait réussi !\n";
    } else {
        echo "Erreur : Compte introuvable ou solde insuffisant.\n";
    }
}


function executerListerTransactions() {
    global $transactions;
    echo "\n--- LISTE DES TRANSACTIONS ---\n";
    
    foreach ($transactions as $t) {
        echo "Tel: {$t['telephone']} | Type: {$t['type']} | Montant: {$t['montant']} CFA | Frais: {$t['frais']} CFA\n";
    }
}

function verifierChoix($choix) {
    switch ($choix) {
        case 1: walletInfos(); break;
        case 2: executerDepot(); break;
        case 3: executerRetrait(); break;
        case 4: executerListerTransactions(); break;
        case 0: echo "quitter !\n"; break;
    }
}
?>
