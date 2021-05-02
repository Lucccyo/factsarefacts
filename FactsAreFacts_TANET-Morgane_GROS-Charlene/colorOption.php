<?php session_start(); 
    include 'conf/database.php';
    global $db;

    $pseudoActu = $_SESSION['pseudo'];
    $reponse = $db->query("SELECT * FROM utilisateur WHERE pseudo = '$pseudoActu'");
    $donnees = $reponse->fetch();           //on cherche dans la base de donnee le numUser de l'utilisateur en cours
    $resultUserId = $donnees['numUser'];


    if(isset($_POST['themeBleu']))
    {
        $db->exec("UPDATE utilisateur SET idTheme = '1' WHERE numUser = '$resultUserId'");

    }elseif(isset($_POST['themePeche']))
    {
        $db->exec("UPDATE utilisateur SET idTheme = '2' WHERE numUser = '$resultUserId'");

    }elseif(isset($_POST['themeRose']))
    {
        $db->exec("UPDATE utilisateur SET idTheme = '3' WHERE numUser = '$resultUserId'");

    }elseif(isset($_POST['themeVert']))
    {
        $db->exec("UPDATE utilisateur SET idTheme = '4' WHERE numUser = '$resultUserId'");

    }elseif(isset($_POST['themeViolet']))
    {
        $db->exec("UPDATE utilisateur SET idTheme = '5' WHERE numUser = '$resultUserId'");
    }

    $reponse = $db->query("SELECT * FROM theme NATURAL JOIN utilisateur WHERE numUser = '$resultUserId'");
    $donnees = $reponse->fetch(); 
    $light = $donnees['light'];
    $semiLight = $donnees['semiLight'];
    $color = $donnees['color'];
    $txt = $donnees['txt'];
    $foncé = $donnees['foncé'];
    $background = $donnees['background'];


?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/95f48b9c6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="include/Bar_style.css">
        <link rel="stylesheet" href="include/button_style.css">
        <link rel="stylesheet" href="PageDeStyle.css">
	<link rel="stylesheet" href="animation_style.css">
        <title>Facts Are Facts</title>
        <link id="icon" rel="icon" type="png" href="img/icone-FAF-barre.png">
    </head>
    <body style="
    --peach-light :<?php echo $light; ?>;
    --peach-semiLight :<?php echo $semiLight; ?>;
    --peach-color :<?php echo $color; ?>;
    --txt-peach :<?php echo $txt; ?>;
    --txt-foncé :<?php echo $foncé; ?>;
    --back :<?php echo $background; ?>;
    ">
        <?php include 'include/optionBar.php'?>

        <form action="" method="POST">
            <div class="optionColor">
                <div class="contents">
                    <div class="titre">
                        <h1>Couleurs</h1>
                    </div>

                    <div class="choixColor">
                            <button class="theme btn" type="submit" name="themeBleu" style="background-color: var(--back);">
                                <img src="img/darkTheme.png" alt="themeBleu">
                            </button>

                            <button class="theme btn" type="submit" name="themeRose" style="background-color: var(--back)">
                                <img src="img/darkBlueTheme.png" alt="themeRose">
                            </button>

                            <button class="theme btn" type="submit" name="themePeche" style="background-color: var(--back)">
                                <img src="img/peachTheme.png" alt="themePeche">
                            </button>

                            <button class="theme btn" type="submit" name="themeVert" style="background-color: var(--back)">
                                <img src="img/greenTheme.png" alt="themeVert">
                            </button>

                            <button class="theme btn" type="submit" name="themeViolet" style="background-color: var(--back)">
                                <img src="img/lightBlueTheme.png" alt="themeViolet">
                            </button>

                    </div>

                </div>
                
            </div>
        </form>
        
        
    </body>
    <footer>

    </footer>
</html>
