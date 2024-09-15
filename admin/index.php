<?php

include '../functions/main-func.php' ;

// Le scandir permet de scanner un page 
$pages = scandir('pages/') ;


if(isset($_GET['page']) && !empty($_GET['page'])){
    // Si on réussit a trouver dans le dossier pages un fichier page=home.php 
    if(in_array($_GET['page'].'.php', $pages)){
        //Ici on retourne la page que l'on a demandé
         $page = $_GET['page'] ;
    }else {
        $page = "error" ;
    }
}else {
    // Si la page est vide 
    $page = "dashboard" ;
}

$pages_functions = scandir('functions/') ;

// Si je trouve la page exemple home.func.php ensuite je poursuit le traitement 
if(in_array($page.'.func.php',$pages_functions)){
    include 'functions/'.$page.'.func.php' ;
}


?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
       <title> Blog | Admin dashboard </title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <?php 
        include "body/topbar.php" ;
      ?>

         <div class="container"> 
                <!-- Ici on inclut la page que l'on a invoqué un peu plus haut  -->
                <?php
                    include 'pages/'.$page.'.php' ;
                ?>

            </div>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>
      <script type="text/javascript" src="../js/materialize.js"></script>
      <script type="text/javascript" src="../js/script.js"> </script>
     
      
    </body>
  </html>