<?php
function tri_selection_valeur($tab) {
    $n = count($tab);
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($tab[$j] < $tab[$minIndex]) {
                $minIndex = $j;
            }
        }
        $temp = $tab[$i];
        $tab[$i] = $tab[$minIndex];
        $tab[$minIndex] = $temp;
    }
    return $tab;
}

// Passage par référence
function tri_selection_reference(&$tab) {
    $n = count($tab);
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($tab[$j] < $tab[$minIndex]) {
                $minIndex = $j;
            }
        }
        // Échange
        $temp = $tab[$i];
        $tab[$i] = $tab[$minIndex];
        $tab[$minIndex] = $temp;
    }
}
?>