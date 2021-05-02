<?php
    session_start();
    include 'conf/database.php';
    global $db;
    
    $pseudoActu = $_SESSION['pseudo'];
    $reponse = $db->query("SELECT * FROM utilisateur WHERE pseudo = '$pseudoActu'");
    $donnees = $reponse->fetch();           //on cherche dans la base de donnee le numUser de l'utilisateur en cours
    $resultUserId = $donnees['numUser'];
    
    $reponse = $db->query("SELECT * FROM theme NATURAL JOIN utilisateur WHERE numUser = '$resultUserId'");
    $donnees = $reponse->fetch();           //on cherche dans la base de donnee les informations lié au theme de l'utilisateur en cours
    $light = $donnees['light'];
    $semiLight = $donnees['semiLight'];
    $color = $donnees['color'];
    $txt = $donnees['txt'];
    $foncé = $donnees['foncé'];
    $background = $donnees['background'];
    $backPost = $donnees['backPost'];
    
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/95f48b9c6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="PageDeStyle.css">
        <link rel="stylesheet" href="include/Bar_style.css">
        <link rel="stylesheet" href="include/button_style.css">
        <link rel="stylesheet" href="include/fileActu_style.css">
        <link rel="stylesheet" href="include/search_style.css">
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
    --peach-backPost :<?php echo $backPost; ?>;
    ">
    </body>

    <?php include 'include/userBar.php' ?>


        <div class="monProfile">
            <div class="monProfile-div">
                <div class="bandeauProfile">
                    <img src="img/banniereParDefaut.png" alt="bandeau">
                </div>
                <div class="backDiv">
                    <div class="idProfile">
                        <div class="imageProfile">
                            <img src="img/PDP-defaut.png" alt="image de profile">
                        </div>
                        <div class="pseudoProfile">
                            <span>@<?php echo $_GET['pseudoClic']?></span>
                        </div>
                        <?php
                            if($pseudoActu != $_GET['pseudoClic'])
                            {
                                $pseudoUserSuivi = $_GET['pseudoClic'];
                                $reponse = $db->query("SELECT * FROM utilisateur WHERE pseudo = '$pseudoUserSuivi'");
                                $donnees = $reponse->fetch();           //on cherche dans la base de donnee le numUser de l'utilisateur suivi
                                $resultSuiviId = $donnees['numUser'];

                                ?>
                                    <div class="btnAbo">
                                    <?php
                                        $estSuivi = $db->prepare('SELECT * FROM abonnement WHERE idSuiveur = ? AND idSuivi = ?');
                                        $estSuivi->execute(array($resultUserId,$resultSuiviId));
                                        $estSuivi = $estSuivi->rowCount();
                                        if($estSuivi == 0)          //cas non suivi
                                        {
                                            ?>
                                                <a href="follow.php?userSuivi=<?= $resultSuiviId ?>" class="lienAbonnement">
                                                    <i class="fas fa-plus abonnement"></i>
                                                    <span class="abonnement">S'abonner</span>
                                                </a>
                                            <?php
                                        }elseif($estSuivi == 1)
                                        {
                                            ?>
                                            <a href="follow.php?userSuivi=<?= $resultSuiviId ?>" class="lienAbonnement">
                                                <i class="fas fa-plus abonnement"></i>
                                                <span class="abonnement">Se désabonner</span>
                                            </a>
                                        <?php
                                        }
                                    ?>
                                       
                                    </div>
                                <?php
                            }
                        ?>
                        
                        
                        <div class="corpsProfile">
                            <div class="txtProfile">
                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Eos sed, ullam facilis mollitia quos ipsam. Temporibus 
                                    placeat deleniti autem, similique laborum laboriosam. Natus, 
                                    dolore, unde optio maxime sed dicta voluptatem ex velit autem 
                                    dolores, itaque maiores minus ad ipsa necessitatibus. 
                                    Corporis laborum dolor, error tenetur quasi perferendis voluptate 
                                    dignissimos beatae. 
                                </p>
                            </div>


                           <form action="" method="post">

                                <div class="btnDiv">

                                    <button class="btn" name="publication">
                                        <span>Publications</span>
                                    </button>
                                    
                                    <button class="btn" name="favoris">
                                        <span>Favoris</span>
                                    </button>

                                    <button class="btn" name="abonnés">
                                        <span>Abonnés</span>
                                    </button>

                                    <button class="btn" name="abonnements">
                                        <span>Abonnements</span>
                                    </button>

                                </div>

                            </form>
                        


                        </div>
                    </div>

                </div>
                    <?php
                        if(isset($_POST['publication']))
                        {
                            $idPers = $resultSuiviId;
                            include "include/publications.php";
                        }



                        if(isset($_POST['abonnés']))
                        {
                            //on cherche dans la base de donnee les utilisateurs abonnés a celui en cours, et on affiche un message si il n'y en a aucun
                            $allUser = $db->prepare('SELECT U1.pseudo FROM utilisateur U1 INNER JOIN abonnement A ON A.idSuiveur = U1.numUser INNER JOIN utilisateur U2 ON A.idSuivi = U2.numUser WHERE idSuivi = ?');
                            $allUser->execute(array($resultSuiviId));

                            if($allUser->rowCount() > 0)
                            {
                                while($user = $allUser->fetch())
                                {
                                    include 'include/displayUser.php';
                                }
                            }else{
                                ?>
                                <p class="exception">Personne n'est abonné a cet utilisateur</p>
                                <?php
                            }
                        }


                        if(isset($_POST['abonnements']))
                        {
                            //on cherche dans la base de donnee les abonnements de l'utilisateur en cours, et on affiche un message si il n'y en a aucun
                            $allUser = $db->prepare('SELECT U1.pseudo FROM utilisateur U1 INNER JOIN abonnement A ON A.idSuivi = U1.numUser INNER JOIN utilisateur U2 ON A.idSuiveur = U2.numUser WHERE idSuiveur = ?');
                            $allUser->execute(array($resultSuiviId));

                            if($allUser->rowCount() > 0)
                            {
                                while($user = $allUser->fetch())
                                {
                                    include 'include/displayUser.php';
                                }
                            }else
                            {
                                ?>
                                    <p class="exception">Cet utilisateur n'est abonné a personne</p>
                                <?php
                            }
                        }
                    ?>
            </div>
        </div>
    <footer>
    </footer>
    </html>