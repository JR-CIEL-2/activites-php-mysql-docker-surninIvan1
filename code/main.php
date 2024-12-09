<?php
include 'triselection.php';  // Inclut les fonctions de tri
include 'read_tab.php';       // Inclut la fonction d'affichage

// Exemple de tableau pour passer par valeur
$tab_valeur = [4, 2, 8, 1, 5];
echo "Test avec tri_selection_valeur :<br>";
echo "Tableau avant tri : ";
read_tab($tab_valeur); 
$sorted_tab_valeur = tri_selection_valeur($tab_valeur);
echo "<br>Tableau après tri : ";
read_tab($sorted_tab_valeur); 

echo "<br><br>";

// Exemple de tableau pour passer par référence
$tab_reference = [10, 3, 6, 7, 2];
echo "Test avec tri_selection_reference :<br>";
echo "Tableau avant tri : ";
read_tab($tab_reference); 
tri_selection_reference($tab_reference);
echo "<br>Tableau après tri : ";
read_tab($tab_reference);
?>