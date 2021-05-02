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
        <form action="recup_donnee.php" method="POST">
            <div class="register-form">
                <div class="register-bloc">
                    <div class="topBar">
                        <div class="logo-div">
                            <img src="img/Facts are Facts.png" alt="Logo Facts are Facts">
                        </div>
                        <div class="btnReturn">
                            <a href="index.php">
                                <button type="button" class="btn">Retour</button>
                            </a>
                            
                        </div>
                    </div>
                    
                    <div class="info-bloc">

                        <div class="info-logs">
                            <div class="logs-bloc">
                                <h1>Créez votre compte</h1>
                            <input type="text" class="input-field" placeholder="Nom d'utilisateur" name="pseudo" required>
                            <input type="password" class="input-field" placeholder="Mot de passe" name="password" required>
                            <input type="email" pattern="*@\.*" class="input-field" placeholder="E-mail" name="mail" required>
                            </div>
                            <div class="pays-bloc">
                                <p>Cette information ne sera pas affichée publiquement. Elle nous permet d'améliorer notre application.</p>
                                    <select name="langue" id="langue-select" required>
                                    <option value="">Selectionner votre langue...</option>
                                    <option value="francais">Français</option>
                                    <option value="allemand">Allemand</option>
                                    <option value="anglais">Anglais</option>
                                    <option value="espagnol">Espagnol</option>
                                    <option value="Chinois">Chinois</option>
                                    <option value="italien">Italien</option>
                                </select>
                            </div>
                        </div>
                        <div class="expertBool-bloc">
                            <p id="txtPrincipal">Je souhaite demander la certification d'expert. <br> NB: Si vous scliquez sur "oui", votre profil nous sera envoyé et apres une étude nous vous ferons savoir si vous êtes apte au rôle d'expert</p>
                            <div>
                                <input class="btnRadio" type="radio" id="yes" name="expert" value="yes">
                                <label for="yes">Oui</label>
                            </div>
                            
                            <div>
                                <input class="btnRadio" type="radio" id="no" name="expert" value="no" checked>
                                <label for="no">Non</label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="btnSubmit">
                        <button type="submit" class="btn" name="submit">S'inscrire</button>
                    </div>
                </div>
            </div>
            
        </form>
        
    </body>
    <footer>

    </footer>
 </html>
