
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



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog Diego</title>
        <link rel="stylesheet" href="style.css">
    </head>
 
    <body>

        <?php include('header.php'); ?>

        <?php $recipesStatement = $db->prepare('SELECT * FROM article');
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();?>
        
        <div class="background">

            <?php
            foreach ($recipes as $recipe) {
            ?>
                
                
                <div class="article">
                    <?php 
                        if(file_exists($recipe['photo'])){
                            ?>  <img class="image"src="<?php echo $recipe['photo']; ?>">
                        <?php
                        }
                        else{
                            ?> <img class="image"src="photo.png">
                            <?php
                        }
                    ?>
                    <div class="left_article">
                        <a href="article.php?id= <?php echo $recipe['id']?>" class="nom"><?php echo $recipe['name']; ?></a>
                        <p class="date"><?php echo $recipe['date']; ?><p>
                        <p class="contenu" ><?php echo htmlspecialchars_decode($recipe['contenu']); ?><p>
                    </div>
                    
                </div>



                
            
            <?php
            }
            ?>
        </div>

    
    </body>
</html>