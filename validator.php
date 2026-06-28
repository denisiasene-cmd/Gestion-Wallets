<?php

function validerFormatTelephone($numero) {
    if (strlen($numero) !== 9) {
        return false;
    }
    
    for ($i = 0; $i < strlen($numero); $i++) {
        if ($numero[$i] < '0' || $numero[$i] > '9') return false;
    }

    if (str_starts_with($numero, '77') || str_starts_with($numero, '78') ||
        str_starts_with($numero, '75') || str_starts_with($numero, '70') ||
        str_starts_with($numero, '76')) {
        return true;
    }
    return false;
}

function validerNumeroUnique($numero, $wallets) {
    foreach ($wallets as $wallet) {
        if ($wallet["telephone"] == $numero) {
            return false; 
        }
    }
    return true; 
}


function validerMontantPositif($montant) {
    if (strlen($montant) === 0) return false;
    for ($i = 0; $i < strlen($montant); $i++) {
        if ($montant[$i] < '0' || $montant[$i] > '9') return false;
    }
    return (int)$montant > 0;
}
function validerSoldeDisponible($soldeActuel, $montantRetrait, $frais) {
    $totalDeduction = $montantRetrait + $frais;
    return $soldeActuel >= $totalDeduction;
}
