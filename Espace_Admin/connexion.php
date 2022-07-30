<?php 
    session_start();
    if(isset($_POST['valider'])){
        if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){
            $pseudo_par_defaut= "admin";
            $mdp_par_defaut = "admin1234";

            $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
            $mdp_saisi = htmlspecialchars($_POST['password']);

            if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
                echo "Connexion réussie";
                $_SESSION['password'] = $mdp_saisi;
                header('Location: ../index.php');
            }
            else{
                echo "Mot de passe éronné";

            }

        }
        else{
            echo " Veuillez compléter tous les champs...";
        }
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title> Espace de connexion admin </title>
    <meta charset="utf-!">
    <link rel="stylesheet" href="../style.css">

</head>
<body>
    <div class="background-connexion">
        <form class="formulaire" method="POST" action="">
            Pseudo:
            <input type="text" name="pseudo" autocomplete="off">
            Mot de passe:
            <input type="text" name="password">
            <input type="submit" name="valider">
        </form>

    </div>
    
</body>
</html>