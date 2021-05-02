<div class="main-items">

<?php
    // include 'upload_image.php';
    include_once 'conf/database.php';
    global $db;
    $reponse = $db->query("SELECT COUNT(*) AS nb_posts FROM post");
    $donnees = $reponse->fetch();
    
    $nb_Post = $donnees['nb_posts'];        // nombre de posts enregistré dans la base de données

//on affiche tous les posts enregistré dans la base de donnees
    
if(isset($_GET['actualPage']))
{
    switch($_GET['actualPage'])
    {
        case 1: displayActualite($nb_Post,$db);
        break;
        case 2: displayCulture($nb_Post,$db);
        break;
        case 3: displayGeopolitique($nb_Post,$db);
        break;
        case 4: displayHistoire($nb_Post,$db);
        break;
        case 5: displayModeDeVie($nb_Post,$db);
        break;
        case 6: displayNumerique($nb_Post,$db);
        break;
        case 7: displaySciences($nb_Post,$db);
    }
}else
{
    displayMain($nb_Post,$db);
}
    
?>
</div>

<?php

function displayMain($nb_Post, $db)
{
    if($nb_Post>0)
    {
        $cpt = 0;
        for($i = 1 ; $i < ($nb_Post+1) ; $i++)
        {
            include('post.php');  
            $cpt++;      
        }
        if ($cpt == 0)
        {
            echo "Pas de post encore enregistré";
        }
    }else
    {
        echo 'erreur';
    }
}

function displayActualite($nb_Post, $db)
{
    if($nb_Post>0)
    {
        $cpt = 0;
        for($i = 1 ; $i < ($nb_Post+1) ; $i++)
        {
            
            $reponse = $db->query("SELECT * FROM post WHERE numPost = $i");
            $donnees = $reponse->fetch();           //on cherche dans la base de donnee toutes les informations qui correspondent au post d'id $i
            $roleA = $donnees['roleA']; 
            if($roleA == "Actualités")
            {
                include('post.php');
                $cpt++;
            }
        }if ($cpt == 0)
        {
            ?>
                <div class="remplissage">
                    <p>Aucun post de ce type pour l'instant</p>
                </div> 
            <?php
        }
    }else
    {
        echo 'erreur';
    }
}

function displayCulture($nb_Post, $db) 
{
    if($nb_Post>0)
    {
        for($i = 1 ; $i < ($nb_Post+1) ; $i++)
        {
            $cpt = 0;
            $reponse = $db->query("SELECT * FROM post WHERE numPost = $i");
            $donnees = $reponse->fetch();           //on cherche dans la base de donnee toutes les informations qui correspondent au post d'id $i
            $roleA = $donnees['roleA']; 
            if($roleA == "Culture")
            {
                $cpt ++;
                include('post.php');  
            }
        }
        if ($cpt == 0)
        {
            ?>
                <div class="remplissage">
                    <p>Aucun post de ce type pour l'instant</p>
                </div> 
            <?php
        }
    }else
    {
        echo 'erreur';
    }
}

function displayGeopolitique($nb_Post, $db) 
{
    if($nb_Post>0)
    {
        $cpt = 0;
        for($i = 1 ; $i < ($nb_Post+1) ; $i++)
        {
            
            $reponse = $db->query("SELECT * FROM post WHERE numPost = $i");
            $donnees = $reponse->fetch();           //on cherche dans la base de donnee toutes les informations qui correspondent au post d'id $i
            $roleA = $donnees['roleA']; 
            if($roleA == "Géopolitique")
            {
                $cpt++;
                include('post.php');  
            }
        }if ($cpt == 0)
        {
            ?>
                <div class="remplissage">
                    <p>Aucun post de ce type pour l'instant</p>
                </div> 
            <?php
        }
    }else
    {
        echo 'erreur';
    }
}

function displayHistoire($nb_Post, $db) 
{
    if($nb_Post>0)
    {
        $cpt = 0;
        for($i = 1 ; $i < ($nb_Post+1) ; $i++)
        {
            $reponse = $db->query("SELECT * FROM post WHERE numPost = $i");
            $donnees = $reponse->fetch();           //on cherche dans la base de donnee toutes les informations qui correspondent au post d'id $i
            $roleA = $donnees['roleA']; 
            if($roleA == "Histoire")
            {
                $cpt++;
                include('post.php');  
            }
        }if ($cpt == 0)
        {
            ?>
                <div class="remplissage">
                    <p>Aucun post de ce type pour l'instant</p>
                </div> 
            <?php
        }
    }else
    {
        echo 'erreur';
    }
}

function displayModeDeVie($nb_Post, $db) 
{
    if($nb_Post>0)
    {
        $cpt = 0;
        for($i = 1 ; $i < ($nb_Post+1) ; $i++)
        {
            $reponse = $db->query("SELECT * FROM post WHERE numPost = $i");
            $donnees = $reponse->fetch();           //on cherche dans la base de donnee toutes les informations qui correspondent au post d'id $i
            $roleA = $donnees['roleA']; 
            if($roleA == "Mode de vie")
            {
                $cpt++;
                include('post.php');  
            }
        }if ($cpt == 0)
        {
            ?>
                <div class="remplissage">
                    <p>Aucun post de ce type pour l'instant</p>
                </div> 
            <?php
        }
    }else
    {
        echo 'erreur';
    }
}

function displayNumerique($nb_Post, $db) 
{
    if($nb_Post>0)
    {
        $cpt = 0;
        for($i = 1 ; $i < ($nb_Post+1) ; $i++)
        {
            $reponse = $db->query("SELECT * FROM post WHERE numPost = $i");
            $donnees = $reponse->fetch();           //on cherche dans la base de donnee toutes les informations qui correspondent au post d'id $i
            $roleA = $donnees['roleA']; 
            if($roleA == "Numérique")
            {
                $cpt++;
                include('post.php');  
            }
        }if ($cpt == 0)
        {
            ?>
                <div class="remplissage">
                    <p>Aucun post de ce type pour l'instant</p>
                </div> 
            <?php
        }
    }else
    {
        echo 'erreur';
    }
}

function displaySciences($nb_Post, $db) 
{
    if($nb_Post>0)
    {
        $cpt = 0;
        for($i = 1 ; $i < ($nb_Post+1) ; $i++)
        {
            $reponse = $db->query("SELECT * FROM post WHERE numPost = $i");
            $donnees = $reponse->fetch();           //on cherche dans la base de donnee toutes les informations qui correspondent au post d'id $i
            $roleA = $donnees['roleA']; 
            if($roleA == "Sciences")
            {
                $cpt++;
                include('post.php');  
            }
        }if ($cpt == 0)
        {
            ?>
                <div class="remplissage">
                    <p>Aucun post de ce type pour l'instant</p>
                </div> 
            <?php
        }
    }else
    {
        echo 'erreur';
    }
}

?>