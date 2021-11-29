<!-- 
creer une session si mon login et mon password == true 
 créer un icône de deconnexion Session_destroy() -->

<?php

session_start();
$tite ="connexion";

echo ('<pre>');

echo ('</pre>');

$bdd = mysqli_connect('localhost','root','root','moduleconnexion');
mysqli_set_charset($bdd,'utf8');

if(isset($_POST['submitConnexion']))
{
    $loginConnect= $_POST["loginConnect"];
    $passwordConnect= $_POST["passwordConnect"];


        if(!empty($loginConnect) && !empty($passwordConnect))//verifiez si les champs sont remplis
    {
       $requete1=mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE login='$loginConnect'");
        // utiliser password_verify pour comparer le password hasher de la bdd avec le password normal du formulaire 
        $result=mysqli_fetch_assoc($requete1);
        $recupMdp = $result['password'];  //$recupMdp = le mot de passe haché par la fonction password_hash et $result recupère le mdp haché dans la bdd-

            if($loginConnect=='admin' && $passwordConnect=='admin')
        {
            $_SESSION['user']=$result;
            header('location: admin.php');

            echo ('<pre>');
            var_dump($result);
            echo ('</pre>');
        } 

            elseif(password_verify($passwordConnect, $recupMdp))
        {
            // $_SESSION['connected']="";
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



        <div class="page">
            <div class="portail-form">
                <div class="div-titre-form">

                        <h2>CONNEXION</h2><br/>
                </div>
                <div class="portail">
                    <form action="" method="POST">
                        <table>
                                <tr>
                                    <td align="right">
                                        
                                        <label for="loginConnect">Login:</label>
                                    </td>
                                    <td> 
                                        <input type="text"  name="loginConnect" placeholder="   Votre login" >
                                        
                                    <br/>
                                    </td>  
                                </tr>
                                <tr>
                                    <td align="right">
                                        <label for="passwordConnect">password:</label>
                                    </td>
                                    <td>
                                        <div class="inputWithIconClef">
                                            <input type="text"  name="passwordConnect" placeholder="   Votre password">
                                            <i class="fa-solid fa-key" aria-hidden="true"></i>
                                            </div>
                                        <br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td align="center"><br/>
                                        <input type="submit" name="submitConnexion" value="Se connecter">
                                    </td>
                                </tr>
                        </table>
                    </form>
                </div>    
            </div>   
            <?php
                if(isset($erreur)){
                    echo $erreur;
                }
            ?> 
    </div>        
        </main>
            <?php 
                require ('footer.php'); 
            ?>
