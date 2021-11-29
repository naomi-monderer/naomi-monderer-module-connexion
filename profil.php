<!-- profil je n'ai pas encore verifier que les login ne puissent pas êtee identique -->

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
                $confirmPassword= $_POST['confirmPassword'];

                echo ('<pre>');
                var_dump($password);
                echo ('</pre>');
                echo $password;

                $requete2 = mysqli_query($bdd, "UPDATE utilisateurs
                SET login='$login', prenom='$prenom', nom='$nom', password='$password' WHERE id=$id");

                if($requete2 == true)
                {
                    $_SESSION['user']["login"] = $login;
                    $_SESSION['user']["prenom"] = $prenom;
                    $_SESSION['user']["nom"] = $nom;
                    $_SESSION['user']["password"] = $password;

                    header('location:profil.php');
                }

                if($password==$confirmPassword)
                {

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
        <title>Profil</title>
</head>
<body>
        <main>
           <?php 
                    if(isset($_SESSION['user']['login']) ||($_SESSION['admin']))
                    {
                        echo "PROFIL DE" . $_SESSION['user']['login'] || $_SESSION['admin']."!";
                    }
            ?>
                <form action="profil.php" method="post">
            
                        <label for="login">Login:</label>
                            <input type="text" id="login" name="login" value=<?php echo $_SESSION['user']['login'];?>>
                        
                        <label for="prenom">Prénom:</label>
                            <input type="text" id="prenom" name="prenom" value=<?php echo $_SESSION['user']['prenom'];?>>
            
                        <label for="nom">Nom de famille:</label>
                        <input type="text" id="nom" name="nom" value=<?php echo $_SESSION['user']['nom'];?>>
            
                        <label for="password">password:</label>
                        <input type="password" id="password" name="password" placeholder="*********">

                        <label for="password">confirmer password:</label>
                        <input type="password" name="confirmPassword" placeholder="********">
            
                        <input type="submit" name="editer" value="Editer mon profil">
                </form>
        </main>
        
        <?php
         require ('footer.php');
        ?>


            
        
            
        
            