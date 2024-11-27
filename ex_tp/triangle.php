<?php 

function triangle($n) {
    for ($i = 1; $i <= $n; $i++) {
        echo str_repeat("*", $i) . "<br>";
    }
}

$n = isset($_GET['n']) ? (int)$_GET['n'] : 10;

triangle($n);

?>