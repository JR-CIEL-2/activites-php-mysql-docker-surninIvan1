<?php

header('Content-Type: application/json');

// Chargement des données des courses à partir d'un fichier JSON
$coursesFile = 'courses.json';
if (!file_exists($coursesFile)) {
    echo json_encode(['error' => 'Le fichier courses.json est introuvable.']);
    exit;
}

$coursesData = json_decode(file_get_contents($coursesFile), true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Erreur lors de la lecture du fichier JSON.']);
    exit;
}

if (!isset($coursesData['courses']) || !is_array($coursesData['courses'])) {
    echo json_encode(['error' => 'Données de courses invalides.']);
    exit;
}

$courses = $coursesData['courses'];

// Récupération du payload (données POST)
$input = json_decode(file_get_contents('php://input'), true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Payload JSON invalide.']);
    exit;
}

if (!isset($input['courseId'])) {
    echo json_encode(['error' => 'L’identifiant de la course (courseId) est requis.']);
    exit;
}

$courseId = $input['courseId'];

// Recherche de la course correspondant à l’ID
$selectedCourse = null;
foreach ($courses as $course) {
    if ($course['id'] === $courseId) {
        $selectedCourse = $course;
        break;
    }
}

if (!$selectedCourse) {
    echo json_encode(['error' => 'Course introuvable pour l’identifiant fourni.']);
    exit;
}

// Renvoi uniquement des données de la course sélectionnée
echo json_encode($selectedCourse, JSON_PRETTY_PRINT);
?>