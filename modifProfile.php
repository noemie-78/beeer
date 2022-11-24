<?php
    session_start();
    require_once 'config.php';
    $reponse = $bdd->query('SELECT * FROM Pays');
    $donnees = $reponse->fetch();
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Inscription</title>
        </head>
        <body>
        
        <div class="login-form">
            <?php

                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide ou trop long
                            </div>
                        <?php
                        break;

                        case 'emailExiste':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> email deja associé à un autre compte
                                </div>
                            <?php
                            break;

                        case 'dateNaissance':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> date de naissance supérieur à la date actuelle
                            </div>
                        <?php
                        break;

                        case 'pseudo':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudoExiste':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> le pseudo existe déjà
                                </div>
                            <?php 
                            break;

                        case 'prenom':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> prenom trop long
                            </div>
                        <?php 
                        break;

                        case 'nom':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> nom trop long
                            </div>
                        <?php
                        break;

                        case 'donnee':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> il manque des informations
                                </div>
                            <?php
                            break;

                    }
                }
                ?>
            
            <form action="modif_profile_traitement.php" method="post">
                <h2 class="text-center">Modification du profile</h2> 

                <div class="form-group">
                    <label for="nom">Nom</label><br>
                    <input type="text" name="nom" class="form-control" value="<?php echo $_SESSION['nomUtilisateur']?>">
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label><br>
                    <input type="text" name="prenom" class="form-control" value="<?php echo $_SESSION['prenomUtilisateur']?>"">
                </div>

                <div class="form-group">
                    <label for="dateNaissance">Date de naissance</label><br>
                    <input type="date" name="dateNaissance" class="form-control" value="<?php echo $_SESSION['dateNaissance']?>">
                </div>

                <div class="form-group">
                    <label for="pays">Pays d'origine</label></br>
                    <select id="pays" name="pays">
                        <?php
                            while ($donnees != null)
                            {
                        ?>
                        <option value="<?php echo $donnees['idPays']; ?>"><?php echo $donnees['nomPays']; ?></option>
                        <?php
                            $donnees = $reponse->fetch();
                            }
                            $reponse->closeCursor();
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pseudo">Pseudo</label><br>
                    <input type="text" name="pseudo" class="form-control" value="<?php echo $_SESSION['pseudo']?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['email']?>">
                </div>

                <div class="form-group">
                    <label for="file">Sélectionner une image de profile : </label></br>
                    <input type="file" id="image" name="imageUtilisateur">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Modifier</button>
                </div>   
            </form>
        </div>
        <!--<style>
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>-->
        </body>
</html>