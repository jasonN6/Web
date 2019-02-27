<?php
function get_clubs() {
    global $db;
    $query = 'SELECT * FROM clubs
              ORDER BY club_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_club_name($club_id) {
    global $db;
    $query = 'SELECT * FROM clubs
              WHERE club_id = :club_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':club_id', $club_id);
    $statement->execute();    
    $club = $statement->fetch();
    $statement->closeCursor();    
    $club_name = $club['tournament_id'];
    return $club_name;
}

function add_club($club_name,$no_of_players) {
    global $db;
    $query = 'INSERT INTO clubs(club_name,no_of_players) 
            VALUES (:club_name, :no_of_players)';
    $statement = $db->prepare($query);
    $statement->bindValue(':club_name', $club_name);
    $statement->bindValue(':no_of_players',$no_of_players);
    $statement->execute();  
    $statement->closeCursor();    
}

function delete_club($club_id) {
    global $db;
    $query = 'DELETE FROM clubs
              WHERE club_id = :club_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':club_id', $club_id);
    $statement->execute();
    $statement->closeCursor();
}
?>

