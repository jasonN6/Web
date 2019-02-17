<?php
function get_tournaments() {
    global $db;
    $query = 'SELECT * FROM tournaments
              ORDER BY tournament_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_tournament_name($tournament_id) {
    global $db;
    $query = 'SELECT * FROM tournaments
              WHERE tournament_id = :tournament_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':tournament_id', $tournament_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_name = $category['tournament_id'];
    return $category_name;
}

function add_tournament($tournament_name,$start_date,$end_date) {
    global $db;
    $query = 'INSERT INTO tournaments (tournament_name,start_date,end_date)
              VALUES (:tournament_name,:start_date,:end_date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':tournament_name', $$tournament_name);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_tournament($tournament_id) {
    global $db;
    $query = 'DELETE FROM categories
              WHERE tournament_id = :tournament_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tournament_id', $tournament_id);
    $statement->execute();
    $statement->closeCursor();
}
?>