<?php
    spl_autoload_register(function($classe){require "lib/$classe.class.php";}); // règle de chargement des classes
    require("etc/dsn_filename.php"); // definition de DSN_FILENAME

    require("lib/fonctionsLivre.php");
    require("lib/fonctions_parms.php");

    try {
        // author_id : entier sans signe - obligatoire
        $authorID = checkUnsignedInt('author_id');



        $dl = new DataLayer(DSN_FILENAME);
        $books = $dl->getBooksByAuthor($authorID);
        $libraryHTML = booksArrayToHTML($books);
        require("views/pageBibliotheque.php");

    } catch (ParmsException $e) {
        require "views/pageErreur.php";
    }
?>
