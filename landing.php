<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Salut <?php echo $_SESSION['pseudo']; ?></h1>
        <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
        <a href="profile.php" class="btn btn-danger btn-lg">Profile</a>

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

            $check2 = $bdd->prepare("SELECT AVG(note) FROM Note WHERE idBiere = ?");
            $check2->execute(array($Biere['idBiere']));
            $Note = $check2->fetch();

            ?>
            <div>
                <p><?php echo $Biere['imageBiere']; ?></p></br>
                <p><strong><?php echo $Biere['nomBiere'];?></strong></p></br>
                <p><?php echo $Note;?></p></br>
                <p><?php echo $Type['nomType'];?></p></br>
                <p><?php echo $Categorie['nomCategorie'];?></p></br>
            </div>
            <?php
            $Note = $check2->fetch();




        
        }

        ?>
    </body>
</html>