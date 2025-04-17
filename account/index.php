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
    <?= strpos($_SERVER['HTTP_USER_AGENT'], "+Familine/") !== false ? '<script>$ = require(\'jquery\');jQuery = require(\'jquery\');</script>' : '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" style="margin-top:30px;">
        <h1>Compte Familine</h1>
        <p>Choisissez la sous-catégorie.</p>

        <?php

        question("Puis-je changer mon nom d'utilisateur ?", "<p>Vous ne pouvez pas changer de nom d'utilisateur. Cependant, si vous changez de nom (légalement ou formellement), vous pouvez demander aux administrateur de changer votre nom d'utilisateur.</p><p>De plus, vous pouvez changer votre nom réel/nom d'affichage, ce nom s'affiche sur certains services Familine.</p>");

        question("Comment changer mon mot de passe ?", "<p>En accédant à « Mon compte > Authentification > Mot de passe > Mettre à jour » sur les sites Familine, vous pouvez changer le mot de passe en utilisant l'option correspondante.</p>");

        question("Comment configurer l'authentification à deux facteurs ?", "<p>En accédant à « Mon compte > Authentification > Application d'authentification > Configurer application d'authentification » sur les sites Familine, vous pouvez configurer l'authentification à deux facteurs en utilisant une application sur votre téléphone.</p><p>Avant de configurer l'A2F, assurez-vous d'avoir installé une application d'authentification sur votre téléphone, telle que Google Authenticator ou Authy.</p>");

        question("Comment me déconnecter de mon compte ?", "<p>Sur les sites Familine, cliquez sur « Mon compte > Déconnexion ». Vous serez alors déconnecté de la plateforme d'authentification, et automatiquement déconnecté des autres sites de Familine après quelques heures.</p>");

        question("Comment modifier ma photo de profil ?", "<p>Vous ne pouvez pas modifier votre photo de profil. Toutefois, si la photo actuelle ne vous convient pas, vous pouvez demander à un photographe de venir prendre une nouvelle photo de vous.</p>");

        question("Comment modifier mon adresse email ?", "<div class='alert alert-warning'>Assurez-vous que l'adresse email que vous saisissez est valide, ou vous risquerez de perdre l'accès à votre compte. Si vous avez fait une erreur, <a href='mailto:support@familine.minteck.org'>contactez les administrateurs</a></div><p>En accédant à « Mon compte > Informations personnelles > Courriel » sur les sites Familine, vous pouvez modifier l'adresse email associée à votre compte Familine.</p><p>Notez que la modification d'adresse email peut prendre plusieurs jours à être déployée sur tous les services de Familine. Familine Planning conservera votre ancienne adresse email tant que vous n'aurez pas <a href='mailto:support@familine.minteck.org'>contacté les administrateurs</a>.</p>");

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