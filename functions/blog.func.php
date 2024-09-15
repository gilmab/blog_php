<?php 


function get_posts() {

    global $db ;

    $req = $db->query("
                SELECT * FROM post 
                WHERE posted='1' 
                ORDER BY date DESC
                
                ") ;

   $results = [] ;

   while($rows = $req->fetchObject()){
       $results[] = $rows ;
   }

   return $results ;

}