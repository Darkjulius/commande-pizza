<?php
require_once("_config.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisissez votre commande</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/0f825b8ab5.js" crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <form action="traitement.php" method="post">
            <h1>Votre commande</h1>
            <div class="champ">
                <i class="fas fa-user"></i>
                <input type="text" name="lastname" id="lastname" placeholder="Votre nom" value="<?php
                                                                                                // Je contrôle la superglobale name. Si elle n'est pas vide. J'affiche le nom saisi par l'utilisateur.
                                                                                                if (!empty($_POST["name"])) {
                                                                                                    echo $_POST["name"];
                                                                                                }   ?>">
            </div>
            <p>Nos pizzas</p>
            <div class="pizza">
                <!-- J'affiche la valeur affectée à chacune de mes constantes qui sont définies dans le fichier _config.php -->
                <div>
                    <input type="checkbox" name="pizzas[]" value="reine" id="reine">
                    <label for="reine">
                        <strong>Reine</strong>:
                        <span><?= PRICE_REINE ?> &euro;</span>
                    </label>
                </div>
                <div>
                    <input type="checkbox" name="pizzas[]" value="calzone" id="calzone">
                    <label for="calzone">
                        <strong>Calzone</strong>:
                        <span><?= PRICE_CALZONE ?> &euro;</span>
                    </label>
                </div>
            </div>
            <div class="pizza">
                <div>
                    <input type="checkbox" name="pizzas[]" value="royale" id="royale">
                    <label for="royale">
                        <strong>Royale</strong>:
                        <span><?= PRICE_ROYALE ?> &euro;</span>
                    </label>
                </div>
                <div>
                    <input type="checkbox" name="pizzas[]" value="orientale" id="orientale">
                    <label for="orientale">
                        <strong>Orientale</strong>:
                        <span><?= PRICE_ORIENTALE ?> &euro;</span>
                    </label>
                </div>
            </div>
            <div class="livrer">
                <p>Livraison: </p>
                <div class="switch">
                    <input type="checkbox" name="livraison" id="livraison">
                    <label for="livraison"></label>
                </div>
            </div>
            <p class="validation error">Valider votre commande</p>
            <input type="submit" name="valider" value="Valider">
        </form>
    </section>
</body>

</html>