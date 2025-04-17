<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/../session.php";

/** @var string $_FULLNAME
 *  @var string $_USER
 *  @var string $_SUID
 *  @var array $_PROFILE
 */

$questions = [];

function question($title, $answer) {
    global $questions;

    $questions[] = [
        "title" => $title,
        "answer" => $answer,
        "id" => uniqid()
    ];
}

function pushquest() {
    global $questions;

    echo('<div class="list-group">');

    foreach ($questions as $question) {
        echo('<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#dialog-' . $question["id"] . '">' . $question["title"] . '</a>');
    }

    echo('</div>');

    foreach ($questions as $question) {
        echo('<div class="modal" id="dialog-' . $question["id"] . '"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="modal-title">' . $question["title"] . '</h4><button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body">' . $question["answer"] . '</div><div class="modal-footer"><button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button></div></div></div></div>');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Familine Aide</title>
    <link rel="icon" href="https://familine.minteck.org/icns/familine-help.svg">
    <link rel="stylesheet" href="https://familine.minteck.org/styles.css">
    <?= strpos($_SERVER['HTTP_USER_AGENT'], "+Familine/") !== false ? '<script>$ = require(\'jquery\');jQuery = require(\'jquery\');</script>' : '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>' ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?= strpos($_SERVER['HTTP_USER_AGENT'], "+Familine/") !== false ? '<script>const $ = require(\'jquery\');jQuery = require(\'jquery\');</script>' : '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" style="margin-top:30px;">
        <h1>Partager des fichiers avec Familine Partage</h1>
        <p>Choisissez la sous-catégorie.</p>

        <?php

//        question("Comment regarder des films sur Familine Movies ?", "<p>Tout est très simple. Il vous suffit de cliquer sur un film dans la liste, il se lancera automatiquement (avec parfois une publicité au début).</p>");
//
//        question("Comment visionner les photos sur Familine Photos ?", "<p>Sur la page d'accueil, choisissez une galerie et cliquez sur le texte bleu (et non pas sur l'image d'introduction). Les différentes photos s'affichent en petit, vous pouvez cliquer dessus pour les agrandir, les télécharger, et passer de l'une à l'autre.</p><p>Notez toutefois qu'il ne s'agit pas de vos photos et qu'elles sont soumises à des droits d'auteurs ; les photos téléchargées sont réservés à un usage strictement privé et personnel.</p>");
//
//        question("Comment publier mes photos sur Familine Photos ?", "<p>Familine Photos dispose d'une page détaillant la procédure à suivre pour publier vos photos ainsi que les tarifs de publication. Pour résumer :<ol><li>Choisissez votre formule</li><li>Payez via Familine Money</li><li>Envoyez vos photos aux administrateurs via Familine Share</li><li>Profitez !</li></ol></p>");
//

        question("Comment partager des fichiers avec Familine Partage ?", "<p>Suivez ces étapes simples :</p><ul><li>Accédez à Familine Partage ;</li><li>Cliquez sur « Partager un fichier » ;</li><li>Suivez les instructions à l'écran ;</li><li>Cliquez sur « Partager »</li></ul><p>Vous avez désormais partagé un fichier, il est téléchargeable par n'importe qui à partir du lien que vous pouvez copier et envoyer ; le fichier expirera après le temps que vous avez sélectionné.</p>");

        question("Comment supprimer un fichier partagé avec Familine Partage ?", "<p>Suivez ces étapes simples :</p><ul><li>Accédez à Familine Partage ;</li><li>Cliquez sur « Mes fichiers » ;</li><li>Localisez le fichier que vous voulez supprimer dans la liste ;</li><li>Cliquez sur « Supprimer » ;</li><li>Suivez les instructions à l'écran</li></ul><p>Vous avez désormais supprimé un fichier partagé sur Familine Partage, il n'est plus téléchargeable par quiconque possède le lien.</p>");
        
        question("Comment voir et télécharger un fichier partagé avec Familine Partage ?", "<p>Suivez ces étapes simples :</p><ul><li>Entrez dans la barre d'adresse de votre navigateur le lien qui vous a été partagé (si vous n'avez pas de lien mais que vous avez un code de fichier, entrez-le <a href='https://viewer.familine.minteck.org/f/'>sur cette page</a>) ;</li><li>Si le fichier est compatible avec la technologie Instant, il s'affiche directement en bas de la page, vous pouvez donc le consulter avant de le télécharger ;</li><li>En haut de la page, cliquez sur « Télécharger » ;</li><li>Suivez les instructions de votre navigateur pour finaliser le téléchargement</li></ul><p>Vous avez désormais téléchargé un fichier partagé sur Familine Partage, il se trouve dans le dossier Téléchargements de votre appareil.</p>");
        
        question("Pourquoi ai-je reçu un avertissement ?", "<p>Les administrateurs de Familine vérifient aléatoirement (manuellement et automatiquement) les fichiers partagés avec Familine Partage. Si le fichier partagé ne respecte pas les lois en vigueur ou certaines règles de Familine, il sera supprimé de votre compte et vous recevrez un avertissement.</p><p>Cela concerne par exemple :</p><ul><li>tout contenu sexuellement explicite ;</li><li>tout contenu discriminant ;</li><li>tout programme malveillant ;</li><li>tout contenu chiffré ou aléatoire</li></ul><p>Vous ne pouvez recevoir que 3 avertissements. Au bout de 3 avertissements, votre accès à Familine Partage est révoqué, et vous pourriez perdre l'accès total à Familine s'il s'agit d'une infraction aux lois.</p>");

        question("Que faire si j'ai reçu un avertissement par erreur ?", "<p>Les administrateurs, ainsi que les systèmes automatisés de Familine, peuvent parfois commettre des erreurs et ajouter un avertissement à votre compte par erreur. Si le fichier a été supprimé par un administrateur, il sera restauré ; si il a été supprimé automatiquement, il n'est pas récupérable.</p><p>Si vous pensez qu'il y a erreur, vous pouvez demander le retrait de l'avertissement <a href='mailto:support@familine.minteck.org'>en contactant les administrateurs</a> ; vous devez cependant vous assurer d'être en mesure de prouver l'erreur (si le fichier a été supprimé par un administrateur, Familine sera ammené à examiner votre fichier plus en détails)</p>");

        pushquest();

        ?>
    </div>
    <script>
        console.log("Injecting Familine header")
        document.body.innerHTML = document.body.innerHTML + "<iframe style=\"position:fixed;left:0;right:0;top:0;border: none;width: 100%;height:32px;\" src=\"https://<?= /** @var array $_CONFIG */
            $_CONFIG["Global"]["cdn"] ?>/statusbar.php\"></iframe>";
        document.getElementsByTagName("html")[0].style.marginTop = "32px";
        document.getElementsByTagName("html")[0].style.height = "calc(100vh - 32px)";
    </script>
</body>
</html>