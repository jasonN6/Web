<?php include '../view/header.php'; ?>
<main>

    <h1>Product List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <?php include '../view/tournament_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of player -->
        <h2><?php echo $tournament_name; ?></h2>
        <table>
            <tr>
                <th>Player ID</th>
                <th>Tournament ID</th>
                <th class="right">Name</th>
                <th class="right">Score</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($players as $player) : ?>
            <tr>
                <td><?php echo $player['player_id']; ?></td>
                <td><?php echo $player['tournament_id']; ?></td>
                <td class="right"><?php echo $player['player_name']; ?></td>
                <td class="right"><?php echo $player['score']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="player_id"
                           value="<?php echo $player['player_id']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $player['tournament_id']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_players">
                    <input type="hidden" name="player_id"
                           value="<?php echo $player['player_id']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $player['tournament_id']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add PLayer</a></p>
        <p><a href="?action=list_categories">List Tournaments</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>