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
        <link rel="stylesheet" href="PageDeStyle.css">
        <link rel="stylesheet" href="NouveauPost_style.css">
        <link rel="stylesheet" href="include/Bar_style.css">
        <link rel="stylesheet" href="include/button_style.css">
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
        
        <?php include 'include/userBar.php' ?> 

        <form action="" method="post" enctype="multipart/form-data">
        <div class="postForm">
                <div class="postForm-div">

                    <div class="contenu">
                        <div class="uploadImage">
                            <input type="file" name="img" id="img" accept="image/*" required>
                            <div class="image-preview" id="image-preview">
                                <img src="" alt="Image Preview" class="image-preview__image">
                                <span class="image-preview__default-text"><i class="fas fa-file"></i></span>
                            </div>
                        </div>
                        <div class="contenu-div">
                            <textarea class="titre" name="titre" id="" cols="30" rows="10" placeholder="Ajoutez un titre" required></textarea>
                            <textarea class="n2" name="legende" id="" cols="30" rows="10" placeholder="Parlez-nous de ce post..." required></textarea>
                            <textarea class="n1" name="url" id="" cols="30" rows="10" placeholder="Ajouter un lien URL *"></textarea>
                        </div>
                    </div>

                    <div class="footer-div">
                        
                        <button class="btn">
                            <a href="pageAccueil.php" class="btnRetour">Retour</a>
                        </button>
                        <span class="sous-titre">* facultatif </span>
                        <a href="<?php extract($_POST);
                            if(isset($suivantBtn)) {

                                //on cree des cookies pour reutiliser dans la page suivante les informations entrées ici
                                setcookie('img', $img, time() + 365*24*3600);
                                setcookie('titre', $titre, time() + 365*24*3600);
                                setcookie('legende', $legende, time() + 365*24*3600);
                                setcookie('url', $url, time() + 365*24*3600);
                                header('Location: newPost2.php');
                            }
                            ?>">
                            <button type="submit" name="suivantBtn" class="btn btnSuivant">Suivant</button>
                        </a>
                    </div>
                </div>       
            </div>

        </form>
        <script>
            //script permettant de previsualiser l'image entrée par l'utilisateur
            const img = document.getElementById("img");
            const previewContainer = document.getElementById("image-preview");
            const previewImage = previewContainer.querySelector(".image-preview__image");
            const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

            img.addEventListener("change", function() {
                const file = this.files[0];

                if(file) {
                    const reader = new FileReader();

                    previewDefaultText.style.display = "none";
                    previewImage.style.display = "block";

                    reader.addEventListener("load", function() {
                        previewImage.setAttribute("src", this.result);
                    });

                    reader.readAsDataURL(file);
                }else 
                {
                    previewDefaultText.style.display = null;
                    previewImage.style.display = null;
                    previewImage.setAttribute("src", "");
                }
            });
        </script>
    </body>
    <footer>

    </footer>
</html>