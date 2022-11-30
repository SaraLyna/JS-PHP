Nom des étudiants: (Groupe:8)
- Sara Lyna OUYAHIA
- Melissa ATMANI

But du td2:
Génération d'une page présentant des livres (et leur descriptions)
à partir de données situées dans un fichier.

Descriptions des méthodes:
EXERCICE1:
- readBook() :
on lit l'intégralité de la description du livre jusqu'a trouver un espace(chaine vide) ou la fin du fichier,
si ce n'est pas le cas, une exception est déclenchée, pour cela on a utilisé les méthodes pré-définies :strpos et trim.

-elementBuilder(string $elementType, string $content, string $elementClass="") : string
cette fonction renvoie une chaine de caractères représentant le code HTML de la description d'un livre.

-authorsToHTML(string $authors) : string
elle renvoie l'auteur d'un livre sous format HTML

-coverToHTML(string $fileName) : string
elle renvoie le nom de couverture d'un livre sous format HTML toujours.

-propertyToHTML(string $propName, string $propValue) : string
elle renvoie une chaîne contenant le code HTML représentant la propriété.

-bookToHTML(array $book) : string
elle renvoie une chaine contenant le code HTML d'un élément article.


EXERCICE2:
- readBook():
dans cette partie on modifie le code de cette fonction afin qu'elle renvoie NULL si elle ne contient que des lignes vides
ou aucune ligne d'ailleurs,
et on peut eventuellement trouver des lignes vides, donc elle ne déclenchera plus d'exceptions.

-libraryToHTML(BookReader $reader) : string
Le résultat de la fonction est une chaîne contenant le code HTML présentant l’ensemble des
livres du fichier.




Création de la page bibliotheque.php:
elle monterera le résultat finale (page montrant des livres)
tout en créant une view dans le répertoire views.

