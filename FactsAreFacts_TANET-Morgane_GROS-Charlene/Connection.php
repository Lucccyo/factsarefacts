<?php
    session_start();

    if(isset($_POST['submitBtn'])) {
        extract($_POST);

        include 'conf/database.php';
        global $db;

        if(!empty($pseudo) && !empty($password)) {

            $query = $db->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo");
            $query->execute(['pseudo' => $pseudo]);
            $result = $query->fetch();

            if($result == true) {
                //on compare le mot de passe entré a celui de la base de donne pour tel pseudo
                $passHash = $result['password'];
                if(password_verify($password,$passHash)) {
                    echo "Connexion...";

                    $_SESSION['pseudo'] = $result['pseudo'];
                    header('Location: pageAccueil.php');
                    $msgError = "";
                    exit();

                }else {
                    $msgError = "ATTENTION Mot de passe erroné.";
                }

            }else {
                $msgError = "ATTENTION Ce compte n'existe pas.";
            }

        }else {
            $msgError = "Veuillez remplir tout les champs.";
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/95f48b9c6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="PageDeStyle.css">
        <link rel="stylesheet" href="include/button_style.css">
        <title>Se connecter</title>
        <link id="icon" rel="icon" type="png" href="img/icone-FAF-barre.png">
    </head>
    <body>
    <form method="POST">
            <div class="connect-form">
                <div class="connect-bloc">
                    <div class="topBarConnect">
                        <div class="logo-div">
                            <img src="img/Facts are Facts.png" alt="Logo Facts are Facts">
                        </div>
                        <div class="btnReturn">
                            <a href="pagePrincipale.php">
                                <button type="button" class="btn">Retour</button>
                            </a>
                           
                        </div>
                    </div>
                    
                    <div class="info-blocConnect">
                        <div class="msgErrEventuel">
                            <p> <?php if(isset($_POST['submitBtn'])) {
                                         echo $msgError; 
                                       } ?> </p>
                        </div>
                        <div class="info-logs">
                            <div class="logs-bloc">
                                <h1>Se connecter</h1>
                                <input type="text" class="input-field" placeholder="Nom d'utilisateur" name="pseudo" required>
                                <input type="password" class="input-field" placeholder="Mot De Passe" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="btnSubmit">
                        <button type="submit" class="btn" name="submitBtn">Se connecter</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>