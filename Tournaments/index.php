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
    // Get the current tournament ID
    $tournament_id = filter_input(INPUT_GET, 'tournament_id', 
            FILTER_VALIDATE_INT);
    if ($tournament_id == NULL || $tournament_id == FALSE) {
        $tournament_id = 1;
    }
    
    // Get player and tournament data
    $tournament_name = get_tournament_name($tournament_id);
    $tournaments = get_tournaments();
    $players = get_players_by_tournament($tournament_id);

    // Display the player list
    include('players_list.php');
} else if ($action == 'show_edit_form') {
    $player_id = filter_input(INPUT_POST, 'player_id', 
            FILTER_VALIDATE_INT);
    if ($player_id == NULL || $player_id == FALSE) {
        $error = "Missing or incorrect player id.";
        include('../errors/error.php');
    } else { 
        $player = get_player($player_id);
        include('players_edit.php');
    }
} else if ($action == 'update_player') {
    $player_id = filter_input(INPUT_POST, 'player_id', 
            FILTER_VALIDATE_INT);
    $tournament_id = filter_input(INPUT_POST, 'tournament_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'player_name');
    $score = filter_input(INPUT_POST, 'score', FILTER_VALIDATE_FLOAT);

    // Validate the inputs
    if ($player_id == NULL || $player_id == FALSE || $tournament_id == NULL || 
            $tournament_id == FALSE || $name == NULL || $score == NULL 
            ) {
        $error = "Invalid player data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_player($player_id, $tournament_id, $name, $score);

        // Display the Player List page for the current tournament
        header("Location: .?tournament_id=$tournament_id");
    }
} else if ($action == 'delete_player') {
    $player_id = filter_input(INPUT_POST, 'player_id', 
            FILTER_VALIDATE_INT);
    $tournament_id = filter_input(INPUT_POST, 'tournament_id', 
            FILTER_VALIDATE_INT);
    if ($player_id == NULL || $player_id == FALSE) {
        $error = "Missing or incorrect player id or tournament id.";
        include('../errors/error.php');
    } else { 
        delete_player($player_id);
        header("Location: .?tournament_id=$tournament_id");
    }
} else if ($action == 'show_add_form') {
    $tournaments = get_tournaments();
    include('players_add.php');
} else if ($action == 'add_players') {
    $tournament_id = filter_input(INPUT_POST, 'tournament_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'player_name');
    $score = filter_input(INPUT_POST, 'score',FILTER_VALIDATE_FLOAT);
   
    if ($tournament_id == NULL || $tournament_id == FALSE 
            /*|| $price == NULL || $price == FALSE*/) {
        $error = "Invalid player data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_player($tournament_id, $name, $score /*$price*/);
        header("Location: .?tournament_id=$tournament_id");
    }
} else if ($action == 'list_tournaments') {
    $tournaments = get_tournaments();
    include('tournament_list.php');
} else if ($action == 'add_tournament') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid tournament name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_tournament($name);
        header('Location: .?action=list_tournaments');  // display the Category List page
    }
} else if ($action == 'delete_tournament') {
    $tournament_id = filter_input(INPUT_POST, 'tournament_id', 
            FILTER_VALIDATE_INT);
    delete_tournament($tournament_id);
    header('Location: .?action=list_tournaments');      // display the Category List page
}
?>