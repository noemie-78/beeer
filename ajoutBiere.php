<?php
session_start();
?>
<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scaled=1.0">
    <meta name="author" content="no">
    <title>NewBeer</title>
</head>

<body>

<form method="post" action="form_ajoutBiere.php" enctype="multipart/form-data"> <!-- page quit raite les données recus -->

    <fieldset>
        <legend>Ajout d'une bière</legend>
        <!-- required dans input pour obliger à remplir ce champs -->
        <p>
            <label for="nom">Biere</label>
            <input type="text" name="biere" id="biere" placeholder="Blonde" required>
            <br />
        </p>

        <p>
            <label for="categorie">Catégorie</label>
            <input type="text" name="categorie" id="categorie" placeholder="categorie">
            <br />
        </p>

        <p>
            <label for="type">Type</label>
            <input type="text" name="type" id="type" placeholder="type">
            <br />
        </p>

        <p>
            <label for="description">Description de la bière</label>
            <textarea name="description" id="description" rows="10" cols="50">
                Bla bla bla
            </textarea>
            <br />
        </p>

        <p>
            <div class="mb-3">
                <label for="picture" class="form-label">Photo de la bière</label>
                <input type="file" class="form-control" id="picture" name="picture">
            </div>
        </p>

        <p>
            <label for="pays">Pays</label>
            <input type="text" name="pays" id="pays" placeholder="France">
            <br />
        </p>

        <p>
            <label for="cereale">Céréale</label>
            <input type="text" name="cereale" id="cereale" placeholder="Blé">
            <br />
        </p>

        <p>
            <label for="houblon">Houblon</label>
            <input type="text" name="houblon" id="houblon" placeholder="France">
            <br />
        </p>

        <p>
            <label for="levure">Levure</label>
            <input type="text" name="levure" id="levure" placeholder="France">
            <br />
        </p>

        <p>
            <label for="processusBrassage">Processus de brassage</label>
            <input type="text" name="processusBrassage" id="processusBrassage" placeholder="France">
            <br />
        </p>

        <p>
            <label for="amertume">Amertume</label>
            <input type="text" name="amertume" id="amertume" placeholder="amertume">
            <br />
        </p>

        <p>
            <label for="lipide">Lipide</label>
            <input type="number" name="lipide" id="lipide" placeholder="50">
            <br />
        </p>

        <p>
            <label for="calories">Calories contenu dans la bière</label>
            <input type="number" name="calories" id="calories">
            <br />
        </p>

        <p>
            <label for="glucide">Glucide contenu dans la bière</label>
            <input type="number" name="glucide" id="glucide">
            <br />
        </p>

        <p>
            <label for="caracteristique">Caractéristique de la bière</label>
            <input type="text" name="caracteristique" id="caracteristique">
            <br />
        </p>

        <p>
            <input type="submit" name="Create" value="Soumettre la bière">
        </p>


    </fieldset>
</form>

</body>

</html>