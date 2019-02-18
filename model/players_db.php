<?php
function get_players() {
    global $db;
    $query = 'SELECT * FROM players
              ORDER BY players_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function get_players_by_tournament($tournament_id) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE players.tournament_id = :tournament_id
              ORDER BY player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":tournament_id", $tournament_id);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function get_player($player_id) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE player_id = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":player_id", $player_id);
    $statement->execute();
    $player = $statement->fetch();
    $statement->closeCursor();
    return $player;
}

function delete_player($player_id) {
    global $db;
    $query = 'DELETE FROM players
              WHERE player_id = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_player($tournament_id, $player_name, $score) {
    global $db;
    $query = 'INSERT INTO players
                 (tournament_id, player_name, score)
              VALUES
                 (:tournament_id, :player_name, :score)';
    $statement = $db->prepare($query);
    $statement->bindValue(':tournament_id', $tournament_id);
    $statement->bindValue(':player_name', $player_name);
    $statement->bindValue(':score', $score);
    $statement->execute();
    $statement->closeCursor();
}

function update_player($p_id, $t_id, $p_name, $Score) {
    global $db;   
    $query = 'UPDATE players SET tournament_id = :t_id, player_name = :p_name,score = :Score,                 
               WHERE player_id = :p_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':t_id', $t_id);
    $statement->bindValue(':p_name', $p_name);
    $statement->bindValue(':Score', $Score);  
    $statement->bindValue(':p_id', $p_id);
    $statement->execute();
    $statement->closeCursor();
}
?>