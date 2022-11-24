<?php
session_start();

global $bdd;
// $cereale = $_POST["cereale"];

require_once 'config.php';
require_once 'form_ajoutBiere.php';

function cereale($cereale, $bdd)
{
    // Execute the request pou cereale
    $biereState = $bdd->prepare('INSERT INTO cereale(nomCereale) VALUES (:nomCereale)');
    $biereState->execute([
        'nomCereale'=> $cereale
    ]);

    if($biereState)
    {
        $idCereale = $bdd->lastInsertId();
        $biereState->closeCursor();
    }
    return $idCereale;
}

function categorie($categorie, $bdd)
{
    // Execute the request pou cereale
    $biereState = $bdd->prepare('INSERT INTO categorie(nomCategorie) VALUES (:nomCategorie)');
    $biereState->execute([
        'nomCategorie'=> $categorie
    ]);

    if($biereState)
    {
        $idCategorie = $bdd->lastInsertId();
        $biereState->closeCursor();
    }
    return $idCategorie;
}

function type($type, $bdd)
{
    // Execute the request pou cereale
    $biereState = $bdd->prepare('INSERT INTO typeBiere(nomType) VALUES (:nomType)');
    $biereState->execute([
        'nomType'=> $type
    ]);

    if($biereState)
    {
        $idType = $bdd->lastInsertId();
        $biereState->closeCursor();
    }
    return $idType;
}

function pays($pays, $bdd)
{
    // Execute the request pou cereale
    $biereState = $bdd->prepare('INSERT INTO pays(nomPays) VALUES (:nomPays)');
    $biereState->execute([
        'nomPays'=> $pays
    ]);

    if($biereState)
    {
        $idPays = $bdd->lastInsertId();
        $biereState->closeCursor();
    }
    return $idPays;
}

function houblon($houblon, $bdd)
{
    // Execute the request pou cereale
    $biereState = $bdd->prepare('INSERT INTO houblon(nomHoublon) VALUES (:nomHoublon)');
    $biereState->execute([
        'nomHoublon'=> $houblon
    ]);

    if($biereState)
    {
        $idHoublon = $bdd->lastInsertId();
        $biereState->closeCursor();
    }
    return $idHoublon;
}

function levure($levure, $bdd)
{
    // Execute the request pou cereale
    $biereState = $bdd->prepare('INSERT INTO levure(nomLevure) VALUES (:nomLevure)');
    $biereState->execute([
        'nomLevure'=> $levure
    ]);

    if($biereState)
    {
        $idLevure = $bdd->lastInsertId();
        $biereState->closeCursor();
    }
    return $idLevure;
}
?>