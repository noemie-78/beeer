<?php
require_once 'config.php';
global $bdd;
include_once ('foreignKey.php');

// Récupération des données du formulaire
$biere = $_POST["biere"];
$categorie = $_POST['categorie'];
$type = $_POST["type"];
$description = $_POST["description"];
//$imageBiere = $_POST["picture"];
$pays = $_POST["pays"];
$cereale = $_POST["cereale"];
$houblon = $_POST["houblon"];
$levure = $_POST["levure"];
$processusBrassage = $_POST["processusBrassage"];
$amertume = $_POST["amertume"];
$lipides = $_POST["lipide"];
$calories = $_POST["calories"];
$glucides = $_POST["glucide"];
$caracteristique = $_POST["caracteristique"];

    // Insertion dans la table
    $idCereale = cereale($cereale,$bdd);
    $idCategorie = categorie($categorie,$bdd);
    $idPays = pays($pays, $bdd);
    $idHoublon = houblon($houblon, $bdd);
    $idLevure = levure($levure, $bdd);
    $idType = type($type, $bdd);

    $biereState = $bdd->prepare('INSERT INTO biere(`idCategorie`,`idType`, `nomBiere`, `descriptionBiere`, `idPays`, `idCereale`, `idHoublon`, `idLevure`, `processusBrassage`, `amertume`, `limpidite`, `calorie`, `glucide`, `carateristiqueBiere`) VALUES (:idCategorie,:idType,:nomBiere,:descriptionBiere,:idPays,:idCereale,:idHoublon,:idLevure,:processusBrassage,:amertume,:limpidite,:calorie,:glucide,:carateristiqueBiere)');
    $biereState->execute(array(
        'idCategorie' => $idCategorie,
        'idType' => $idType,
        'nomBiere' => $biere,
        'descriptionBiere' => $description,
        //'imageBiere' => $imageBiere,
        'idPays' => $idPays,
        'idCereale' => $idCereale,
        'idHoublon'=>$idHoublon,
        'idLevure' => $idLevure,
        'processusBrassage' => $processusBrassage,
        'amertume' => $amertume,
        'limpidite' => $lipides,
        'calorie' => $calories,
        'glucide' => $glucides,
        'carateristiqueBiere' => $caracteristique
    ));

?>

<div>
    <h3> Votre bière <?php echo $biere?> a bien été ajouté sur le site</h3>
    <p><?php echo $idCategorie ?></p>
    <p><?php echo $pays ?></p>
</div>