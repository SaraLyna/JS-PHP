<?php
 // Inclusion de la bibliothèque de fonctions :
  require("lib/BookReader.class.php");
  require("lib/FileBookReader.class.php");
  require("lib/fonctionsLivre.php");
 
 // Lecture  du fichier et mémorisation dans des variables PHP :
 //$reader1 = new BookReader();
 $reader = new FileBookReader('data/livres.txt');
 //$reader1 = $reader;
 $bookHTML = libraryToHTML($reader);
 
 // inclusion de la page template :
 require('views/Bibliothequeview.php');
?>