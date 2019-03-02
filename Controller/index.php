<?php
require('../model/database.php');
require('../model/players_db.php');
require('../model/tournaments_db.php');
require('../model/clubs_db.php');

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
} else if ($action == 'update_players') {
    $p_id = filter_input(INPUT_POST, 'p_id', 
            FILTER_VALIDATE_INT);
    $t_id = filter_input(INPUT_POST, 't_id', 
            FILTER_VALIDATE_INT);
    $p_name = filter_input(INPUT_POST, 'p_name');
    $Score = filter_input(INPUT_POST, 'Score', FILTER_VALIDATE_FLOAT);
    $Age = filter_input(INPUT_POST, 'Age', FILTER_VALIDATE_INT);

    // Validate the inputs
    if ($t_id == NULL || 
            $t_id == FALSE || $p_name == NULL || $Score == NULL 
            || Age == NULL || Age == FALSE) {
        $error = "Invalid player data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_player($p_id, $t_id, $p_name, $Score,$Age);

        // Display the Player List page for the current tournament
        header("Location: .?tournament_id=$t_id");
    }
} else if ($action == 'delete_players') {
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
    $age = filter_input(INPUT_POST, 'age',FILTER_VALIDATE_INT);
    if ($tournament_id == NULL || $tournament_id == FALSE 
            /*|| $price == NULL || $price == FALSE*/) {
        $error = "Invalid player data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_player($tournament_id, $name, $score,$age /*$price*/);
        header("Location: .?tournament_id=$tournament_id");
    }
} else if ($action == 'list_tournaments') {
    $tournaments = get_tournaments();
    include('tournaments_list.php');
} else if ($action == 'add_tournament') {
    $tournament_name = filter_input(INPUT_POST, 'tournament_name');
    $start_date = filter_input(INPUT_POST, 'start_date');
    $end_date = filter_input(INPUT_POST, 'end_date');
    // Validate inputs
    if ($tournament_name == NULL || $start_date == NULL || $end_date == NULL) {
        $error = "Invalid tournament data. Check fields and try again.";
        include('../errors/error.php');
    } else {
        add_tournament($tournament_name,$start_date,$end_date);
       header('Location: .?action=list_tournaments');  // display the Category List page
    }
} else if ($action == 'delete_tournaments') {
    $tournament_id = filter_input(INPUT_POST, 'tournament_id', 
            FILTER_VALIDATE_INT);
   
    delete_tournament($tournament_id);
    header('Location: .?action=list_tournaments');      // display the Category List page
}
else if ($action == 'delete_playersfromtournament') {
    $tournament_id = filter_input(INPUT_POST, 'tournament_id', 
            FILTER_VALIDATE_INT);
    delete_playerbyTournament($tournament_id);
    
    header('Location: .?action=list_tournaments');      // display the Category List page
}
else if ($action == 'list_clubs') {
    $clubs = get_clubs();
    include('../Clubs/clubs_list.php');
}
else if ($action == 'add_club') {
    $club_name = filter_input(INPUT_POST, 'club_name');
    $no_of_players = filter_input(INPUT_POST, 'no_of_players');
   
    // Validate inputs
    if ($club_name == NULL || $no_of_players == NULL ) {
        $error = "Invalid club fields. Check fields and try again.";
        include('../errors/error.php');
    } else {
        add_club($club_name,$no_of_players);
       header('Location: .?action=list_clubs');  // display the Category List page
    }
} else if ($action == 'delete_clubs') {
    $club_id = filter_input(INPUT_POST, 'club_id', 
            FILTER_VALIDATE_INT);
   
    delete_club($club_id);
    header('Location: .?action=list_clubs');      // display the Category List page
}
?>