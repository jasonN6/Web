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
    $tournament = $statement->fetch();
    $statement->closeCursor();    
    $tournament_name = $tournament['tournament_name'];
    return $tournament_name;
}

function add_tournament($tournament_name,$start_date,$end_date) {
    global $db;
    $query = 'INSERT INTO tournaments(tournament_name, start_date, end_date) 
            VALUES (:tournament_name, :start_date, :end_date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':tournament_name', $tournament_name);
    $statement->bindValue(':start_date',$start_date);
    $statement->bindValue(':end_date',$end_date);
    $statement->execute();  
    $statement->closeCursor();    
}

function delete_tournament($tournament_id) {
    global $db;
    $query = 'DELETE FROM tournaments
              WHERE tournament_id = :tournament_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tournament_id', $tournament_id);
    $statement->execute();
    $statement->closeCursor();
}
?>