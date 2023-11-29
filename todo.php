<?php
include('includes/bdd.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="todo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
</head>
<body>
        <?php
         $sql= "SELECT `text` FROM `todo` WHERE `id_user` = :id_user";
                $query = $db->prepare($sql);
                $query->bindValue(":id_user",$_SESSION['id'], PDO::PARAM_STR);
                $query->execute();
                $requete = $query->fetchAll();
            if(!empty($_POST['saisie']))
            {
                $sql  = "INSERT INTO `todo` (`text`, `id_user`) VALUES (:text, :id_user)";
                $query = $db->prepare($sql);
                $query->bindValue(":text", $_POST['saisie'], PDO::PARAM_STR);
                $query->bindValue(":id_user", $_SESSION["id"], PDO::PARAM_STR);
                $query->execute();
            }
        ?>
        <h1>Bienvenue sur votre ToDoList!<h1></div>
        <form action="" method="POST">
            <label>
            <input type="submit" name="bouton" value="+" onclick="ajout()"/>
            <input type="text" name="saisie" id="saisie" placeholder ="Ajouter a la liste"> 
        </form>
</form>
<div class="all">
<?php
for ($i=0; $i < count($requete) ; $i++) { 
                    echo $requete[$i]['text'];
                    echo('<br>');

                }
?>
</div>
<script>
    function ajout(){
        let text = document.getElementById('saisie').value;
        let div = document.createElement('form');
        let p = document.createElement('p');
        let check = document.createElement('input');
        check.type = "checkbox";
        p.innerHTML = text;
        document.body.appendChild(check);
        document.body.appendChild(p);
        document.body.appendChild(check);

        console.log('oui');
    }
</script>
</body>
</html>