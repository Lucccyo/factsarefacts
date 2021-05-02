<?php

session_start();


if(isset($_SESSION['pseudo']))
{
    $_SESSION['pseudo'] = NULL;
    unset($_SESSION['pseudo']);
}
    header("Location: ../index.php");
    die;
?>
