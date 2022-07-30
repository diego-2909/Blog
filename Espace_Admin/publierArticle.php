<?php
$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
session_start();
if(!$_SESSION['password']){
    header('Location: connexion.php');
}


if(isset($_POST['envoi'])){
    if(!empty($_POST['titre']) AND !empty($_POST['contenu']) ){
        $titre = htmlspecialchars($_POST['titre']);
        $contenu = nl2br(htmlspecialchars($_POST['contenu']));

        $insererArticle = $db ->prepare('INSERT INTO article(name,contenu) VALUES(?,?)');
        $insererArticle->execute(array($titre,$contenu));

        echo "nickel";

    }
    else{
        echo "Veuillez écrire du texte";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un article</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="titre">
        <textarea name="contenu" ></textarea>
        <input type="submit" name="envoi">
    </form>
    
</body>
</html>