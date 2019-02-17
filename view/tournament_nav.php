
        <nav>
            <ul>
                <!-- display links for all tournaments -->
                <?php foreach($tournaments as $tournament) : ?>
                <li>
                    <a href="?tournament_id=<?php 
                              echo $tournament['tournament_id']; ?>">
                        <?php echo $tournament['tournament_name']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

