
<nav class="myBar">
    <ul class="myBar-nav">

        <li class="logo-item">
            <a href="pageAccueil.php" class="nav-link">
                <img src="img/Facts are Facts.png" alt="Logo Facts Are Facts">
            </a>
        </li>

        <div id="user-nav">
            <li class="nav-item">
                <a href="#" class="nav-link"></a>
                <img src="img/PDP-defaut.png" alt="Icone d'utilisateur">
            </li>

            <li class="nav-item">
                <a href="pageAccueil.php" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span class="link-text">Accueil</span>
                </a>
            </li>
                    
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span class="link-text">Mes Favoris</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-envelope"></i>
                    <span class="link-text">Messages</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-bell"></i>
                    <span class="link-text">Notifications</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="profile.php" class="nav-link">
                    <i class="fas fa-user-circle"></i>
                    <span class="link-text">@<?php echo $_SESSION['pseudo'];?></span>
                </a>
            </li>
        </div>

        <li class="nav-item">
            <a href="colorOption.php" class="nav-link">
                <button class="btn">
                    <i class="fas fa-cogs"></i>
                </button>
            </a>
        </li>
    </ul>
</nav>

