<?php
session_start();
if(!$_SESSION['password']){
    header('Location: connexion.php');
}
?>


<html>
    <head>

    </head>
    <body>
        <a href="publierArticle.php"> publier un article</a>
    </body>


</html>
