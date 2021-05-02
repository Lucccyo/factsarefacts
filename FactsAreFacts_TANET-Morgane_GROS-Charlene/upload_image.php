<?php
    include 'conf/database.php';

    global $db;

    //lorsque le bouton suivant est cliqué, on met l'image déposée par l'utilisateur dans le dossier "imagePost"
    if(isset($_POST['suivantBtn'])) 
    {
        extract($_POST);
        $pseudoActu = $_SESSION['pseudo'];
        $image = $_FILES['img']['name'];
        
        $upload = "imagePost/".$image;
        move_uploaded_file($_FILES['img']['tmp_name'], $upload);
        setcookie('image', $image, time() + 365*24*3600);
    }

    if(isset($_POST['submitBtn'])) 
    {
        extract($_POST);
        $pseudoActu = $_SESSION['pseudo'];
        $reponse = $db->query("SELECT * FROM utilisateur WHERE pseudo = '$pseudoActu'");
        $donnees = $reponse->fetch();           //on cherche dans la base de donnee le numUser de l'utilisateur qui veut mettre un post
        $resultUserId = $donnees['numUser'];

        // on recupere des cookies cree les informations du post entrées par l'utilisateur
        $titre = $_COOKIE['titre'];
        $legende = $_COOKIE['legende'];
        $image = $_COOKIE['image'];
        $url = $_COOKIE['url'];

        //on remplace les simple apostrophes par des doubles, afiun de ne pas avoir de probleme lié a l'enregistrement du text dans la base de donnée
        $titre = str_replace("'" , "''" , $titre);
        $legende = str_replace("'" , "''" , $legende);

        //on insere dans la base de donnée le nouveau post
        $query = $db->prepare("INSERT INTO post(numUser, likes, title, lblPost, roleA, roleE, urls, photo) VALUES('$resultUserId', '0' , '$titre' , '$legende' , '$roleA' , '$roleE' , '$url' , '$image')");
        $result = $query->execute();
        header('Location: pageAccueil.php');
    }

?>
