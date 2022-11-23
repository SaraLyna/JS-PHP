<?php
class FileBookReader implements BookReader{
	
	private $file; // file resource
	
	function __construct(string $fileName){
		$this->file = fopen($fileName,'r');
	}
	

	function readBook() : ?array {
		$line=fgets($this->file);
		   $res=array();
			 while ($line !== FALSE && trim($line)!=""){
				 $pos=strpos($line,":");
				 if($pos===FALSE){
					 throw new exception(" n'a pas de : ");
			   }
				 $name=trim(substr($line,0,$pos));
				 $value=trim(substr($line,$pos+1));
				 $res[$name]=$value;
				 $line=fgets($this->file);
	     }
			 return $res;

	
	}
	
	
}

?>
