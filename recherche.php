<?php
// Affiche les résultats de recherche
include 'header.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'autocompletion');
$conn->set_charset('utf8');

$results = [];
if ($search !== '') {
    $stmt = $conn->prepare("SELECT * FROM animaux WHERE nom LIKE CONCAT('%', ?, '%')");
    $stmt->bind_param('s', $search);
    $stmt->execute();
    $results = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de recherche</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Résultats pour "<?= htmlspecialchars($search) ?>"</h1>
        <ul>
            <?php if ($results instanceof mysqli_result): ?>
                <?php while($row = $results->fetch_assoc()): ?>
                    <li><a href="element.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['nom']) ?></a></li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>
