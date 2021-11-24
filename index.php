<?php
session_start();
var_dump($_SESSION);
// var_dump($_POST["deconnecter"]);
// if(isset($_POST["deconnecter"])){
  
// header('location: connexion.php');
// }



// if($_SESSISON[])
// echo $_SESSION["connexion"];

//var_dump($_SESSION['connexion']);
?>
    
  <?php
        $title = 'Accueil';
        require ('header.php');
        
  ?>

    <main>

      <?php
     
      if(isset($_SESSION['user']))
      {
        echo "vous êtes connectés" . "</br>";
        echo "Bonjour ". $_SESSION['user']['login']." !";
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