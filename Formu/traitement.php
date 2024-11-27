<?php
// Activer l'affichage des erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Vérifier si la méthode de la requête est POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name'] ?? '');
    $prenom = htmlspecialchars($_POST['prénom'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $password = htmlspecialchars($_POST['password'] ?? '');
    $message = nl2br(htmlspecialchars($_POST['message'] ?? ''));
    $ageCheck = isset($_POST['ageCheck']) ? 'Yes' : 'No';

    // Fichier JSON où les données sont enregistrées
    $dataFile = 'data.json';

    // Vérifier si le fichier JSON existe, sinon on le crée
    if (file_exists($dataFile)) {
        $jsonData = json_decode(file_get_contents($dataFile), true);
    } else {
        $jsonData = [];
    }

    // Vérifier si l'email existe déjà dans le fichier
    $emailExists = false;
    foreach ($jsonData as $user) {
        if ($user['email'] === $email) {
            $emailExists = true;
            break;
        }
    }

    if ($emailExists) {
        echo "<div class='alert alert-danger'>Un compte avec cet email existe déjà.</div>";
    } else {
        // Hacher le mot de passe avant de l'enregistrer
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 
        $newUser = [
            'name' => $name,
            'prénom' => $prenom,
            'email' => $email,
            'password' => $hashedPassword,
            'message' => $message,
            'ageCheck' => $ageCheck
        ];

        // Ajouter l'utilisateur dans les données JSON
        $jsonData[] = $newUser;
        file_put_contents($dataFile, json_encode($jsonData, JSON_PRETTY_PRINT));

        echo "<div class='alert alert-success'>Inscription réussie !</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Méthode de requête non autorisée.</div>";
}
?>
