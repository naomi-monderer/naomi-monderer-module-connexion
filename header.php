<!-- <i class="fa-solid fa-user"></i> 

'<form action="deconnexion.php" method="post">
             
                <i class="fa-solid fa-user"><input class="boutton-deco" type="submit" name="deconnecter" value="deconnexion">
                </input></i>  </form>';-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='css/header.css'>
    <link rel='stylesheet' href='css/form.css'>  
    <link rel='stylesheet' href='css/footer.css'>
    <link rel='stylesheet' href='css/index.css'>
    <link rel='stylesheet'href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet"> 
    <title><?php echo $title; ?></title>
</head>
<body>
<header>
    <nav class="navbar" role="navigation" aria-label="navigation">
        <div class="conteneur-deco-login">
        <?php
                if(isset($_SESSION['user']))
                {
                echo '
                
                
                <form action="deconnexion.php" method="post">
                    <button class="boutton-deco" type="submit" name="deconnecter" value=""><i class="fa-solid fa-user"></i>
                </button></form>';


                }
        ?>
        </div>
         <?php
                
                if(isset($_SESSION['user']))
                {
                 echo "<h2>" . $_SESSION['user']['login']. "</h2>";
                }
            ?> 
        
        <div class="vide-navbar"></div>    
        <ul class="navbar-list" role="list" aria-label="navigation items">
            <li class="navbar-item" aria-label="Accueil">
            <a href="index.php" class="navbar-link" aria-label="home link">ACCUEIL</a>
            </li>
            <?php
                    if(!isset($_SESSION['user']))
                    {

                        echo 
                        '<li class="navbar-item" aria-label="Connexion">
                            <a href="connexion.php" class="navbar-link" aria-label="connexion link">CONNEXION</a>
                        </li>';
                    }
                    
            ?>
            <?php 
                if(!isset($_SESSION['user']))
            {              
                echo '<li class="navbar-item" aria-label="Inscription">
                <a href="inscription.php" class="navbar-link" aria-label="inscription link">INSCRIPTION</a>
                </li>';
            } 

            ?>

            <?php
            if(isset($_SESSION['user']))
            {

                echo '<li class="navbar-item" aria-label="Profil">
                <a href="profil.php" class="navbar-link" aria-label= "profil link">PROFIL</a>
                </li>';
            }
            ?>
            <?php

                if(isset($_SESSION['user']) && $_SESSION['user']["login"]=='admin')
                {
                    echo '<li class="navbar-item" aria-label="Admin">
                    <a href="admin.php" class="navbar-link" aria-label="admin link">ADMIN</a>
                    </li>';
                
                }
            
            ?>
        </ul>
    </nav>
</header>
