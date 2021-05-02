<?php session_start(); 
include 'conf/database.php';
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
        <link rel="stylesheet" href="include/Bar_style.css">
        <link rel="stylesheet" href="include/button_style.css">
        <link rel="stylesheet" href="PageDeStyle.css">
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
        
        <?php include 'include/optionBar.php'?>
        <div class="optionAPropos">
            <div class="content aPropos-bloc">
                
                <div class="titre">
                    <h1> Qui sommes-nous</h1>
                </div>
                <div class="aPropos-div txt">
                    <p>
                        La vérité. Avec un grand V, s’il vous plaît ! Comment être sûr de connaître 
                        la vraie vérité ? Comment avoir la certitude que ce que l’on propage est vrai ? 
                        Comment peut-on savoir que ce que l’on lit, ce que l’on voit, ce que l’on entend est 
                        juste et fiable ? Comment, parmi tous les flux d’informations, ininterrompus, 
                        permanents, et parfois étouffants, faire le tri ? Comment ne pas être perdus, 
                        face à toutes ces contradictions, ces évènements, ces « chocs » et autres scandales ? 
                    </p>
                    <p>
                        Prenons un peu d’altitude.
                    </p>
                    <p>
                        On a déjà dû vous dire que la vérité pouvait être douloureuse ou déplaisante. Nous ne 
                        le pensons pas. La vérité, selon nous, est ce qui se conforme au réel. Est vrai ce qui 
                        est réel, tangible, qu’importe les différents prismes politiques, qu’importe les sensibilités 
                        de chacun. La réalité ne se plie pas à nos convictions, à nos ressentis. Les faits sont les 
                        faits, c’est la seule chose dont nous pouvons être convaincus. 
                    </p>
                    <p>
                        Avec cette application, apprenez à déterminez ce qui est vrai. Ce qui est juste. Ce qui est 
                        fiable. Découvrez une information vierge de tout carcan idéologique, apprenez à vous 
                        questionner, à remettre en cause ce que l’on vous transmet, ce que l’on veut vous transmettre. 
                    </p>
                    <p>
                        C’est bien ambitieux, tout cela. Comment mettre un tel projet en œuvre ? 
                    </p>
                    <p>
                        Tout simplement avec la parole d’experts, qui maîtrisent chacun des domaines auxquels 
                        ils ont choisi de se consacrer. Ils ne sont pas journalistes, ils ne vendent pas 
                        l’information, et eux seuls sont capables de vous délivrer les faits, tels qu’ils sont, 
                        au plus proche de la réalité qu’ils connaissent, afin de remettre les pendules à l’heure 
                        des grands idéologues de notre temps, de notre époque où l’information est devenue une arme précieuse, 
                        qu’il s’agit de manipuler convenablement. Le principe se veut le plus simple possible : un utilisateur 
                        envoie un article dont il doute de la véracité, ou dont les données ou la conclusion semblent 
                        sujet à caution, à un expert, qui prendra connaissance de cet article, portant sur le domaine 
                        de compétence que ce dernier aura mentionné en s’inscrivant sur le site. Un communiqué à propos 
                        dudit article est ensuite publié sur son profil, afin que tous ses abonnés puissent le lire. Sur 
                        le profil des experts, en plus des communiqués publiés, on peut ajouter le lien d’un site internet, 
                        d’une chaîne YouTube, d’un livre etc… Il y a également un système de mots-clefs pour que les experts 
                        puissent hiérarchiser les différents articles auxquels ils veulent répondre. En revanche, une 
                        question, une déclaration, ou un article ne seront pas prioritaires parce qu’ils auraient été 
                        plus vus, ou auraient suscités plus de réactions, grâce aux émoticônes.
                    </p>
                    <p>
                        Cette application est aussi une plateforme de confiance. Vous pouvez leur faire confiance. 
                        Grâce à notre modération, nous nous assurons que les experts qui apporteront des réponses à vos 
                        questions sont parfaitement fiables, et à même de vous délivrer les faits tels qu’ils sont. 
                    </p>
                    <p>
                        Il n’y a rien de plus épanouissant que la curiosité, que le savoir, et que l’échange, et 
                        nous essayerons toujours de mettre à l’honneur toutes ces qualités, parce que vous le méritez !
                    </p>

                </div>


            </div>
            
        </div>
        
    </body>
    <footer>

    </footer>
</html>