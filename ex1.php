<?php

function triangle($n) {
    for ($i = 1; $i <= $n; $i++) {
        echo str_repeat("*", $i) . "<br>";
    }
}

// Vérifiez si le paramètre 'n' est passé dans l'URL
if (isset($_GET['n']) && is_numeric($_GET['n'])) {
    $n = (int)$_GET['n'];

 
    if ($n > 0) {
        triangle($n); 
    } else {
        echo "Veuillez fournir un nombre entier positif.";
    }
} else {
    echo "Paramètre 'n' manquant ou invalide dans l'URL.";
}
