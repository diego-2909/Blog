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
        $image = htmlspecialchars($_POST['file']);


        $insererArticle = $db ->prepare('INSERT INTO article(name,contenu,photo) VALUES(?,?,?)');
        $insererArticle->execute(array($titre,$contenu,$image));

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
    <script src="../public/jquery/jquery.min.js"></script>
    <script src="../public/tinymce/tinymce.min.js"></script>
    <script src="../public/tinymce-jquery/tinymce-jquery.min.js"></script>
</head>
<body>


    <form method="POST" action="">
        <input type="text" name="titre">
        <input type="submit" name="envoi">
        <textarea name="contenu" id="tiny"></textarea>
        <input type="file" name="file">
        
            
        
        <script>
        $('textarea#tiny').tinymce({
        height: 500,
        menubar: false,
        plugins: [
          'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
          'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
          'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist outdent indent | removeformat | help'
      });
        </script>



    </form>
    
</body>
</html>