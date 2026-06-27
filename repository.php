<?php

$wallets = [
    [
        "telephone" => "771001010",
        "nom" => "Baila Wane",
        "code" => "1234",
        "solde" => 50000
    ],
    [
        "telephone" => "782345678",
        "nom" => "Hawa Baila Wane",
        "code" => "5678",
        "solde" => 100000
    ]
];

$transactions = [];

function trouverWallet($numero) {
    global $wallets;
    foreach ($wallets as $wallet) {
        if ($wallet["telephone"] == $numero) {
            return $wallet;
        }
    }
    return null;
}

function enregistrerWallet($nom, $telephone, $solde, $code) {
    global $wallets;
    $wallets[] = [
        "telephone" => $telephone,
        "nom" => $nom,
        "code" => $code,
        "solde" => (int)$solde
    ]; 
}

function ajouterTransaction($telephone, $type, $montant, $frais = 0) {
    global $transactions;
    $transactions[] = [
        "telephone" => $telephone,
        "type" => $type, 
        "montant" => (int)$montant,
        "frais" => (int)$frais
    ];
}

function mettreAJourSolde($telephone, $nouveauSolde) {
    global $wallets;
    foreach ($wallets as &$wallet) {
        if ($wallet["telephone"] == $telephone) {
            $wallet["solde"] = $nouveauSolde;
            return true;
        }
    }
    return false;
}
?>
