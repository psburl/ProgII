<?php
	
	if(file_exists("SqlQuery.php"))
       include("SqlQuery.php");

	function LoadTasks(){

		if(file_exists("PHP/SqlQuery.php"))
	       include("PHP/SqlQuery.php");

		$strQuery = "SELECT * FROM tasks WHERE owner ='". $_SESSION['email']."'";
	    $Result = SqlExec($strQuery);
	   
	   	$first = true;

	  	while ($row = pg_fetch_array($Result)){
			
		    echo "<div class='PostFeed'>".
				 "<div class = 'Task'>".
						"<form id = 'FormTask' method = 'post' action = ''>".
							"<table>".
								"<tr>".
									"<td class = 'TaskTitle'>".
										$row[1].
									"</td>".
								"</tr>".
								"<tr>".
									"<td>".
										"<div class='menuTaskOptions'>".
								            "<li class = 'menuimgconf'><img src = 'CSS/img/menu.png'>".
								                "<ul class = 'ListTaskOptions'>".
								                    "<li class = 'taskOption'><a href='#'>Atribuir</a></li>".
								                    "<li class = 'taskOption'><a href='#'>Alterar</a></li>".
								                    "<li class = 'taskOption'><a href='PHP/DeleteTask.php?id=".$row[0]."'>Excluir</a></li>".                    
								                "</ul>".
								            "</li>".                	
										"</div>".
									"</td>".
								"</tr>".
								"<tr>".
								"</tr>".
								"<tr>".
									"<td class = 'TaskLabels'>".
										$row[2].
									"</td>".
								"</tr>".
								"<tr>".
									"<td class = 'TaskDate'>".
										"Data Final: ".date('d-m-Y', strtotime($row[3])).
									"</td>".
								"</tr>".
			    	    	"</table>".
			    	    "</form>".
			    	 "</div>".
		     "</div>";  
		 }
	  

	}
?>