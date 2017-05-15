<?php
$bdd = new mysqli("localhost", "root", "", "entreprise");
$bdd2 = new mysqli("localhost", "root", "", "ecommerce");
$bdd3 = new mysqli("localhost", "root", "", "immobilier");

if ($bdd->connect_error) die('Un Problème est survenu lors de la connexion à la BDD :' .$bdd->connect_error);

$bdd->set_charset('utf8');

session_start();

//define("RACINE_SITE", "/site/");

$contenu = '';
$succes = '';
$error = '';
if (isset($_GET['action']) && $_GET['action']=="deconnexion"){
    session_destroy();
    header('Location:index.php');
}

require_once('functions.php');
?>