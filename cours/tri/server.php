<?php
// Fonction pour calculer la médiane
function calculer_mediane($tab) {
    sort($tab); // Trier les données
    $count = count($tab);
    $middle = floor($count / 2);

    if ($count % 2) {
        return $tab[$middle];
    } else {
        return ($tab[$middle - 1] + $tab[$middle]) / 2;
    }
}

// Recevoir les données en POST
$data = json_decode(file_get_contents('php://input'), true);
$tableau = $data['tableau'];

// Calcul de la médiane
$mediane = calculer_mediane($tableau);

// Retourner la réponse en JSON
echo json_encode(['mediane' => $mediane]);
?>
