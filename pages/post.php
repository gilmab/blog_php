<h3> Page des poste   </h3>

<?php 
// Ici dans cette variable on prends toute les informations contenu dans post.func.php
$post = get_posts() ;
//Si il n'ya pas de donnée dans la variable poste 
if($post == false ){
    // Si la variable $post est vide je la renvoie vers la page error
    header("Location:index.php?page=error") ;
}else {
    ?>
        </div>
        
        <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title ?>" height="340px" width="100%" />

       
        <div class="container">

        <h4> <?= $post->title ?> </h4>
        <h6> Par <?= $post->name ?> le <?= date("d/m/Y à H:i", strtotime($post->date)) ?> </h6>

        <p> <?= nl2br($post->content) ; ?> </p>

<?php

}

?>

<hr> 

<h4> Commentaires: </h4>
<?php 
   // Ici on parcours les donée que l'on extrait de la fonction get comment
    $responses = get_comment() ; 

    if($responses != false){
        foreach($responses as $com ){
                ?>
                    <blockquote> 
                        <strong> <?=  $com->name ?> (<?= date("d/m/Y", strtotime($com->date)) ?>) </strong>
        
                        <p> <?= nl2br($com->comment) ?> </p>
                    </blockquote>
                <?php
        
            }

    }else {
        echo "Aucun commentaire pour le moment"  ;
    }


?>


<h4> Commenter :</h4>*

<?php
        if(isset($_POST['submit'])){

                $name = htmlspecialchars(trim($_POST['name'])) ;
                $email = htmlspecialchars(trim($_POST['email'])) ;
                $comment = htmlspecialchars(trim($_POST['comment'])) ;
                $errors = [] ;

                // On verifie qu'il ne sont pas vide 
                if (empty($name) || empty($email) || empty($comment)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis" ;
                }else {
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                $errors['email'] = "email pas valide du tout" ;
                        }

                }
                
                if(!empty($errors)){
                        ?>
                          <div class="card red">
                                <div class="card-content white-text">
                                        <?php 
                                           foreach($errors as $err){
                                                echo $err."<br />" ;
                                           }
                                        ?>
                                </div>
                          </div>
                        <?php

                }else{
                        comment($name, $email, $comment) ;
                        ?>
                                <script>
                                        window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>") ;
                                </script>
                        <?php
                }


        }

?>

<form method="post" >
    <div class="row"> 
        <div class="input-field col s12 m6">
                <input type="text" name="name" id="name" />
                <label for="name">Nom</label>
        </div>
        <div class="input-field col s12 m6">
                         <input type="email" name="email" id="email" />
                         <label for="email"> Adresse email</label>
        </div>
        <div class="input-field col s12">
                 <textarea name="comment" id="comment" class="materialize-textarea" > </textarea>
                 <label for="comment"> comment</label>
        </div>
        <div class="col-s12">
                <button type="submit" name="submit" class="btn waves-effect"> Commenter ce post </button>
        </div>
    </div>

</form


