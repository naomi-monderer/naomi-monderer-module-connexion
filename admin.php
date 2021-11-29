<!-- Pour faire l'admin, je veux prendre mes données utilisateurs de ma base de données et les afficher en tableau sur mon site 
je me connecte à ma base de données
pour prendre des infos de ma bdd, je fais une requete sql qui select all 
un fetch all pour deposer le resultat de ma requete 

la question : pour afficher ma requete : est ce que je peux echo $result ? 
----------------------------
question : lorsque j'utilise un foreach pour récupérer les infos dans ma table de données et
 -->


<?php
session_start();
$bdd = mysqli_connect('localhost','root','root','moduleconnexion');
mysqli_set_charset($bdd,'utf8');

$requete= mysqli_query($bdd,'SELECT * FROM utilisateurs');
$utilisateurs=mysqli_fetch_all($requete, MYSQLI_ASSOC);



// $Useradmin = $_SESSION['user']['admin'];

// if(isset($Useradmin)){

//     echo $result;
// }




?>


  
    <?php
        require ('header.php');
    ?>
    </head>
    <main>
      page admin
        <div align="center">
            <table>
                <thead>
                    <th>id</th>
                    <th>login</th>
                    <th>prénom</th>
                    <th>nom</th>
                    <th>password</th>
                </thead>
                <tbody>
                    

                        <?php 

                        foreach($utilisateurs as $utilisateur)
                        {
                            echo    '<tr><td>'. $utilisateur['id']. '</td>';
                            echo    '<td>'. $utilisateur['login']. '</td>';
                            echo    '<td>'. $utilisateur['prenom']. '</td>';
                            echo    '<td>'. $utilisateur['nom']. '</td>';
                            echo    '<td>'. $utilisateur['password']. '</td></tr>';
                        }
                        

                        ?>

                    

                    
                </tbody>
            </table>
        </div>                    
    </main>
    <?php
         require ('footer.php');
        ?>
