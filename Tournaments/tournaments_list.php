<?php include '../view/header.php'; ?>
<main>

    <h1>Tournaments List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($tournaments as $tournament) : ?>
        <tr>
            <td><?php echo $tournament['tournament_name']; ?></td>
        <td><?php echo $tournament['start_date']; ?></td>
            <td><?php echo $tournament['end_date']; ?></td>
            <td>
                <form id="delete_player_form"
                      action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_tournaments">
                    <input type="hidden" name="tournament_id"
                           value="<?php echo $tournament['tournament_id']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Tournaments</h2>
    <form id="add_tournament_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_tournament">

        <label>Name:</label>
        <input type="input" name="tournament_name"><br>
            <label>Start_date:</label>
        <input type="input" name="start_date"><br>
        <label>End Date:</label>
        <input type="input" name="end_date"><br>
        <input type="submit" value="Add">
    </form>

    <p><a href="index.php?action=list_players">List Players</a></p>

</main>
<?php include '../view/footer.php'; ?>
