<?php

function checkUnsigned(string $name) : ?string {
   if (! isset($_POST[$name]) && $_POST[$name]=""){
     throw new ParmsException();
   }
   else {
     return $_POST[$name];
   }


  }



 ?>