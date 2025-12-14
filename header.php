<?php
// Header commun avec barre de recherche et navbar
?>
<header>
    <nav class="navbar">
        <a href="index.php">Accueil</a>
        <a href="recherche.php?search=">Recherche</a>
        <a href="element.php?id=<?= rand(1, 20) ?>">Animal aléatoire</a>
    </nav>
    <form action="recherche.php" method="get" id="header-search-form">
        <input type="text" name="search" id="header-search" placeholder="Rechercher..." autocomplete="off">
        <button type="submit">🔍</button>
        <ul id="header-suggestions" class="suggestions-list"></ul>
    </form>
</header>
