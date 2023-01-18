<?php
require_once("_config.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement Commande</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/0f825b8ab5.js" crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <?php
        /**
         * Je contrôle la présence de la superglobale valider. Si elle n'existe pas et que l'utilisateur se rends directement
         * sur la page de traitement sans avoir saisit quoi que ce soit. Il y a un message d'erreur qui apparait
         */
        if (isset($_POST["valider"])) {
        ?>
            <form action="index.php" method="post">
                <h1>Traitement commande</h1>
                <input type="submit" name="valider" value="Retour">
                <input type="hidden" name="lastname" value="<?= $_POST["lastname"]  ?>">
            </form>
            <?php
            /**
             * Je contrôle la présence de la superglobale lastname. C'est à dire que si l'utilisateur ne saisit pas son
             * nom dans le formulaire. Un message d'erreur apparait lui demandant de saisir son nom. Il ne pourra pas aller
             * plus loin dans sa commande s'il ne saisit pas son nom.
             */
            if (empty($_POST["lastname"])) {
                echo "<p class='error'>Veuillez saisir votre Nom</p>";
            } else { ?>
                <?php
                /**
                 * Je contrôle la présence de la superglobale pizzas. C'est à dire que si l'utilisateur ne choisit pas de pizza.
                 * Un message d'erreur apparait lui demande de sélectionner une pizza. Il ne pourra pas aller plus loin dans sa
                 * commande s'il ne sélectionne pas au minimum une pizza.
                 */
                if (empty($_POST["pizzas"])) {
                    echo "<p class='error'>Vous n'avez pas sélectionné votre pizza</p>";
                } else {
                ?>
                    <form action="final.php" method="post">
                        <?php
                        /**
                         * Je boucle la superglobale pizzas car si l'utilisateur en chosit plusieurs. Je dois pouvoir tout récupérer.
                         * Je donne la possibilité à l'utilisateur de choisir le nombre de pizzas qu'il veut commande.
                         * Le tarif de la pizza s'affiche aussi.
                         */
                        foreach ($_POST["pizzas"] as $pizza) {
                        ?>
                            <div class="pizza">
                                <div>
                                    <input type="number" name="nbpizza<?= $pizza ?>" id="nbpizza" value="1">
                                    <?= $pizza ?><span><?= prixPizza($pizza) ?> &euro;</span>
                                </div>
                            </div>
                            <input type="hidden" name="pizzas[]" value="<?= $pizza ?>">
                        <?php
                        }
                        ?>
                        <div class="info-commande">
                            <?php
                            /**
                             * Si la superglobale livraison existe donc que l'utilisateur a coché livraison.
                             * J'affiche le montant de la livraison à domicile qui est définie dans le fichier _config.php
                             * Si il n'y a pas de livraison. J'affiche à retirer sur place.
                             * J'affiche le nom de la personne qui passe la commande.
                             */
                            if (isset($_POST["livraison"])) {
                                echo "<div>Livraison sur place: <span>" . LIVRAISON . " &euro;</span></div>";
                            } else {
                                echo "A retirer sur place";
                            }
                            ?>
                            <p>Nom: <?= $_POST["lastname"] ?></p>
                        </div>

                        <p class="validation error">Finaliser votre commande</p>
                        <input type="submit" name="valider" value="Valider">
                        <input type="hidden" name="lastname" value="<?= $_POST["lastname"]  ?>">
                        <input type="hidden" name="livraison" value="<?php
                                                                        /**
                                                                         * Si la superglobale livraison existe alors je fais un echo de celle-ci. Elle n'est pas visible dans le
                                                                         * formulaire car le type est hidden mais elle existe.
                                                                         */
                                                                        if (isset($_POST["livraison"])) {
                                                                            echo $_POST["livraison"];
                                                                        } ?>">
                    </form>
                <?php
                }
                ?>
            <?php
            }
            ?>
        <?php
        } else {
        ?>
            <form action="index.php" method="post">
                <h2 class="error">Une erreur est survenue</h2>
                <input type="submit" name="valider" value="Retour">
            </form>
        <?php
        }
        ?>
    </section>
</body>

</html>