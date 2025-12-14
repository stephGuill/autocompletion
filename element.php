<?php
// Affiche les détails d'un animal
include 'header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'autocompletion');
$conn->set_charset('utf8');

$stmt = $conn->prepare("SELECT * FROM animaux WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$animal = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($animal['nom'] ?? 'Animal inconnu') ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container fiche-animal">
        <?php if ($animal): ?>
            <?php
            // Associer un emoji à chaque animal
            $emojis = [
                'Chat' => '🐱',
                'Chien' => '🐶',
                'Lion' => '🦁',
                'Tigre' => '🐯',
                'Éléphant' => '🐘',
                'Girafe' => '🦒',
                'Zèbre' => '🦓',
                'Ours' => '🐻',
                'Loup' => '🐺',
                'Renard' => '🦊',
                'Singe' => '🐵',
                'Panda' => '🐼',
                'Koala' => '🐨',
                'Kangourou' => '🦘',
                'Hippopotame' => '🦛',
                'Rhinocéros' => '🦏',
                'Crocodile' => '🐊',
                'Dauphin' => '🐬',
                'Pingouin' => '🐧',
                'Aigle' => '🦅',
            ];
            $emoji = $emojis[$animal['nom']] ?? '🐾';
            ?>
            <h1 class="animal-title"><?= $emoji ?> <?= htmlspecialchars($animal['nom']) ?></h1>
            <div class="animal-image-block">
                <?php
                $imageFile = $animal['image'] ? $animal['image'] : 'default.jpg';
                $webImagePath = "images/" . htmlspecialchars($imageFile);
                $serverImagePath = __DIR__ . "/images/" . $imageFile;
                if (!file_exists($serverImagePath)) {
                    $webImagePath = "images/default.jpg";
                }
                ?>
                <img class="animal-image" src="<?= $webImagePath ?>" alt="<?= htmlspecialchars($animal['nom']) ?>">
    
            <div class="animal-description">
                <h2>Description détaillée</h2>
                <p>
                <?php
                    // Générer une explication plus riche si possible
                    $desc = $animal['description'];
                    $nom = $animal['nom'];
                    if ($desc && $nom) {
                        echo nl2br(htmlspecialchars("$nom : $desc\n\n$nom est un animal remarquable. Voici quelques détails :\n- Nom : $nom\n- Description : $desc\n\nCet animal possède des caractéristiques uniques qui le distinguent des autres."));
                    } else {
                        echo "Aucune description disponible.";
                    }
                ?>
                </p>
            </div>
        <?php else: ?>
            <p>Animal non trouvé.</p>
        <?php endif; ?>
    </div>
</body>
</html>
