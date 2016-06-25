<?php
	
	function LoadStorage($direc){

		$email = $_SESSION['email'];
		$Query = "SELECT * FROM userStorage WHERE email = '$email'";
        $Result =  SqlExec($Query);
        $Result = pg_fetch_array($Result);
        $directory = ($direc == "") ? "files/"."$Result[0]" : $direc;
		$dir  = opendir($directory); 
		$folders[] = null;
		$files[] = null;

		while ($itens_name = readdir($dir)) 
				 $itens[] = $itens_name;
			
		sort($itens); 

		foreach ($itens as $list) { 

			if ($list!="." && $list!=".."){ 
   				
   				if (is_dir($directory."/".$list)) { 
    				
    				$folders[]=$list; 
    			
    			} else{  
        			
        			$files[]=$list;
    			}
			}
		}    

		foreach($files as $list)
			if($list != null){
		    	print "<div class = 'storageFile'><a href='$directory/$list'>$list</a></div>";
			}

		foreach($folders as $list)
			if($list != null){
				$value = str_replace("/", "-", $directory."/".$list);
		   		print "<div class = 'storageFolder' value = '$value' >".
		   					"<a href=''>$list</a>";
		   						LoadStorage($directory."/".$list);
		   				print	
		   				"</div>";
			}
	}

?>