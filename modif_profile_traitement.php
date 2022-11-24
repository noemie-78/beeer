<?php 
    session_start();

    require_once 'config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["dateNaissance"]))
    {
        // Patch XSS
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $email = htmlspecialchars($_POST["email"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $dateNaissance = htmlspecialchars($_POST["dateNaissance"]);

        
        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        $nom = strtoupper($nom);
        $prenom = ucfirst(strtolower($prenom));

        $updatePseudo = FALSE;
        $updateEmail = FALSE;
        $updateNom = FALSE;
        $updatePrenom = FALSE;
        $updateDateNaissance = FALSE;

        if($pseudo != $_SESSION['pseudo'])
        {
            $check2 = $bdd->prepare("SELECT pseudo FROM Utilisateur WHERE pseudo = ?");
            $check2->execute(array($pseudo));
            $data2 = $check2->fetch();
            $row2 = $check2->rowCount();

            if($row2 > 0)
            {
                if(strlen($pseudo) <= 100)
                {
                    $updatePseudo = TRUE;
                }
                else{ header('Location: modifProfile.php?reg_err=pseudo'); die();}
            }
            else{ header('Location: modifProfile.php?reg_err=pseudoExiste'); die();}
        }

        if($email != $_SESSION['email'])
        {
            $check = $bdd->prepare("SELECT pseudo, email, nomUtilisateur, prenomUtilisateur, dateNaissance FROM Utilisateur WHERE email = ?");
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();

            if($row2 > 0)
            {
                if(strlen($email) <= 255)
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $updateEmail = TRUE;
                    }
                    else{ header('Location: modifProfile.php?reg_err=pseudo'); die();}
                }
                else{ header('Location: modifProfile.php?reg_err=email'); die();}
            }
            else{ header('Location: modifProfile.php?reg_err=emailExiste'); die();}
        }

        if($nom != $_SESSION['nomUtilisateur'])
        {
            if(strlen($nom) <= 100)
            {
                $updateNom = TRUE;
            }
            else{ header('Location: modifProfile.php?reg_err=nom'); die();}
        }

        if($prenom != $_SESSION['prenomUtilisateur'])
        {
            if(strlen($prenom) <= 100)
            {
                $updatePrenom = TRUE;
            }
            else{ header('Location: modifProfile.php?reg_err=prenom'); die();}
        }

        if($dateNaissance != $_SESSION['dateNaissance'])
        {
            if($dateNaissance < date('y-m-d'))
            {
                $updateDateNaissance = TRUE;
            }
            else{ header('Location: modifProfile.php?reg_err=dateNaissance'); die();}
        }


        if($updatePseudo == TRUE)
        {
            $modif = $bdd->prepare("UPDATE Utilisateur SET pseudo = :pseudomodif WHERE pseudo = :pseudo");
            $modif->execute(array(
                'pseudomodif' => $pseudo,
                'pseudo' => $_SESSION['pseudo']
            ));
        }
        if($updateEmail == TRUE)
        {
            $modif = $bdd->prepare("UPDATE Utilisateur SET email = :email WHERE pseudo = :pseudo");
            $modif->execute(array(
                'email' => $email,
                'pseudo' => $_SESSION['pseudo']
            ));
        }
        if($updateNom == TRUE)
        {
            $modif = $bdd->prepare("UPDATE Utilisateur SET nomUtilisateur = :nom WHERE pseudo = :pseudo");
            $modif->execute(array(
                'nom' => $nom,
                'pseudo' => $_SESSION['pseudo']
            ));
        }
        if($updatePrenom == TRUE)
        {
            $modif = $bdd->prepare("UPDATE Utilisateur SET prenomUtilisateur = :prenom WHERE pseudo = :pseudo");
            $modif->execute(array(
                'prenom' => $prenom,
                'pseudo' => $_SESSION['pseudo']
            ));
        }
        if($updateDateNaissance == TRUE)
        {
            $modif = $bdd->prepare("UPDATE Utilisateur SET dateNaissance = :dateNaissance WHERE pseudo = :pseudo");
            $modif->execute(array(
                'dateNaissance' => $dateNaissance,
                'pseudo' => $_SESSION['pseudo']
            ));
        }

        header('Location: profile.php'); 
        die();
    }
    else{ header('Location: modifProfile.php?reg_err=donnee'); die();}
?>