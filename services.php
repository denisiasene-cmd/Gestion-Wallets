<?php

include_once "repository.php";
include_once "validator.php";

function calculerFraisRetrait($montant) {
    $frais = 0;

    if ($montant >= 0 && $montant <= 10000) {
        $frais = 200;
    } 
  
    if ($montant > 10000 && $montant <= 100000) {
        $frais = 500;
    } 
 
    if ($montant > 100000) {
        $frais = $montant * 0.01; 
        
        if ($frais > 5000) {
            $frais = 5000;
        }
    }

    return (int) $frais;
}

function traiterDepot($telephone, $montant) {
    global $wallets;

    foreach ($wallets as &$wallet) {
        if ($wallet['telephone'] === $telephone) {
          
            $wallet['solde'] = $wallet['solde'] + $montant;
            
           
            ajouterTransaction($telephone, 'depot', $montant, 0);
            return true;
        }
    }
    return false;
}

function traiterRetrait($telephone, $montant) {
    global $wallets;

    $frais = calculerFraisRetrait($montant);
    $sommeTotale = $montant + $frais;

    foreach ($wallets as &$wallet) {
        if ($wallet['telephone'] === $telephone) {
            
            if ($wallet['solde'] >= $sommeTotale) {
              
                $wallet['solde'] = $wallet['solde'] - $sommeTotale;
                
               
                ajouterTransaction($telephone, 'retrait', $montant, $frais);
                return true;
            }
        }
    }
    return false;
}
?>
