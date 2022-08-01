<?php
try
{
	$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<?php
if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
    header('Location:index.php');
else
{
    extract($_GET);
    $id =strip_tags($id);
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon super site</title>
        <link rel="stylesheet" href="style.css">
        
    </head>
 
    <body>

        <?php include('header.php'); 
        $num = $id - 1;

        $recipesStatement = $db->prepare('SELECT * FROM article');
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        // echo $recipes[$num]['name'];

        ?>

        <div class="background-article">
            
            <div class="presentation-article">

                    <?php 
                    if(file_exists($recipes[$num]['photo'])){
                        ?>  <img class="image_article"src="<?php echo $recipes[$num]['photo']; ?>">
                    <?php
                    }
                ?>

                <h1 class="name-article"> <?php echo $recipes[$num]['name'] ?> </h1>

                <p class="contenu-article" ><?php echo htmlspecialchars_decode($recipes[$num]['contenu']); ?><p>

            </div>

            


        </div>
        

        

       


        

    </body>
</html>