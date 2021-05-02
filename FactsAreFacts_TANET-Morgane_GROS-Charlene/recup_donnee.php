<?php
    if(isset($_POST['submit'])) {
        extract($_POST);
        if(!empty($pseudo) && !empty($password) && !empty($mail) && !empty($langue)) {

            //on crypte le mot de passe afin quil ne soit pas visible par l'administateur de la base de donnée
            $options = [ 'cost' => 12,];
            $passHash = password_hash($password, PASSWORD_BCRYPT, $options);

            include 'conf/database.php';
            global $db;

            $c = $db->prepare("SELECT eMail FROM utilisateur WHERE eMail = :mail");
            $c->execute(['mail' => $mail]);
            $result = $c->rowCount();

            //on ajoute le nouvel utilisateur si tout se passe bien, et si l'e-mail n'existe pas deja, sinon on affiche un message d'erreur
            if($result == 0) {
                $query = $db->prepare("INSERT INTO utilisateur (pseudo, password, eMail, langue, expert, idTheme) VALUES (:pseudo, :password, :mail, :langue, :expert, :idTheme)");
                $result = $query->execute([
                'pseudo' => $pseudo,
                'password' => $passHash,
                'mail' => $mail,
                'langue' => $langue,
                'expert' => '0',
                'idTheme' => 2
            ]);
                $message = "Votre compte a été créé avec succés! Vous pouvez a présent vous connecter.";
            }else {
                $message = "Cet e-mail existe déja. Veuillez vous connecter avec.";
            }
   
        } else
            echo 'Les champs ne sont pas tous remplies';
    }  
    
?>

<!DOCTYPE html>
 <html lang="fr">
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/95f48b9c6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="PageDeStyle.css">
        <link rel="stylesheet" href="include/button_style.css">
        <title>S'inscrire</title>
        <link id="icon" rel="icon" type="png" href="img/icone-FAF-barre.png">
    </head>
    <body>
        <div class="confirmation-form">
            <div class="confirmation-bloc">
                <div class="informations">
                    <div class="logo-bloc">
                        <img src="img/Facts are Facts.png" alt="logo Fact Are Facts">
                    </div>
                    <div class="confirmation-inscr">
                        <h1>Statut de création de votre compte</h1>
                        <p> <?php echo $message; ?> </p>
                    </div>
                    <div class="btnPageAccueil">
                        <a href="pagePrincipale.php">
                            <button type="button" class="btn">Retourner à la page d'accueil</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>