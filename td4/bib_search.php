<?php
    spl_autoload_register(function($classe){require "lib/$classe.class.php";}); // règle de chargement des classes
    require("etc/dsn_filename.php"); // definition de DSN_FILENAME

    require("lib/fonctionsLivre.php");
    require("lib/fonctions_parms.php");

    try {
        $authorID = checkUnsignedInt('author_id',NULL,FALSE);
        $year=checkUnsignedInt('year_id',NULL,FALSE);
        $dl = new DataLayer(DSN_FILENAME);
        $books = $dl->getBooksWithConds($year, $authorID);
        $libraryHTML = booksArrayToHTML($books);
        require("views/pageBibliotheque.php");

    } catch (ParmsException $e) {
        require "views/pageErreur.php";
    }
?>
