<?php
require('../model/database.php');
require('../model/players_db.php');
require('../model/tournaments_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_players';
    }
} 

if ($action == 'list_players') {
    $tournament_id = filter_input(INPUT_GET, 'tournament_id', 
            FILTER_VALIDATE_INT);
    if ($tournament_id == NULL || $tournament_id == FALSE) {
        $tournament_id = 1;
    }
    $tournaments = get_tournaments();
    $tournament_name = get_tournament_name($tournament_id);
    $players = get_players_by_tournament($tournament_id);

    include('players_list.php');
} else if ($action == 'view_player') {
    $player_id = filter_input(INPUT_GET, 'player_id', 
            FILTER_VALIDATE_INT);   
    if ($player_id == NULL || $player_id == FALSE) {
        $error = 'Missing or incorrect player id.';
        include('../errors/error.php');
    } else {
        $tournaments = get_tournaments();
        $player = get_player($player_id);

        // Get player data
        $name = $player['player_name'];
        $score = $player['score'];
        $age = $player['age'];

        // Calculate discounts
       

        include('players_view.php');
    }
}
?>