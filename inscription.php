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
        <?php
            session_start();
            require_once 'config.php';
            $reponse = $bdd->query('SELECT * FROM Pays');
            $donnees = $reponse->fetch();
        ?>
        <div class="login-form">
            <?php

                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mots de passe différents
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide ou trop long
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

                        case 'pseudo2':
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

                        case 'already':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> compte deja existant
                                </div>
                            <?php
                        break;
                        
                        case 'donnee':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> toutes les données n'ont pas été enregistré
                                </div>
                            <?php
                        

                    }
                }
                ?>
            
            
            <form action="inscription_traitement.php" method="post">
                <h2 class="text-center">Inscription</h2> 

                <div class="form-group">
                    <input type="text" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="text" name="prenom" class="form-control" placeholder="Prénom" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="date" name="dateNaissance" class="form-control" placeholder="Date de naissance" required="required" autocomplete="off">
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
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>

                <fieldset>
                    <legend>Type de compte :</legend>

                    <div>
                    <input type="radio" id="user" name="administrateur" value="0" checked>
                    <label for="administrateur">Utilisateur</label>
                    </div>

                    <div>
                    <input type="radio" id="admin" name="administrateur" value="1">
                    <label for="administrateur">Adminisatrateur</label>
                    </div>
                </fieldset>

                <div class="form-group">
                    <label for="file">Sélectionner une image de profile : </label>
                    <input type="file" id="image" name="imageUtilisateur">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
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

