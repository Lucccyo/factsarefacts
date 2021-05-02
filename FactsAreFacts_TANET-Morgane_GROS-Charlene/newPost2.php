<?php
    session_start(); 
    include 'upload_image.php';
    global $db;

$pseudoActu = $_SESSION['pseudo'];
$reponse = $db->query("SELECT * FROM utilisateur WHERE pseudo = '$pseudoActu'");
$donnees = $reponse->fetch();           //on cherche dans la base de donnee le numUser de l'utilisateur en cours
$resultUserId = $donnees['numUser'];

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
        <title>Facts Are Facts</title>
        <link id="icon" rel="icon" type="png" href="img/icone-FAF-barre.png">
        <link rel="stylesheet" href="NouveauPost_style.css">
        <link rel="stylesheet" href="PageDeStyle.css">
        <link rel="stylesheet" href="include/Bar_style.css">
        <link rel="stylesheet" href="include/button_style.css">
    </head>
    <body style="
    --peach-light :<?php echo $light; ?>;
    --peach-semiLight :<?php echo $semiLight; ?>;
    --peach-color :<?php echo $color; ?>;
    --txt-peach :<?php echo $txt; ?>;
    --txt-foncé :<?php echo $foncé; ?>;
    --back :<?php echo $background; ?>;
    ">
        <?php include 'include/userBar.php' ?> 

        <form action="" method="post" enctype="multipart/form-data">

            <div class="postForm">
                <div class="postForm-div">

                   <?php 
                   //on recupere les cookies de la page précédente comprenant les informations entrées par l'utilisateur.
                        $titre = $_COOKIE['titre']; 
                        $legende =  $_COOKIE['legende'];
                        $image = $_COOKIE['image'];
                        if(isset ($_COOKIE['url']))
                        {
                            $url = $_COOKIE['url'];
                        }
                   ?>
                    <div class="previewPost">
                        <img src="imagePost/<?php echo $image; ?>" alt="Image Preview" class="previewImage">
                        <div class="previewTxtPost">
                            <div class="titrePost">
                                <h1> <?php echo $_COOKIE['titre']; ?> </h1>
                            </div>
                            <div class="legendePost">
                                <p><?php echo $_COOKIE['legende']; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="caseP">
                        <div class="instructions">
                            <p>Sélectionnez un rôle ou un expert afin d'envoyer le post. Vous recevrez une 
                                notification quand le post aura été traité.
                            </p>
                        </div>
                        <div>
                            <div class="choix">
                                <p>Rôle : </p>
                                <div class="choixBox">
                                    @<select name="roleA" id="role-select" required>
                                        <option value="">Aucun</option>
                                        <option value="Actualités">Actualités</option>
                                        <option value="Culture">Culture</option>
                                        <option value="Géopolitique">Géopolitique</option>
                                        <option value="Histoire">Histoire</option>
                                        <option value="Mode de vie">Mode de vie</option>
                                        <option value="Sciences">Sciences</option>
                                        <option value="Numérique">Numérique</option>
                                    </select>
                                </div>

                                <p>Expert* : </p>
                                <div class="choixBox">
                                    @<select name="roleE" id="role-select">
                                        <option value="">Aucun</option>
                                        <option value="expert1">expert 1</option>
                                        <option value="expert2">expert 2</option>
                                        <option value="expert3">expert 3</option>
                                        <option value="expert4">expert 4</option>
                                        <option value="expert5">expert 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="btnSubmit">
                            <button class="btn">
                                <a href="newPost1.php" class="btnRetour">Retour</a>
                            </button>
                            <button type="submit" class="btn"  name="submitBtn">Poster</button> 
                        </div>
                    </div>
                </div>       
            </div>
        </form>
    </body>
    <footer>
    </footer>
</html>