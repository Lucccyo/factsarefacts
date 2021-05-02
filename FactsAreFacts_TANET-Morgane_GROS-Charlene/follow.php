<?php
    session_start();
    include 'conf/database.php';
    global $db;

    $idSuivi = intval($_GET['userSuivi']);
    $pseudoActu = $_SESSION['pseudo'];
    $reponse = $db->query("SELECT * FROM utilisateur WHERE pseudo = '$pseudoActu'");
    $donnees = $reponse->fetch();
    $resultUserId = $donnees['numUser'];

    if($idSuivi != $resultUserId) {
        $dejaSuivi = $db->prepare('SELECT * FROM abonnement WHERE idSuiveur = ? AND idSuivi = ?');
        $dejaSuivi->execute(array($resultUserId,$idSuivi));
        $nbResult = $dejaSuivi->rowCount();
        if($nbResult == 0)             //la personne n'est pas encore suivit car elle n'apparait pas dans la base de donnee des abonnements de l'utilisateur en cours
        {
            $idActu = $resultUserId;
            $ajouterAbonnement = $db->prepare('INSERT INTO abonnement(idSuiveur, idSuivi) VALUES (?,?)');
            $ajouterAbonnement->execute(array($resultUserId,$idSuivi));
        }elseif($nbResult == 1)
        {
            $supprimmerAbonnement = $db->prepare('DELETE FROM abonnement WHERE idSuiveur = ? AND idSuivi = ?');
            $supprimmerAbonnement->execute(array($resultUserId,$idSuivi));
        }else
        {
            echo 'Erreur';
        }
        header('Location:' .$_SERVER['HTTP_REFERER']);
    }
    
?>