<?php


function elementBuilder(string $elementType,string  $content,string $elementClass="") : string {
    if($elementClass == ""){
      $res = "<".$elementType.">".$content."<"."/".$elementType.">";
    }
    else {
      $res = "<".$elementType." class=\"".$elementClass."\"".">".$content."<"."/".$elementType.">";
    }
    return $res;
  }
function authorsToHTML(string $authors) : string {
        $res4 = "";
        $res1 = explode("-",$authors);
        $i = 0;
        while ($i<count($res1)){
          $res2=trim($res1[$i]);
          $res4= $res4."<span>$res2</span>";
          $i++;
        }
        return $res4;	
}

function coverToHTML(string $fileName) : string {
    return "<img src=\"couvertures/".$fileName."\" alt=\"image de couverture\" />";
}


function propertyToHTML(string $propName, string $propValue) : string {
	if($propName=='titre'){
		$res="<h2 class=\"titre\">".$propValue."</h2>";
	}
	elseif ($propName =='couverture') {
		$res="<div class=\"couverture\">".coverToHTML($propValue)."</div>";
	}
	elseif($propName =='auteurs'){
		$res="<div class=\"auteurs\">".authorsToHTML($propValue)."</div>";
	}
	elseif($propName =='annee'){
		$res="<time class=\"annee\">".$propValue."</time>";
	}
	else{
		$res="<div class=\"".$propName."\">".$propValue."</div>";
	}

	return $res;
}

	


function bookToHTML(array $book) : string {
    $res = "";
	foreach ($book as $key => $value) {
		if ($key == 'couverture'){
		$res1=propertyToHTML($key,$value);
		# code...
		}
		else{
		$res=$res.propertyToHTML($key,$value);
    }
   }
$res = elementBuilder('div',$res,'description');
$res=$res1.$res;
return elementBuilder('article',$res,'livre');
}



// exercice 2

function libraryToHTML(BookReader $datalayer) : string {
    $res = "";
	$book = $datalayer->readBook();
	foreach ($book as $key => $value) {
		$res=$res.bookToHTML($value);

	}

	return $res;
}
?>
   
