<?php
include('includes/bdd.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
class User{
    //propriétés
    public $email;
    public $password;
    }

    if (!empty($_POST['email']) && !empty($_POST['mdp']))
    {
        // echo($_POST['mdp']);

        // $sql ="SELECT * FROM `identifiant` WHERE `mail` = :mail";
        // $query = $db->prepare($sql);
        // $query->bindValue(":mail", $_POST["email"], PDO::PARAM_STR);
        // $query->execute();
        // $verifEmail = $query->fetch();

        // var_dump($verifEmail);

        $sql= "SELECT * FROM `identifiant` WHERE `mail` = :mail";
        $query = $db->prepare($sql);
        $query->bindValue(":mail",$_POST["email"], PDO::PARAM_STR);
        $query->execute();
        $requete = $query->fetch();
        var_dump($requete);

        if($requete['mail'] === $_POST['email'] && $requete["mdp"] === $_POST['mdp'])
        {
            echo("Connexion réussie");
            header('Location: todo.php');
            echo $requete["id"];
            session_start();
            $_SESSION["name"] = $requete["nom"];
            $_SESSION["id"] = $requete["id"];
        }
        else{
            echo("Connexion échouée");
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script> -->
    <link rel="stylesheet" href="connec.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
</head>
<body>
    <div class="formulaire">
        <h1>Connexion</h1>

    
    <form action="" method="post">
        <label for="email"></label>
        <input type="text" name="email" placeholder="Entrez votre Email" required>

        <label for="mdp"></label>
        <input type="password" name="mdp" placeholder="Mot de passe" required>

        <button>Se connecter</button> 
        <button> <a href="inscription.php">S'inscrire</button>
    </a>
</form>
    </div>


</body>
</html>