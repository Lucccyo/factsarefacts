<?php
/*
mode de connexion a la base de donnees mysql

$dsn = 'mysql:dbname=demo;host=server;port=3306;charset=utf8';
$connection = new \PDO($dsn, $username, $password);

// throw exceptions, when SQL error is caused
$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// prevent emulation of prepared statements
$connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

mysqli_connect([$host, $username, $passwd, $dname, $port, $socket] )
*/


//$host = '127.0.0.1';
$host = 'localhost';
$db   = 'factsdb';
$user = 'factsdbadm';
$pass = '7kKGg3Rs0MzRg6';
$port = "3306";
    try{
        // $db = new PDO('mysql:host=localhost;dbname=$db', $user, $pass);
        // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$db = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$db.'', $user, $pass);
	$db->exec("SET CHARACTER SET utf8");
       // $bdd = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);
        //$conn = mysqli_connect("localhost" , "factsdbadm" , "factsdbadm" , "factsdb");
	    //mysqli_connect([$host, $user, $pass, $db ])

    }catch(PDOException $e) {
        //echo "ERROR : $e";
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
    }

?>
