<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        
        <?php
        $check = $bdd->prepare("SELECT * FROM Biere");
        $Biere = $check->fetch();

        while ($Commentaire != null)
        {
            $check2 = $bdd->prepare("SELECT nomCategorie, descriptionCategorie FROM Categorie WHERE idCategorie = ?");
            $check2->execute(array($Biere['idCategorie']));
            $Categorie = $check2->fetch();

            $check2 = $bdd->prepare("SELECT nomType, descriptionType FROM TypeBiere WHERE idType = ?");
            $check2->execute(array($Biere['idType']));
            $Type = $check2->fetch();

            $check2 = $bdd->prepare("SELECT nomPays FROM Pays WHERE idPays = ?");
            $check2->execute(array($Biere['idPays']));
            $Pays = $check2->fetch();

            $check2 = $bdd->prepare("SELECT nomCereale, typeCereale, descriptionCereale FROM Cereale WHERE idCereale = ?");
            $check2->execute(array($Biere['idCereale']));
            $Type = $check2->fetch();

            $check2 = $bdd->prepare("SELECT nomHoublon, typeHoublon, descriptionHoublon FROM Houblon WHERE idHoublon = ?");
            $check2->execute(array($Biere['idHoublon']));
            $Type = $check2->fetch();

            $check2 = $bdd->prepare("SELECT nomLevure, typeLevure, descriptionLevure FROM Levure WHERE idLevure = ?");
            $check2->execute(array($Biere['idLevure']));
            $Type = $check2->fetch();

            ?>
            <div>
                <p><strong><?php echo $Biere['nomBiere'];?></strong></p></br>
                <p><?php echo $Note['dateNote'];?></p></br>
                <p><?php echo $Note['note'];?></p>
                <p><?php echo $Commentaire['commentaire'];?></p>
                <p><?php echo $Commentaire['imageCommentaire'];?></p>
            </div>
            <?php
            $Note = $check2->fetch();




        
        }

        ?>
    </body>
</html>