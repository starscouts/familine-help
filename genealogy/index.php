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
        <h1>Consulter la généalogie (Familine Généalogie)</h1>
        <p>Choisissez la sous-catégorie.</p>

        <?php

        question("D'où viennent les données de Familine Généalogie ?", "<p>Familine Généalogie récupère ses données de l'énorme travail de généalogie effectué par la famille, le fichier de généalogie est mis à jour régulièrement par les administrateurs.</p>");

        question("Comment rechercher quelqu'un ?", "<p>Voici comment rechercher une personne dans Familine Généalogie :<ul><li>Cliquez sur « Rechercher » dans la barre en haut ;</li><li>Sélectionnez un critère de recherche ;</li><li>Entrez votre demande dans la barre de recherche ;</li><li>Toutes les personnes correspondant s'affichent</li></ul></p><p>En cliquant sur le nom d'une personne, vous pouvez voir plus d'informations sur elle.</p>");

        question("Pourquoi « Aucune entrée vous correspondant n'a été trouvée dans la généalogie. » ?", "<p>Ce message d'erreur s'affiche lorsque Familine Généalogie ne parvient pas à associer votre compte Familine avec une personne de la généalogie. Ce message peut s'afficher pour plusieurs raisons :</p><ul><li>Vous n'êtes pas présent(e) dans la généalogie</li><li>Vous êtes connu(e) sous un nom différent dans la généalogie</li><li>Votre nom est écrit différemment dans la généalogie</li></ul><p>Dans ce cas, vous devriez essayer de vous rechercher en utilisant différents critères, ou éventuellement <a href='mailto:support@familine.minteck.org'>contacter les administrateurs</a> pour obtenir de l'aide.</p>");

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