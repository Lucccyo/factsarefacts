<div class="publicationDiv">
<?php

    if(isset($idPers))
    {

        include_once 'conf/database.php';
        global $db;
        $reponse = $db->query("SELECT COUNT(*) AS nb_posts FROM post");
        $donnees = $reponse->fetch();
        $nb_Post = $donnees['nb_posts'];
        
        if($nb_Post>0)
        {
            $cpt = 0;
            for($i = 1 ; $i < ($nb_Post+1) ; $i++)
            {
                $reponse = $db->query("SELECT * FROM post WHERE numPost = $i");
                $donnees = $reponse->fetch();
                $numUser = $donnees['numUser'];
                if($numUser == $idPers)
                {
                    include('post.php');
                    $cpt++;
                }
            }if ($cpt == 0)
            {
                ?>
                    <div class="remplissage">
                        <p>Cet utilisateur n'a encore rien posté</p>
                    </div> 
                <?php
            }
        }else
        {
            echo 'erreur';
        }


    }else
    {
        include_once 'conf/database.php';
        global $db;
        $reponse = $db->query("SELECT COUNT(*) AS nb_posts FROM post");
        $donnees = $reponse->fetch();
        $nb_Post = $donnees['nb_posts'];

        $pseudoActu = $_SESSION['pseudo'];
        $reponse = $db->query("SELECT * FROM utilisateur WHERE pseudo = '$pseudoActu'");
        $donnees = $reponse->fetch();
        $resultUserId = $donnees['numUser'];
        
        if($nb_Post>0)
        {
            $cpt = 0;
            for($i = 1 ; $i < ($nb_Post+1) ; $i++)
            {
                $reponse = $db->query("SELECT * FROM post WHERE numPost = $i");
                $donnees = $reponse->fetch();
                $numUser = $donnees['numUser']; 
                if($numUser == $resultUserId)
                {
                    include('post.php');
                    $cpt++;
                }
            }if ($cpt == 0)
            {
                ?>
                    <div class="remplissage">
                        <p>Vous n'avez pas encore posté d'articles</p>
                    </div> 
                <?php
            }
        }else
        {
            echo 'erreur';
        }
    }
?> 
</div>