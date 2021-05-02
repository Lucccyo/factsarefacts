<?php session_start(); 
include 'conf/database.php';
global $db;

$pseudoActu = $_SESSION['pseudo'];
$reponse = $db->query("SELECT * FROM utilisateur WHERE pseudo = '$pseudoActu'");
$donnees = $reponse->fetch();           //on cherche dans la base de donnee le numUser de l'utilisateur en cours
$resultUserId = $donnees['numUser'];

$reponse = $db->query("SELECT * FROM theme NATURAL JOIN utilisateur WHERE numUser = '$resultUserId'");
$donnees = $reponse->fetch();           //on cherche dans la base de donnee les couleurs liée au theme choisi par l'utilisateur
$light = $donnees['light'];
$semiLight = $donnees['semiLight'];
$color = $donnees['color'];
$txt = $donnees['txt'];
$foncé = $donnees['foncé'];
$backPost = $donnees['backPost'];
$background = $donnees['background'];

// on cherche et affiche les utilisateurs ayant dans leur pseudo le mot entré dans la barre de recherche par l'utilisateur
$allUser = $db->query("SELECT * FROM utilisateur ORDER BY numUser DESC");
if(isset($_GET['mot']) AND !empty($_GET['mot']))
{
    $recherche = htmlspecialchars($_GET['mot']);
    $allUser = $db->query('SELECT pseudo FROM utilisateur WHERE pseudo LIKE "%'.$recherche.'%" ORDER BY numUser DESC');
}

?>

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
    <body style="
    --peach-backPost :<?php echo $backPost; ?>;
    --peach-light :<?php echo $light; ?>;
    --peach-semiLight :<?php echo $semiLight; ?>;
    --peach-color :<?php echo $color; ?>;
    --txt-peach :<?php echo $txt; ?>;
    --txt-foncé :<?php echo $foncé; ?>;
    --back :<?php echo $background; ?>;
    ">
        
        <?php include 'include/userBar.php'?>

        <?php include 'include/themeBar.php' ?>

        <?php include 'include/search.php' ?>

                    <!-- on affiche les utilisateurs -->
                    <section class="afficher">
                        <?php
                            if($allUser->rowCount() > 0)
                            {
                                while($user = $allUser->fetch())
                                {
                                    include 'include/displayUser.php';
                                }
                            }else{
                                ?>
                                <p>Aucun utilisateur trouvé</p>
                                <?php
                            }
                        ?>
                    </section>
        
    </body>
    <footer>
    </footer>
</html>
