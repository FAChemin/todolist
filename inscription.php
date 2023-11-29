<?php
include('includes/bdd.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
class User{
    //propriétés
    public $name;
    public $surname;
    public $email;
    public $password;
    }

    if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $user=new user();
        $user->name=$_POST['name'];
        $user->surname=$_POST['surname'];
        $user->email=$_POST['email'];
        $user->password=$_POST['password'];
        var_dump($user);

        $sql ="SELECT * FROM `identifiant` WHERE `mail` = :mail";
        $query = $db->prepare($sql);
        $query->bindValue(":mail", $_POST["email"], PDO::PARAM_STR);
        $query->execute();
        $verifEmail = $query->fetch();
        var_dump($verifEmail);
    
    if ($verifEmail===false) {
    $sql  = "INSERT INTO `identifiant` (`nom`,`prenom`, `mail`, `mdp`) VALUES (:nom, :prenom, :mail, :mdp)";
    $query = $db->prepare($sql);
    $query->bindValue(":nom", $user->name, PDO::PARAM_STR);
    $query->bindValue(":prenom", $user->surname, PDO::PARAM_STR);
    $query->bindValue(":mail", $user->email, PDO::PARAM_STR);
    $query->bindValue(":mdp", $user->password, PDO::PARAM_STR);
    $query->execute();


        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="inscr.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <div class="formulaire">
        

   <form action="" method="post">
    <h1>Inscription</h1>
        <label for="name"></label>
            <input type="text" name="name" placeholder="Entrez votre nom"required><br>

        <label for="surname"></label>
            <input type="text" name="surname" placeholder="Entrez votre prenom"required><br>

        <label for="email"></label>
            <input type="text" name="email" placeholder="Entrez votre Email"required><br>
        
            <label for="password"></label>
            <input type="password" name="password" placeholder="Mot de passe"required><br> 

            <label for="password"></label>
            <input type="password" name="password"placeholder="Confirmez le mot de passe"required><br> 

            <button type="submit">S'inscrire</button>
        <button> <a href="connexion.php">Connexion</button>
    </form>
</div>
</body>
</html>