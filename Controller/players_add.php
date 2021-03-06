<?php include '../view/header.php'; ?>
<main>
    <h1>Add Player</h1>
    <form action="index.php" method="post" id="add_player_form">
        <input type="hidden" name="action" value="add_players">

        <label>Tournament:</label>
        <select name="tournament_id">
        <?php foreach ( $tournaments as $tournament ) : ?>
            <option value="<?php echo $tournament['tournament_id']; ?>">
                <?php echo $tournament['tournament_name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Name:</label>
        <input type="input" name="player_name">
        <br>

        <label>Score:</label>
        <input type="input" name="score">
        <br>
        
        <label>Age:</label>
        <input type="input" name="age">
        <br>
       

        <label>&nbsp;</label>
        <input type="submit" value="Add Player">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_players">View Product List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>