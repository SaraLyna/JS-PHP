<?php
class FileBookReader implements BookReader{
	
	private $file; // file resource
	
	function __construct(string $fileName){
		$this->file = fopen($fileName,'r');
	}
	

	
	function readBook() : ?array {
		$line = fgets($this->file);
			 $result = array();
			 while ($line !== FALSE && trim($line) != ""){
					 $pos = strpos($line,":");
					 if ($pos === FALSE){
							 throw new Exception("Absence de : ");
					 }
					 $name = trim(substr($line,0,$pos));
					 $value = trim(substr($line, $pos+1));
					 $result[$name] = $value;
					 $line = fgets($this->file);
					 
			 }
			 return $result;


	}
}

?>