<?php include '../view/header.php'; ?>
<main>

    <h1>Clubs List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>NO.of players</th>
            <th>Delete</th>

            
        </tr>
        <?php foreach ($clubs as $club) : ?>
        <tr>
            <td><?php echo $club['club_name']; ?></td>
        <td><?php echo $club['no_of_players']; ?></td>
            
            <td>
                <form id="delete_player_form"
                      action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_clubs">
                    <input type="hidden" name="club_id"
                           value="<?php echo $club['club_id']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
            
            
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Clubs</h2>
    <form id="add_tournament_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_club">

        <label>Name:</label>
        <input type="input" name="club_name"><br>
            <label>No.of players:</label>
        <input type="input" name="no_of_players"><br>
       
        <input type="submit" value="Add">
    </form>

    <p><a href="index.php?action=list_players">List Players</a></p>

</main>
<?php include '../view/footer.php'; ?>


