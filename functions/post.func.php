<?php 

function get_posts() {

    global $db ;
 
    $req = $db->query("
       SELECT  post.id,
               post.title,
               post.image,
               post.content,
               post.date,
               admins.name
        FROM post 
        JOIN admins
        ON  post.writer = admins.email
        WHERE post.id='{$_GET['id']}'
        AND post.posted = '1'
    ") ;

    $result = $req->fetchObject() ;

    return $result  ;
}

function comment($name, $email,$comment){

        global $db ;

        $c = array(
                'name'    =>  $name,
                'email'   =>  $email,
                'comment' =>  $comment,
                'post_id' =>  $_GET["id"]

        ) ;

        $sql = "INSERT INTO comment(name, email, comment, post_id,date) 
        VALUES(:name, :email, :comment, :post_id, NOW())" ;

        $req = $db->prepare($sql) ;

        $req->execute($c) ;

}

function get_comment() {
     
    global $db ;

    $req = $db->query("SELECT * FROM comment WHERE  post_id = '{$_GET['id']}' ORDER BY DATE DESC") ;

    $results = [] ; 

    while($rows = $req->fetchObject()){
        $results[] =  $rows  ;
    }

    return $results ; 


}