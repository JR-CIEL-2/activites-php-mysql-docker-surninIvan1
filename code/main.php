<?php
include 'statistique.php'; // Assurez-vous que moyenne() et mediane() sont définies ici
include 'triangle.php';    // Assurez-vous que triangle() est définie ici
include 'read_tab.php';    // Assurez-vous que afficher_tableau_valeur() et afficher_tableau_reference() sont définies ici
include 'tri_selection.php'; // Assurez-vous que tri_selection_valeur() et tri_selection_reference() sont définies ici

echo "<pre>"; // Ajout pour bien afficher le contenu

// Calcul de la moyenne
$tab = [15, 12, 9]; 
$moyenneNotes = moyenne($tab);
echo "La moyenne des notes est : " . $moyenneNotes . "<br>";

// Calcul de la médiane
echo "Médiane des tableaux :<br>";
mediane([2007, 2002, 2003, 2005, 2020, 2016, 2011]); // Affichage dans la fonction mediane
mediane([1500, 4500, 2200, 1500, 3300, 1800, 1700, 2000, 4000]); // Idem

echo "<br>";

// Tri par sélection
echo "Tri du premier tableau :<br>";
$tableau1 = [22, 13, 9, 50, 70];
$tableau1_trie = tri_selection_valeur($tableau1);
afficher_tableau_valeur($tableau1_trie);

echo "<br>";

echo "Tri du deuxième tableau :<br>";
$tableau2 = [20, 37, 12, 40, 56, 8];
tri_selection_reference($tableau2);
afficher_tableau_reference($tableau2);

echo "<br>";

// Affichage d'un triangle
echo "Affichage du triangle :<br>";
triangle(10);

echo "</pre>";
?>
