
<?php
$cheminCss = 'css/form.css';
$title = 'inscription';
$bdd = mysqli_connect('localhost','root','root','moduleconnexion');

if(isset($_POST['submitInscription']))
{
    if(!empty($_POST["login"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["password"]) && !empty($_POST["confirmPassword"])) // j'aurais pu utiliser if(!empty($_POST["login"]) AND !empty($_POST["prenom"])...e)
    {
        $login= $_POST["login"];
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        
        $requete1= mysqli_query($bdd,"SELECT login FROM utilisateurs WHERE login='$login'");//verif login
        $result= mysqli_fetch_all($requete1);
        // var_dump($result);
        // print_r($result);
        // var_dump(count($result));

        if(count($result)==0)// permet de chercher s'il existe déjà le login en base de données. si l'algo compte 0 login à celui entré dans le post c'est ok!
        {
            if($password==$confirmPassword)
            {
                $cryptedPassword = password_hash($password, PASSWORD_BCRYPT);
                $requete2= mysqli_query($bdd, "INSERT INTO utilisateurs(login,prenom,nom,password) Values ('$login','$prenom','$nom','$cryptedPassword')");// envoyer les info dans la bbd
                header('Location: connexion.php');//renvoyer vers une autre page
                echo  "Vous êtes trop chaud !";
            }       
            else
            {
                $erreur= '<p> Mot de passe incorrect</p>';
            }
        }

        else
        {
            $erreur= '<p>Ce login est déjà utilisé ou incorrect</p>';
        }
    }

        else
        {
            $erreur= '<p> Tout les champs doivent être remplis</p>';
        }
}
?>
   <?php 
    
    require('header.php');
    ?>

    <main>
        <!-- <div class="conteneur">
            <div class="bloc-form">


                <h2>INSCRIPTION</h2></br>
               
                <form method="post" action="">
                    <div class="corps-formulaire">


                            <div class="boite">
                                <div>
                                    <label for="login">Login:</label>
                                </div>
                                <div>
                                    <input type="text" id="login" placeholder="Votre login" name="login"><br/>
                                </div>
                            </div>

                            <div class="boite">
                                
                                    <label for="prenom">Prénom:</label> 
                                
                                
                                    <input type="text"  placeholder="Votre prénom" name="prenom"><br/>
                                
                            </div>

                            <div class="boite">
                                <label for="nom">Nom de famille:</label>
                                <input type="text"placeholder="Votre nom de famille" name="nom"><br/> 
                            </div>
                            <div class="boite">
                                <label for="password">password:</label>
                                <input type="text"  placeholder="Définissez votre password" name="password"><br/>
                            </div>

                            <div class="boite">
                                <label for="password"> confirmez password</label>
                                <input type="text" name="confirmPassword" placeholder="Confirmez votre password"/><br/>  
                            
                    
                            <input type="submit" name="submitInscription" value="je m'inscris">
                    </div>
                    
                </form>
            </div>    
        </div> 
                     -->
                        
                        

        <div class="page">
            <div class="portail-form-inscription">
                <div class="div-titre-form">
                
                     <h2>INSCRIPTION</h2></br> 
                </div>
                <div class=portail>        
                    <form method="post" action="">
                        <table>
                            <tr>
                            <div align="center"> 
                                <td align="right">
                                    
                                    <label for="login">Login:</label>
                                </td>
                                <td> 
                                    <input type="text" id="login" placeholder="   Votre login" name="login"><br/>
                                </td>  
                            </tr>
                            <tr>
                                <td align="right">
                                    <label for="prenom">Prénom:</label> 
                                </td>
                                <td> 
                                    <input type="text" id="prenom" placeholder="   Votre prénom" name="prenom"><br/>
                                </td>  
                            </tr>
                            <tr>
                                <td align="right">
                                    <label for="nom">Nom de famille:</label>
                                </td>
                                <td> 
                                    <input type="text" id="nom" placeholder="    Votre nom de famille" name="nom"><br/>   
                                </td>  
                            </tr>
                            <tr>
                                <td align="right">
                                    <label for="password">password:</label>
                                </td>
                                <td>
                                    <input type="text" id="password" placeholder="   Définissez votre password" name="password"><br/>   
                                </td>  
                            </tr>
                            <tr>
                                <td align="right">
                                    <label for="password"> confirmez password</label>
                                </td>
                                <td> 
                                    <input type="text" name="confirmPassword" placeholder="   Confirmez votre password:" id="confirm_password"/><br/>   
                                </td>  
                            </tr>
                            <tr>
                                <td></td>
                            <td align="center">
                                </br>
                                <input class="input-submit" type="submit" name="submitInscription" value="je m'inscris">
                                <?php
                                    // require($erreur);
                                ?>
                            </td>
                            </tr>
                        </table>
                    </form> 
                </div>      
            </div> 
                <?php
                    if(isset($erreur))
                    {
                        echo $erreur;
                    }
                ?>  
          
    </main>

  
        <?php
         require ('footer.php');
        ?>
  

   
   