<?php
set_include_path('..'.PATH_SEPARATOR);
require_once('lib/common_service.php');
require_once('lib/initDataLayer.php');
require_once('lib/fonctions_parms.php');

try{
  $insee=checkString('insee',NULL,TRUE);
  $details=$data->getDetails($insee);
  produceResult($details);
}
catch (PDOException $e){
      produceError($e->getMessage());
}
catch (ParmsException $e){
      produceError($e->getMessage());
}

?>
