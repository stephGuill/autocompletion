<?php
// Page d'accueil du moteur de recherche
include 'header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Moteur de recherche animaux</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur le moteur de recherche d'animaux</h1>
        <form action="recherche.php" method="get">
            <input type="text" name="search" id="search" placeholder="Rechercher un animal..." autocomplete="off">
            <button type="submit">Rechercher</button>
        </form>
        <ul id="suggestions"></ul>
    </div>
    <script src="autocomplete.js"></script>
</body>
</html>
