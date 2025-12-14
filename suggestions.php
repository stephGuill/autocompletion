<?php
// Endpoint pour suggestions AJAX
header('Content-Type: application/json; charset=utf-8');

$query = isset($_GET['query']) ? $_GET['query'] : '';

$conn = new mysqli('localhost', 'root', '', 'autocompletion');
$conn->set_charset('utf8');

$start = [];
$contains = [];
if ($query !== '') {
    // Commence par
    $stmt = $conn->prepare("SELECT id, nom FROM animaux WHERE nom LIKE CONCAT(?, '%') LIMIT 5");
    $stmt->bind_param('s', $query);
    $stmt->execute();
    $start = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    // Contient (hors commence par)
    $stmt2 = $conn->prepare("SELECT id, nom FROM animaux WHERE nom LIKE CONCAT('%', ?, '%') AND nom NOT LIKE CONCAT(?, '%') LIMIT 5");
    $stmt2->bind_param('ss', $query, $query);
    $stmt2->execute();
    $contains = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
}
echo json_encode(['start' => $start, 'contains' => $contains]);
