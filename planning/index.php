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
        <h1>Visualiser votre programme d'événements (Familine Planning)</h1>
        <p>Choisissez la sous-catégorie.</p>

        <?php

        question("Comment puis-je voir mon programme ?", "<h4>Depuis un ordinateur</h4><p>Vous pouvez sur la page d'accueil consulter votre emploi du temps pour aujourd'hui. En cliquant sur la flèche à côté (ou en sélectionnant Événements > Emploi du temps dans le menu), vous pouvez consulter votre programme pour cette semaine. Vous pouvez ensuite utiliser la barre en haut pour consulter les semaines passées ou à venir.</p><p>Notez toutefois que les données des semaines à venir peuvent être incomplètes si les administrateurs n'ont pas encore renseigné le programme.</p><h4>Depuis un appareil mobile</h4><p>Vous pouvez sur la page d'accueil consulter les informations sur les 3 prochains événements de votre programme. En cliquant sur la flèche à côté (ou en sélectionnant Événements > Programme dans le menu), vous pouvez consulter votre programme pour aujourd'hui. Vous pouvez ensuite utiliser la barre en haut pour passer d'un jour à l'autre.</p><p>Notez toutefois que les données des jours ou semaines à venir peuvent être incomplètes si les administrateurs n'ont pas encore renseigné le programme.</p>");

        question("Comment consulter l'historique de mes absences et retards ?", "<p>Lorsque vous êtes absent(e) ou en retard à un événement, un administrateur peut le renseigner dans Familine Planning, il s'affiche donc sur votre page.</p><p>Vous pouvez sur la page d'accueil consulter les derniers retards/absences. En cliquant sur la flèche à côté (ou en sélectionnant Vie familiale > Relevé d'absences et de retards dans le menu), vous pouvez consulter l'historique complet de vos absences et retards.</p><p>Si vous disposez de retards ou d'absences non justifié(e)s, nous vous invitons à <a href='mailto:support@familine.minteck.org'>contacter les administrateurs</a> afin de les régulariser.</p>");

        question("Comment consulter le programme d'un autre membre ?", "<div class='alert alert-warning'>Veillez à préserver la vie privée des autres lorsque vous consultez leur programme. Le manquement à cette règle fera clôturer votre compte Familine instantanément.</div><p>Cette opération n'est possible que depuis un ordinateur.</p><p>Dans la barre de navigation, sélectionnez Membres > Emploi du temps. Dans la case Saisie du nom, commencez à entrer le nom ou le prénom de la personne dont vous voulez consulter l'emploi du temps. Si plusieurs résultats s'offrent à vous, sélectionnez celui que vous souhaitez. Ensuite, le programme de la personne s'affiche.</p>");

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