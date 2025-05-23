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
    <h1>Mentions légales</h1>
    <p>Choisissez la sous-catégorie.</p>

    <div class="list-group">
        <a class="list-group-item list-group-item-action" target="_blank" href="https://minteck.org/legal/#/privacy">Politique de confidentialité</a>
        <a class="list-group-item list-group-item-action" target="_blank" href="https://minteck.org/legal/#/terms">Conditions générales d'utilisation</a>
        <a class="list-group-item list-group-item-action" target="_blank" href="https://minteck.org/legal/#/legal">Mentions légales de l'hébergement</a>
        <a class="list-group-item list-group-item-action" target="_blank" href="https://minteck.org/legal/#/warrant">Canari de mandat</a>
    </div>
    <p>Familine est un logiciel libre, vous êtes libre de le modifier et de le distribuer sous les termes de la <a href="https://mit-license.org/" target="_blank">license MIT</a> ; le code source est accessible depuis <a target="_blank" href="https://gitlab.minteck.org/explore/projects/topics/Familine">l'instance GitLab de Minteck</a>. De plus, Familine ne vous vient sans aucune garantie.</p>
    <p>Familine est développé, édité et géré par Minteck :</p>
    <ul><li>3, Cloudominium<br>Ponyville,<br>Equestria</li></ul>
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