<?php include '../view/header.php'; ?>
<main>
    <aside>
        <!-- display a list of categories -->
        <h2>Tournaments</h2>
        <?php include '../view/tournament_nav.php'; ?>        
    </aside>
    <section>
        <h1><?php echo $tournament_name; ?></h1>
        <ul class="nav">
            <!-- display links for players in selected tournament -->
            <?php foreach ($players as $player) : ?>
            <li>
                <a href="?action=view_player&amp;player_id=<?php 
                          echo $player['player_id']; ?>">
                    <?php echo $player['player_name']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include '../view/footer.php'; ?>