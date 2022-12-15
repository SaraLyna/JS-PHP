<?php
set_include_path('..'.PATH_SEPARATOR);
require_once('lib/common_service.php');
require_once('lib/initDataLayer.php');
require_once('lib/fonctions_parms.php');

try{
  /**  $territoire = $_GET["territoire"];
*    if($territoire=="" || is_null($territoire)){
*        $communes = $data->getCommunes();
*        produceResult($communes);
*    }else{
*       $communes = $data->getCommunes($territoire);
*        if($territoire<0){
*            $e="territoire must be > 0";
*            produceError($e);
*        }else{
*            produceResult($communes);
*            //produceResult(1);
*    }
*}
*/
$territoire=checkUnsignedInt('territoire',NULL,FALSE);
$communes=$data->getCommunes($territoire);
produceResult($communes);
}
catch (PDOException $e){
    produceError($e->getMessage());
}
catch (ParmsException $e){
    produceError($e->getMessage());
}

?>
