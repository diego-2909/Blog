<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="navbar">
        <div class="left-side">

            <h2>Blog Diego</h2>
            

            <ul class="liste">
                <li><a href="./index.php">Accueil</a></li>

            <?php


            if(isset($_SESSION['password'])){
                ?>
                <li><a href="./Espace_Admin/publierArticle.php">Publier un article</a></li>
                </ul>
                <?php
            }
        
    
    ?>


        </div>

        
    <?php
       

        if(isset($_SESSION['password'])){
            ?>
            <ul class="liste">
                <li class="bouton-connexion"><a href="./Espace_Admin/logout.php"> Se déconnecter</a></li>
                <li> Admin</li>
            </ul>
        <?php
        }
        else{
            ?> <ul class="liste">
            <li class="bouton-connexion"><a href="./Espace_Admin/connexion.php">Se connecter
            </a> </li>
        </ul>
        <?php
        }
    ?>

    </div>


</body>



</html>