<?php
    session_start();

    if(isset($_POST['submitBtn']))
    {
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['password'];
        
        $objectPDO = new PDO('mysql:host=localhost;dbname=faref','root','root');

        $sql = "SELECT * FROM utilisateur WHERE pseudo = $pseudo";
        $result = $objectPDO->prepare($sql);
        $result->execute();

        if($result->rowCount() > 0)
        {
            $data = $result->fetchAll();
            
            if($password =  $data[0]['password'])
            {
                echo 'connexion effectuée';
                $_SESSION['pseudo'] = $pseudo;
            }
            
        }
    }
?>
