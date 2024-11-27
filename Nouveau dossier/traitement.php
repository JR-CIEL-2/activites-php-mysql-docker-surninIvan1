<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $prenom = htmlspecialchars($_POST['prénom'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $password = htmlspecialchars($_POST['password'] ?? '');
    $message = nl2br(htmlspecialchars($_POST['message'] ?? ''));
    $ageCheck = isset($_POST['ageCheck']) ? 'Yes' : 'No';

    $dataFile = 'data.json';
    if (file_exists($dataFile)) {
        $jsonData = json_decode(file_get_contents($dataFile), true);
    } else {
        $jsonData = [];
    }

    // Vérifier si l'email existe déjà
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
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hachage sécurisé du mot de passe
        $newUser = [
            'name' => $name,
            'prénom' => $prenom,
            'email' => $email,
            'password' => $hashedPassword,
            'message' => $message,
            'ageCheck' => $ageCheck
        ];

        $jsonData[] = $newUser;
        file_put_contents($dataFile, json_encode($jsonData, JSON_PRETTY_PRINT));
        echo "<div class='alert alert-success'>Inscription réussie !</div>";
    }
}
?>
