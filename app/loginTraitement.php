<?php
session_start(); // Démarrer la session
include 'header.php';

// Définir les informations de connexion
$user_id = 'Assogba';
$user_password = '12345'; // Utiliser une chaîne pour le mot de passe

// Gérer la soumission du formulaire
if (!empty($_POST)) {
    // Récupérer les valeurs du formulaire
    $id = $_POST['id'];
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user_id == $id && $user_password == $password) {
        header('Location: index2.php');
        exit(); // Terminer le script après la redirection
    } else {
        // Stocker le message d'erreur dans une variable de session
        $_SESSION['error_message'] = 'Mot de passe ou login incorrect';
        header('Location: login.php');
        exit(); // Terminer le script après la redirection
    }
}
?>
