<?php
    session_start();

    require_once 'config.php';

    $check2 = $bdd->prepare("SELECT * FROM Note WHERE idUtilisateur = ?");
    $check2->execute(array($_SESSION['idUtilisateur']));
    $Note = $check2->fetch();
    $row = $check2->rowCount();

    $check = $bdd->prepare("SELECT nomPays FROM Pays WHERE idPays = ?");
    $check->execute(array($_SESSION['idPays']));
    $Pays = $check->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <img class="image_profile" src="<?php echo $_SESSION['imageUtilisateur'];?>"/> <br/>
        <h2>Pseudo : <?php echo $_SESSION['pseudo'];?></h2><br/>
        <h3>Nom : <?php echo $_SESSION['nomUtilisateur'];?></h3><br/>
        <h3>Prénom : <?php echo $_SESSION['prenomUtilisateur'];?></h3><br/>
        <h3>Email : <?php echo $_SESSION['email'];?></h3><br/>
        <h3>Date de naissance : <?php echo $_SESSION['dateNaissance'];?></h3><br/>
        <h3>Pays : <?php echo $Pays['nomPays'];?></h3><br/>
        <h3>Date d'inscription : <?php echo $_SESSION['dateInscription'];?></h3> <br/><br/>

        <?php
            if($row > 0)
            {
                ?>
                <h1>Commentaire</h1>
                <?php
                while ($Note != null)
                {
                    $check2 = $bdd->prepare("SELECT nomBiere FROM Biere WHERE idBiere = ?");
                    $check2->execute(array($Note['idBiere']));
                    $Biere = $check2->fetch();

                    $check3 = $bdd->prepare("SELECT commentaire, imageCommentaire FROM Commentaire WHERE idCommentaire = ?");
                    $check3->execute(array($Note['idCommentaire']));
                    $Commentaire = $check3->fetch();

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
                $reponse->closeCursor();
            }
        ?>

        <form action="modifProfile.php">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Modifier le profile</button>
            </div>   
        </form>

    </body>
</html>