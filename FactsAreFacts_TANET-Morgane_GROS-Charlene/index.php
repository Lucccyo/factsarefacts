<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/95f48b9c6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="PageDeStyle.css">
        <link rel="stylesheet" href="include/search_style.css">
        <link rel="stylesheet" href="include/Bar_style.css">
        <link rel="stylesheet" href="include/themeBar_style.css">
        <link rel="stylesheet" href="include/button_style.css">
        <link rel="stylesheet" href="include/fileActu_style.css">
        <link rel="stylesheet" href="include/footer_style.css">
        <title>Facts Are Facts</title>
        <link id="icon" rel="icon" type="png" href="img/icone-FAF-barre.png">
    </head>
    <body>
        
        <nav class="myBar">
            <ul class="myBar-nav">

                <li class="logo-hidden">
                    <a href="#" class="nav-link">
                    <img src="img/Facts are Facts.png" alt="Logo Facts Are Facts">
		    </a>
                </li>

                <div id="user-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                        <img src="img/Facts are Facts.png" alt="Icone de Facts Are Facts">
		       </a>
                    </li>
                    <div class="connect-nav">
                        <li class="nav-item">
                            <a href="Connection.php" class="nav-link">
                                <button type="button" class="btn sign">Se connecter</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="register.php" class="nav-link">
                                <button type="button" class="btn sign">S'inscrire</span>
                            </a>
                        </li>
                    </div>  
                </div>
            </ul>
        </nav>

        <?php include 'include/themeBar.php' ?>

        <?php include 'include/search.php' ?>

        <?php include 'include/fileActuMain.php' ?>

        <?php include 'include/footer.php' ?>

    </body>
    <footer>

    </footer>
</html>
