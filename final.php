<?php
require_once("_config.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation Commande</title>
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
            <h1>Validation de la commande</h1>
            <?php
            /**
             * Je défini une variable $total à null pour le calcul du montant total.
             * Je boucle sur la superglobale pizzas afin de faire un traitement de ce qui a été saisi par l'utilisateur.
             */
            $total = null;
            foreach ($_POST["pizzas"] as $pizza) {
            ?>
                <div class="pizza">
                    <div>
                        <?php
                        /**
                         * Si la le nombre de pizza choisi par l'utilisateur est supérieur à 0.
                         * J'affiche le nombre choisi.
                         * J'affiche le prix de la pizza.
                         * Si il y a une erreur => Message d'erreur Annulation de la commande.
                         */
                        if ($_POST["nbpizza" . $pizza . ""] > 0) {
                        ?>
                            <?= $_POST["nbpizza" . $pizza . ""]  ?>
                            <?= $pizza ?><span><?= prixPizza($pizza) ?> &euro;</span>
                            <?php
                            $total += prixPizza($pizza) * $_POST["nbpizza" . $pizza . ""];
                            ?>
                        <?php
                        } else {
                        ?>
                            <p class="error">Annulation de la commande: <?= $pizza ?></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="info-commande">
                <?php
                /**
                 * Si l'utilisateur choisit la livraison sur place, j'affiche le tarif
                 * SINON
                 * Je n'affiche rien.
                 * Dans Total à payer, je prends en compte le nombre de pizza + le prix + le montant si livraison sur
                 * place et j'affiche tout.
                 */
                if ($_POST["livraison"] === "on") {
                    echo "<div>Livraison sur place: <span>" . LIVRAISON . " &euro;</span></div>";
                    $coutLivraison = LIVRAISON;
                } else {
                    echo "A retirer sur place";
                    $coutLivraison = null;
                }
                ?>
                <p>Nom: <?= $_POST["lastname"] ?></p>
                <p><strong>Total à payer: <?= $total + $coutLivraison ?>&euro;</strong></p>
            </div>
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