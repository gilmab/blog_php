<?php

function get_post() {

    global $db ;

    $req = $db->query("
       
    SELECT post.id,
           post.title,
           post.image,
           post.date,
           post.content ,
           admins.name
    FROM post
    JOIN admins
    ON post.writer=admins.email
    WHERE posted='1'
    ORDER BY date DESC 
    LIMIT 0,2
    ") ; 

    $results = array() ;

    while($rows = $req->fetchObject()){
        $results[] = $rows ;
    }

    return $results ; 

}
