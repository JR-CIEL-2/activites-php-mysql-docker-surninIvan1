<?php 

function triangle($n) {
    if ($n <= 0) {
        echo "Le nombre de lignes doit être supérieur à 0.<br>";
        return;
    }

    for ($i = 1; $i <= $n; $i++) {
        echo str_repeat("*", $i) . "<br>";
    }
}

$n = isset($_GET['n']) && is_numeric($_GET['n']) && $_GET['n'] > 0 ? (int)$_GET['n'] : 10;

triangle($n);

?>
