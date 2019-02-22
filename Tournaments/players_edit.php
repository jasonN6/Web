<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Player</h1>
    <form action="index.php" method="post" id="add_player_form">
        <?php $tournaments = get_tournaments();?>
        <input type="hidden" name="action" value="update_players">

       <input type="hidden" name="p_id"
               value="<?php echo $player['player_id']; ?>">

        <label>Tournament:</label>
             <select name="t_id">
       <?php foreach ( $tournaments as $t ) : ?>
            <option value="<?php echo $t['tournament_id']; ?>">
                <?php echo $t['tournament_name']; ?>
            </option>
        <?php endforeach; ?>
            </select>
        <br>
        <label>Name:</label>
        <input type="input" name="p_name"
               value="<?php echo $player['player_name']; ?>">
        <br>

        <label>Score:</label>
        <input type="input" name="Score"
               value="<?php echo $player['score']; ?>">
        <br>
       
        

        <label>&nbsp;</label>
        <input type="submit" value="Save">
        <br>
    </form>
    <p><a href="index.php?action=list_players">View Player List</a></p>

</main>
<?php include '../view/footer.php'; ?>