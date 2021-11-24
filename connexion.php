<!-- 
creer une session si mon login et mon password == true 
 créer un icône de deconnexion Session_destroy() -->

<?php

session_start();

echo ('<pre>');
var_dump($_SESSION);
echo ('</pre>');

$bdd = mysqli_connect('localhost','root','root','moduleconnexion');
mysqli_set_charset($bdd,'utf8');

if(isset($_POST['submitConnexion']))
{
    $loginConnect= $_POST["loginConnect"];
    $passwordConnect= $_POST["passwordConnect"];

    if(!empty($loginConnect) && !empty($passwordConnect))
    {
       $requete1=mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE login='$loginConnect'");
        // utiliser password_verify pour comparer le password hasher de la bdd avec le password normal du formulaire 
        $result=mysqli_fetch_assoc($requete1);
        $recupMdp = $result['password'];  //$recupMdp = le mot de passe haché par la fonction password_hash et $result recupère le mdp haché dans la bdd-

        if($loginConnect=='admin' && $passwordConnect=='admin')
        {
            $_SESSION['connected']="";
            $_SESSION['admin']=$result;
            header('location: admin.php');

            echo ('<pre>');
            var_dump($result);
            echo ('</pre>');
        
     
        } 
        elseif(password_verify($passwordConnect, $recupMdp))
        {
            $_SESSION['connected']="";
            $_SESSION["user"] = $result;
            header('location: index.php');
            // $_SESSION["toto"] = $result[0][0];
            // $_SESSION["user"]['login'] = $result[0][1];
            // $_SESSION["user"]['prenom'] = $result[0][2];
            // $_SESSION["user"]['nom'] = $result[0][3];
            // $_SESSION["user"]['password'] = $result[0][4];
            // header('location: index.php');

            // echo  "vous êtes connecté";
        }
            else 
        {
            $erreur= "login ou password incorrect ou incomplet";
        }
    }
}
    

            require ('header.php');
    
    ?>

    
        
        

        <main>
            <div align= center>
                <h2>CONNEXION</h2>
                <br></br>
                <form action="" method="POST">
                        <label for="loginConnect">Login:</label>
                        <input type="text" id="loginConnect" name="loginConnect" placeholder="login"><br/>
                        <label for="passwordConnect">password:</label>
                        <input type="text" id="passwordConnect" name="passwordConnect"><br/>
                        <input type="submit" name="submitConnexion" value="Se connecter">
                        
                </form>
            </div>   
            <?php
                if(isset($erreur)){
                    echo $erreur;
                }
            ?> 
        </main>
    <footer>
         <?php 
            require ('footer.php'); 
        ?>
    </footer>
    
</body>
</html>