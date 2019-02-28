<?php include '../view/header.php'; ?>
<main>
    <aside>
        <h1>Tournaments</h1>       
        <?php include '../view/tournament_nav.php'; ?>
    </aside>
    <section>
        <br>
        <br>
        <h1><?php echo $name; ?></h1>
       

        <div id="right_column">
            <p><b>Player Name:</b> <?php echo $name; ?></p>
            <p><b>Score:</b> <?php echo $score; ?></p>
            <p><b>Age:</b> <?php echo $age; ?></p>
            
        </div>
    </section>
</main>
<?php include '../view/footer.php'; ?>