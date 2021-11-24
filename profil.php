<!-- je veux recuperer mes données utilisateurs depuis sql jusqu'à mon site internet = requete 
je veux remplacer chaque donnée dans la case de mon formulaire par une autre valeur = 
si la valeur en cours existe 
je veux renvoyer mes nouvelles données dans ma base de donnée= requete2 -->

<?php
session_start();

if (isset($_POST['logout']))
{
    session_destroy();
    header('location:connexion.php');
}

echo ('<pre>');
var_dump($_SESSION);
echo ('</pre>');

$bdd = mysqli_connect('localhost','root','root','moduleconnexion');
mysqli_set_charset($bdd,'utf8');


// $user=$_SESSION["login"];
// $requete= mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE login='$user'");
// $userInfo=mysqli_fetch_all($requete,MYSQLI_ASSOC);

if(isset($_POST['editer']))
{       
        echo "bruce lee c mon pere";
        $id = $_SESSION['user']['id'];
                $login = $_POST['login'];
                $prenom = $_POST['prenom'];
                $nom = $_POST['nom'];
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                echo ('<pre>');
                var_dump($password);
                echo ('</pre>');
                echo "britney c ma mère";

                $requete2 = mysqli_query($bdd, "UPDATE utilisateurs SET login='$login', prenom='$prenom', nom='$nom', password='$password' WHERE id=$id");

                if($requete2 == true)
                {
                    $_SESSION['user']["login"] = $login;
                    $_SESSION['user']["prenom"] = $prenom;
                    $_SESSION['user']["nom"] = $nom;
                    $_SESSION['user']["password"] = $password;

                    header('location:profil.php');
                }
}


        require ('header.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
        <main>
        
            <form action="profil.php" method="post">
        
                    <label for="login">Login:</label>
                        <input type="text" id="login" name="login" value=<?php echo $_SESSION['user']['login'];?>>
                    
                    <label for="prenom">Prénom:</label>
                        <input type="text" id="prenom" name="prenom" value=<?php echo $_SESSION['user']['prenom'];?>>
        
                    <label for="nom">Nom de famille:</label>
                        <input type="text" id="nom" name="nom" value=<?php echo $_SESSION['user']['nom'];?>>
        
                    <label for="password">password:</label>
                        <input type="text" id="password" name="password">
        
                    <input type="submit" name="editer" value="Editer mon profil">
                    </form>
        </main>
        
</body>
</html>


            
        
            
        
            