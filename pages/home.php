<h1> Page d'acceuill </h1>
<div class="row">

<?php 

$posts = get_post() ;

//Ici on récupère les données que l'on a pris dans home.func.php
foreach($posts as $pos){
    ?>
    <div class="col l6 m6 s12">
            <div class="card">
                <div class="card-content">
                    <h5 class="grey-text text-darken-2"> <?= $pos->title  ?> </h5>
                    <h6 class="grey-text">
                         Le <?= date("d/m/Y à H:i", strtotime($pos->date) ) ; ?> 
                         par <?= $pos->name  ?>
                
                    </h6>
                </div>
                  <div class="cart-image waves-effect waves-block waves-light">
                       <img src="img/posts/<?= $pos->image ?>" class="activator" alt="<?= $pos->title ?>" height="300px" width="500px" />
                  </div>
                     <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">
                                <i class="material-icons right">more_vert</i> 
                            </span>
                            <p><a href="index.php?page=post&id=<?= $pos->id ?>"> Voir l'article complet </a> </p>
                     </div>
                     <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"> 
                                    <?= $pos->title ?> <i class="material-icons right"> close</i>
                            </span>
                            <p> <?= substr(nl2br($pos->content), 0,1000) ; ?> </p>
                    </div>
            </div>
    </div>

<?php
}

?>

</div>