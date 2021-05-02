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
        <div class="optionMentions">
            <div class="content mentions-bloc">
                <div class="titre">
                    <h1>Mentions Légales</h1>
                </div>

                <div class="mentionsDiv">
                    <div class="intro txt">
                        <p>L’utilisation de l‘application implique l’acceptation pleine et entière des 
                            conditions générales d’utilisation ci-après décrites. Ces conditions 
                            d’utilisations sont susceptibles d’être modifiées à tout moment, et les 
                            utilisateurs de l’application en seront informés. </p>
                        <p>Facts Are Facts est propriétaire des droits de propriété intellectuelle et 
                            détient les droits d’usage sur tous les éléments accessibles sur le site,
                             notamment les textes, graphismes, logos, icônes, sons et logiciels. L’ensemble 
                             de ce site relève de la législation française et internationale sur le droit 
                             d’auteur et la propriété intellectuelle. Tous les droits de reproduction sont 
                             réservés, y compris pour les documents téléchargeables et les représentations 
                             iconographiques et photographiques. Le contenu est, sauf mention contraire,
                              la propriété des développeurs. La reproduction de tout ou partie de ce site,
                               sous quelque forme que ce soit, est interdite.</p>
                        <p>Les informations collectées sont destinées uniquement à l’usage des développeurs. 
                            Conformément à la loi du 6 janvier 1978, relative à l’informatique, aux fichiers
                             et aux libertés, vous disposez d’un droit d’accès, de modification, de rectification 
                             et de suppression, pour toute information vous concernant.</p>
                        <p>L’application met en œuvre des traitements de données à caractère personnel.  </p>
                        <p>L’application ne conserve les données que pour la durée nécessaire aux opérations 
                            pour lesquelles elles ont été collectées ainsi que dans le respect de la règlementation 
                            en vigueur.</p>
                        <p>A cet égard, les données des utilisateurs sont conservées pendant la durée d’utilisation 
                            de l’application, et sont donc supprimées si l’utilisateur a supprimé son compte. Lors 
                            de la suppression du compte, toutes les données personnelles associées au profil sont 
                            supprimées, et cette action est irréversible.</p>
                        <p>Les données traitées sont destinées aux développeurs.</p>
                        <p>Dans les conditions définies par la loi informatique et libertés et le règlement 
                            européen sur la protection des données, les personnes physiques disposent d’un droit 
                            d’accès aux données les concernant, de rectification, d’interrogation, de limitation, 
                            de portabilité, d’effacement.</p>
                        <p>Les personnes concernées disposent du droit d’introduire une réclamation auprès de la CNIL.</p>
                    </div>

		    <section id="securite">
			<br>
                   	<div class="bandeauTitre">
                        	<h1>Securité</h1>
                    	</div>

                        <div class="securite txt">
                            <p>L’âge minimum requis afin de s’inscrire sur l’application est de 13 ans.</p>
                            <p>Votre profil et les données qui y sont associées (adresse mail, nom, mot de passe, 
                                informations dans la description, réactions…) sont stockées à des fins purement 
                                informatiques, et ne sont en aucun cas communiqués, ou divulgués à des fins commerciales.</p>
                            <p>Vous pouvez nous signaler tout message haineux, toute usurpation d’identité, toute tentative de 
                                harcèlement, toute divulgation d’informations personnelles, ou toute atteinte à votre privée 
                                dans les salons destinés à la conversation. Les profils associés aux messages haineux, aux
                                tentatives de harcèlement ou à l’atteinte à votre vie privée seront immédiatement pris en 
                                charge par la modération, et supprimés dans les meilleurs délais. </p>
                            <p>Vous pouvez nous signaler tout message haineux, toute usurpation d’identité, toute tentative de
                                harcèlement, toute divulgation d’informations personnelles, ou toute atteinte à votre privée 
                                dans les salons destinés à la conversation. Les profils associés aux messages haineux, aux
                                tentatives de harcèlement ou à l’atteinte à votre vie privée seront immédiatement pris en charge 
                                par la modération, et supprimés dans les meilleurs délais. </p>
                            <p>Si vous souhaitez signaler tout problème à la modération, vous êtes priés d’envoyer un 
                                mail à <strong>moderationfacts@gmail.com</strong>.</p>   
                            <p>Si vous signalez un harcèlement, une usurpation d’identité, des divulgation d’informations privées,
                                des menaces, ou toute atteinte à votre vie privée, la modération se permet de garder le signalement 
                                et les preuves qui y sont associées (échanges, photographies), pour que vous puissiez les réclamer en cas 
                                de procédure judiciaire.</p>
                            <p>Vous pouvez bloquer et débloquer des utilisateurs si vous ne souhaitez pas voir leurs messages dans les salons
                                ou leurs publications dans votre fil d’actualité, ou dans les fils d’actualités généraux. </p>
                            <p>Toute photo publiée à caractère personnel sera immédiatement supprimée du site dans les plus brefs délais.
                                Seules les photos contenant une citation, les captures d’écrans de journaux numériques ou les captures d’écran 
                                de post sur des réseaux sociaux mentionnant une déclaration précise sont tolérés. </p>
                            <p>La responsabilité des gérants du site ne peut être mise en cause en cas de message haineux, d’usurpation d’identité,
                                de tentative de harcèlement, de divulgation d’informations personnelles, ou d’atteinte à votre privée. </p>
                            <p>Même si la modération s’engage à veiller à ce qu’aucun message haineux, aucune usurpation d’identité,
                                aucune tentative de harcèlement, aucune divulgation d’informations personnelles, ou d’atteinte à votre privée 
                                ne puisse être perpétrée sur l’application, il est de la responsabilité de chaque utilisateur de ne pas publier
                                d’informations qu’il juge trop personnelles, trop sensible, ou qui pourraient que quelque manière que ce soit nuire 
                                à son image.</p>
                        </div>
                    </section>

                    

                   

                    <section id="profil">
			<br>
                        <div class="bandeauTitre">
                            <h1>Profil</h1>
                        </div>
                        <div class="profil txt">
                            <p>Nous vous garantissons qu’aucun de vos post ne sera shadow ban. Si vous ne recevez pas de réponse de la part 
                                des experts que vous avez contactés, cela met en cause exclusivement la responsabilité des experts en question,
                                et les gérants de l’application ne peuvent être tenus pour responsables. </p>
                            <p>La suppression de votre profil est une action irréversible. Une fois votre profil supprimé, toutes les données qui y sont
                                associées seront définitivement supprimées, sans récupération possible.</p>
                            <p>Les descriptions des profils contenant des liens internet sont susceptibles d’être supprimées si les liens en question 
                                relèvent du spam.</p>
                        </div>
                    </section>

                   

                    

                    <section id="spam">
			<br>
                        <div class="bandeauTitre">
                            <h1>Spam</h1>
                        </div>
                        <div class="spam txt">
                            <p>Tout profil effectuant du racolage en ligne, ou proposant des liens vers des sites pornographiques ou 
                                violents sera immédiatement supprimé. Si un de ces profils échappe à notre modération, vous pouvez le signaler à 
                                l’adresse mail suivante : <strong>moderationfacts@gmail.com</strong></p> 
                        </div>
                    </section>

                    

                    

                    <section id="expertise">
			<br>
                        <div class="bandeauTitre">
                            <h1>Expertise</h1>
                        </div>
                        <div class="expertise txt">
                            <p>Les personnes qui cochent la case « expert » au moment de leur inscription sur le site sont priées de s’entretenir
                                avec les gérants de l’application afin que leur profil puisse être validé, dans un souci de fiabilité. </p>
                            <p>Les experts sont encouragés à contacter les gérants du site afin de proposer d’autres experts. </p>
                        </div>
                    </section>

                    

                    

                    <section id="financement">
			<br>
                        <div class="bandeauTitre">
                            <h1>Financement</h1>
                        </div>
                        <div class="financement txt">
                            <p>Nous utilisons un financement participatif, ce qui vous permet de profiter de l’application sans publicité, 
                                garantissant ainsi notre indépendance. </p>
                        </div>
                    </section>

                    


                </div>

            </div>
            
        </div>
        
    </body>
    <footer>

    </footer>
</html>
