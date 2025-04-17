<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/../session.php";

/** @var string $_FULLNAME
 *  @var string $_USER
 *  @var string $_SUID
 *  @var array $_PROFILE
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Familine Aide</title>
    <link rel="icon" href="https://familine.minteck.org/icns/familine-help.svg">
    <link rel="stylesheet" href="https://familine.minteck.org/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" style="margin-top:30px;">
        <h1>Centre d'aide de Familine</h1>
        <p>Obtenez de l'aide avec Familine, rapidement et simplement. Pour commencer, choisissez la catégorie correspondante à votre question.</p>
        <div class="list-group">
            <a href="/account" class="list-group-item list-group-item-action">Compte Familine</a>
            <a href="/media" class="list-group-item list-group-item-action">Service en ligne multimédia (Familine Films et Photos)</a>
            <a href="/share" class="list-group-item list-group-item-action">Partager des fichiers avec Familine Partage</a>
            <a href="/wiki" class="list-group-item list-group-item-action">Accéder à la nouvelle version de Famiwiki (Familine Pages)</a>
            <a href="/planning" class="list-group-item list-group-item-action">Visualiser votre programme d'événements (Familine Planning)</a>
            <a href="/genealogy" class="list-group-item list-group-item-action">Consulter la généalogie (Familine Généalogie)</a>
            <a href="/legal" class="list-group-item list-group-item-action">Mentions légales</a>
        </div>
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