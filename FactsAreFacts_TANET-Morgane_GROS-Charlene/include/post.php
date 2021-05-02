<?php
    
    $reponse = $db->query("SELECT * FROM post WHERE numPost = $i");
    $donnees = $reponse->fetch();           //on cherche dans la base de donnee toutes les informations qui correspondent au post d'id $i
    
    $titre = $donnees['title']; 
    $photo = $donnees['photo']; 
    $legende = $donnees['lblPost']; 
    $likes = $donnees['likes'];
    $userId = $donnees['numUser']; 
    $url = $donnees['urls']; 

    

    $reponse = $db->query("SELECT pseudo FROM utilisateur WHERE numUser = '$userId'");
    $donnees = $reponse->fetch();  
    $pseudo = $donnees['pseudo'];
    
?>

<div class="post-item">
        <div class="headerPost">
            <div class="userEditeur">
                <img src="img/PDP-defaut.png" alt="pdp">
                <p class="nomEditeur">@<?php echo $pseudo ?></p>
            </div>
            <div class="expertJuge">
                <p>jugé par : @l'expert</p>
            </div>

        </div>

        <div class="imagePost">
            <img src="imagePost/<?php echo $photo ?>" alt="test de post">
        </div>

        <div class="footerPost">
            <div class="head">
                <span class="titrePost">
                    <h1><?php echo $titre ?></h1>
                </span>
                <div class="btnInterract">
                    <ul>
                        <li class="interract-btn btn">
                            <button class="btn" name="enregistrer">
                                <i class="fas fa-fire"></i>
                            </button>
                        </li>

                        <li class="interract-btn btn" name="chat">
                            <button class="btn">
                                <i class="fas fa-comment-dots"></i>
                            </button>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="corpsLibPost">
                
                <p><?php echo $legende ?> </p>

                <?php if(isset($url))
                    {
                        ?> 
                            <p>
                                <a class="lienUrl" href="<?php echo $url ?>" target="blank">Voir plus</a>
                            </p> 
                        <?php
                    }
                ?>
                
            </div>
        </div>
    </div>
