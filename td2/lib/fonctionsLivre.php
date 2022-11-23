<?php
  function elementBuilder(string $elementType,string  $content,string $elementClass="") : string {
    $attClass="";
    if($elementClass !="")
    $attClass=" class=\" $elementClass\"";
    return "<{$elementType}{$attClass}>{$content}</{$elementType}>";
  }
  
  function authorsToHTML(string $authors) : string {
    $nom= explode(' - ',$authors);
    return "<span>".implode('</span> <span>',$nom)."</span>";
  }
  
  function coverToHTML(string $fileName) : string {
    return "<img src=\"couvertures/{$fileName}\"alt=\"image de couverture\" />";
  }
  
  function propertyToHTML(string $propName, string $propValue) : string {
    $element= match ($propName){
      "titre" => "h2",
      "année" => "time",
      default => "div"
    };
    $content = match ($propName){
    "authors" => authorsToHTML ($propValue),
    "couverture" => coverToHTML ($propValue),
    default => $propValue
  };
    return elementBuilder($element, $content, $propName);
  }
  
  function bookToHTML(array $book) : ?string {
    $res="";
    foreach($book as $propName =>$propValue){
      if ($propName == "couverture"){
        $res1= propertyToHTML($propName,$propValue);
      }
      else{
        $res=$res.propertyToHTML($propName,$propValue);
      }
    };
    $res= elementBuilder('div',$res,'description');
    $res=$res1.$res;
    return elementBuilder('article',$res,'livre');
  
  }
  
  
  // exercice 2
  
  function libraryToHTML(BookReader $datalayer) : string {
    $res="";
      $reader=$datalayer;
      $book=$reader->readBook();
      while ($book != null){
        $res .=bookToHTML($book);
        $book= $reader->readBook();
      }
      return $res;
  
  }
  

?>
