<?php 
    require_once 'config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password_retype"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["dateNaissance"]))
    {
        // Patch XSS
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $email = htmlspecialchars($_POST["email"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $dateNaissance = htmlspecialchars($_POST["dateNaissance"]);
        $password = htmlspecialchars($_POST["password"]);
        $password_retype = htmlspecialchars($_POST["password_retype"]);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare("SELECT pseudo, email, motDePasse, nomUtilisateur, prenomUtilisateur, dateNaissance FROM Utilisateur WHERE email = ?");
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        $nom = strtoupper($nom);
        $prenom = ucfirst(strtolower($prenom));

        $check2 = $bdd->prepare("SELECT pseudo FROM Utilisateur WHERE pseudo = ?");
        $check2->execute(array($pseudo));
        $data2 = $check2->fetch();
        $row2 = $check2->rowCount();

        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(strlen($nom) <= 100){
                if(strlen($prenom) <= 100){
                    if(strlen($pseudo) <= 100){
                        if($row2 == 0){
                            if($dateNaissance < date('y-m-d')){
                                if(strlen($email) <= 255){
                                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                        if($password === $password_retype){

                                            $password = hash('sha256', $password);
                                            $image = $_POST['imageUtilisateur'];
                                            $administrateur = $_POST['administrateur'];
                                            $pays = $_POST['pays'];

                                            $insert = $bdd->prepare('INSERT INTO Utilisateur(pseudo, email, motDePasse, nomUtilisateur, prenomUtilisateur, dateNaissance, administrateur, imageUtilisateur, idPays) VALUES(:pseudo, :email, :motDePasse, :nomUtilisateur, :prenomUtilisateur, :dateNaissance, :administrateur, :imageUtilisateur, :idPays)');
                                            $insert->execute(array(
                                                'pseudo' => $pseudo,
                                                'email' => $email,
                                                'motDePasse' => $password,
                                                'nomUtilisateur' => $nom,
                                                'prenomUtilisateur' => $prenom,
                                                'dateNaissance' => $dateNaissance,
                                                'administrateur' => $administrateur,
                                                'imageUtilisateur' => $image,
                                                'idPays' => $pays
                                            ));

                                            // On redirige avec le message de succès
                                            header('Location:index.php?reg_err=succes');
                                            die();


                                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                                }else{ header('Location: inscription.php?reg_err=email'); die();}
                            }else{ header('Location: inscription.php?reg_err=dateNaissance'); die();}
                        }else{ header('Location: inscription.php?reg_err=pseudo2'); die();}
                    }else{ header('Location: inscription.php?reg_err=pseudo'); die();}
                }else{ header('Location: inscription.php?reg_err=prenom'); die();}
            }else{ header('Location: inscription.php?reg_err=nom'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }else{ header('Location: inscription.php?reg_err=donnee'); die();}
?>