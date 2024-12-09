<?php

function moyenne($notes) {
    if (count($notes) === 0) {
        return 0; 
    }
    return array_sum($notes) / count($notes);
}

$tab = [15, 18, 9];
$moyenneValeur = moyenne($tab);
echo 'La moyenne est de ' . $moyenneValeur . ' et ';

function mediane($notes) {
    if (count($notes) === 0) {
        return 0;
    }

    sort($notes); // Tri des valeurs
    $count = count($notes);
    $middleIndex = floor($count / 2); 

    if ($count % 2 === 1) {
        return $notes[$middleIndex]; // Retourne la valeur du milieu si impair
    } else {
        return ($notes[$middleIndex - 1] + $notes[$middleIndex]) / 2; // Moyenne des deux valeurs centrales si pair
    }
}

$tab2 = [5, 7, 9, 12, 34, 45];
$medianeValeur = mediane($tab2);
echo 'La médiane est de ' . $medianeValeur . '<br>';

function triangle($n) {
    if ($n <= 0) {
        echo "Le nombre de lignes doit être supérieur à 0.<br>";
        return;
    }

    for ($i = 1; $i <= $n; $i++) {
        echo str_repeat("*", $i) . "<br>";
    }
}

if (isset($_GET['n'])) {
    $n = (int)$_GET['n'];
    triangle($n);
} else {
    echo "Paramètre 'n' manquant.<br>";
}

?>
