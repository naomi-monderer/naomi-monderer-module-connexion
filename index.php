<?php
session_start();

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
        <div class="div-titre-connexion">
          <h1>LA REVUE DES MUSIQUES POPULAIRES</h1>
        </div>  
        <div id="conteneur">
            <div class="cover-book">
                  <div class="legende-img">
                    <img src="image/volume.jpg" alt="volume">
                    <p>VOLUME!</br> 
                    <i>ECOUTES</i></br>
                    Numéro 10 </br>
                    2013</p>
                  </div>
                  <div class="legende-img"> 
                    <img src="image/volume2.jpg" alt="volume">
                    <p>VOLUME! </br>
                    <i>UK JUNGLE</i></br>
                    Numéro 02 </br>
                    2014</p>
                  </div>
                  <div class="legende-img">
                    <img src="image/volume9.jpg" alt="volume">
                    <p>VOLUME! </br>
                    <i>CONTRE CULTURE</i></br>
                    Numéro 9-1  </br>
                    2012</p>
                  </div>
                  <div class="legende-img">
                    <img src="image/volume3.jpg" alt="volume">
                    <p>VOLUME!</br>
                    <i>CONTRE CULTURE</i></br>
                    Numéro 9-2 </br>
                    2012</p>
                  </div>
                  <div class="legende-img">
                    <img src="image/volume4.jpg" alt="volume">
                    <p>VOLUME! </br>
                    <i>LA SCENE PUNK </br>
                    EN FRANCE</i></br>
                    Numéro 13 </br>
                    2016</p>
                  </div>
                  <div class="legende-img">
                    <img src="image/volume5.jpg" alt="volume">
                    <p>VOLUME! </br>
                    <i>LA VOIX POP</i></br>
                    Numéro 16 </br>
                    2017</p>
                  </div>
                  <div class="legende-img">
                    <img src="image/volume6.jpg" alt="volume">
                    <p>VOLUME!</br>
                    <i>LE MONDE OU RIEN?</i></br>
                    Numéro 17 </br>
                    2020</p>
                  </div>
                  <div class="legende-img">
                    <img src="image/volume7.jpg" alt="volume">
                    <p>VOLUME!</br>
                    <i>WATCHING MUSIC</i></br>
                    Numéro 14</br>
                    2017</p>
                  </div>
                  <div class="legende-img">
                    <img src="image/volume8.jpg" alt="volume">
                    <p>VOLUME!</br>
                    <i>LES SCENES METAL</i></br>
                    Numéro 2 </br>
                    2013</p>
                  </div>
                  
                  <div class="legende-img">
                    <img src="image/volume10.jpg" alt="volume">
                    <p>VOLUME!</br>
                    <i>INNA JAMAICAN</br>STYLEE</i></br>
                    Numéro 13</br>
                    2016</p>
                  </div>
                  <div class="legende-img">
                    <img src="image/volume11.jpg" alt="volume">
                    <p>VOLUME! </br>
                    <i>LA REPRISE</i></br>
                    Numéro 7 </br>
                    2010</p>
                  </div>
                  <div class="legende-img">
                    <img src="image/volume12.jpg" alt="volume">
                    <p>VOLUME! </br>
                    <i>BACK TO WORK</i></br>
                    Numéro 18 </br>
                    2021</p>
                  </div>
                  <div class="legende-img">
                    <img src="image/volume13.jpg" alt="volume">
                    <p>VOLUME!</br>
                    <i>PEUT-ON PARLER </br>
                    DE MUSIQUE NOIRE ?</i></br>
                    Numéro 08 </br>
                    2011</p>
                  </div>
              </div>    
          </div>    
  </main>

    <?php
      require ('footer.php');
    ?>
