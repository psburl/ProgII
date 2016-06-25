<?php
	
	function CreateFolder($name){
		mkdir("/var/www/html/ProgII/files/".$name, 0777) or die("erro ao criar diretório");
	}

?>


