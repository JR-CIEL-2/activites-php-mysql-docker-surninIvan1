<?php


function moyenne($notes) {
    if (count($notes) === 0) {
        return 0; 
    }
    return array_sum($notes) / count($notes);
}


$tab = [15, 18, 9];
$moyenneValeur = moyenne($tab);
echo 'La moyenne est de ' . $moyenneValeur ,' et ';

function médiane($notes) {
 
    if (count($notes) === 0) {
        return 0;
    }


    sort($notes);
    
    $count = count($notes);
    $middleIndex = floor($count / 2); 

    if ($count % 2 === 1) {
        return $notes[$middleIndex];
    } else {
        return ($notes[$middleIndex - 1] + $notes[$middleIndex]) / 2; 
    }
}

$tab2 = [5, 7, 9, 12, 34, 45];
$médianeValeur = médiane($tab2);
echo 'La médiane est de ' . $médianeValeur;

function triangle($n) {
    for ($i = 1; $i <= $n; $i++) {
        echo str_repeat("*", $i) . "<br>";
    }
}

if (isset($_GET['n'])) {
    $n = (int)$_GET['n'];
} else {
    echo "Paramètre 'n' manquant ";
}

?>