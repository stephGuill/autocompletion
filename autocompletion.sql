-- Script SQL pour la base autocompletion et la table animaux
CREATE DATABASE IF NOT EXISTS autocompletion;
USE autocompletion;

CREATE TABLE IF NOT EXISTS animaux (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    image VARCHAR(255)
);

INSERT INTO animaux (nom, description, image) VALUES
('Chat', 'Petit mammifère domestique.', 'chat.jpg'),
('Chien', 'Fidèle compagnon de l\'homme.', 'chien.jpg'),
('Lion', 'Roi de la savane.', 'lion.jpg'),
('Tigre', 'Grand félin d\'Asie.', 'tigre.jpg'),
('Éléphant', 'Le plus grand mammifère terrestre.', 'elephant.jpg'),
('Girafe', 'Animal au long cou.', 'girafe.jpg'),
('Zèbre', 'Animal rayé d\'Afrique.', 'zebre.jpg'),
('Ours', 'Grand mammifère omnivore.', 'ours.jpg'),
('Loup', 'Canidé sauvage.', 'loup.jpg'),
('Renard', 'Animal rusé.', 'renard.jpg'),
('Singe', 'Mammifère primate.', 'singe.jpg'),
('Panda', 'Ours noir et blanc.', 'panda.jpg'),
('Koala', 'Marsupial d\'Australie.', 'koala.jpg'),
('Kangourou', 'Sauteur australien.', 'kangourou.jpg'),
('Hippopotame', 'Gros animal amphibie.', 'hippopotame.jpg'),
('Rhinocéros', 'Animal à corne.', 'rhinoceros.jpg'),
('Crocodile', 'Reptile carnivore.', 'crocodile.jpg'),
('Dauphin', 'Mammifère marin intelligent.', 'dauphin.jpg'),
('Pingouin', 'Oiseau marin incapable de voler.', 'pingouin.jpg'),
('Aigle', 'Rapace majestueux.', 'aigle.jpg');
