<h1> Le blog </h1>

<?php 

$posts = get_posts() ;

foreach($posts as $post){
   ?>
    <div class="row">
        <div class="col s12 m12 l12">
                <h4> <?= $post->title ?> </h4>

                <div class="row">
                    <div class="col s12 m6 l8">
                        <?= substr(nl2br($post->content),0,1000) ?>...
                    </div>
                    <div class="col s12 m6 l4"> 
                            <img src="img/posts/<?= $post->Image ?>" 
                            class="materialboxed responsive-img" 
                            alt="<?= $post->title ?>" height="300px" width="300px"
                            
                            />
                            <br />
                            <br />
                            <a class="btn light-blue waves-effect waves-light" href="index.php?page=post&id=<?= $post->id ?>">Lire l'article complet</a>
                    </div>
                </div>

        </div>
    </div>

   <?php
}
  ?>

