<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Product</h1>
    <form action="index.php" method="post" id="add_player_form">

        <input type="hidden" name="action" value="update_player">

        <input type="hidden" name="player_id"
               value="<?php echo $player['player_id']; ?>">

        <label>Category ID:</label>
        <input type="category_id" name="category_id"
               value="<?php echo $player['tournament_id']; ?>">
        <br>

        <label>Code:</label>
        <input type="input" name="code"
               value="<?php echo $player['player_name']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="name"
               value="<?php echo $player['score']; ?>">
        <br>

        

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_players">View Player List</a></p>

</main>
<?php include '../view/footer.php'; ?>