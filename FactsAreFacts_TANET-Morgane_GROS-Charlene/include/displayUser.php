<?php $pseudo = $user['pseudo']; ?>
    <div class="user_item">
        <a href="profileUser.php?pseudoClic=<?php echo $pseudo ?>">
            <div class="content">
                <div class="imgUser">
                    <img src="img/PDP-defaut.png" alt="image par defaut de profile">
                </div>
                <div class="pseudoUser">
                    <p><?= $pseudo;
                    ?></p>
                </div>
            </div>
        </a>
    </div>

