<?php
	
	if(file_exists("PHP/SqlQuery.php"))
       include("PHP/SqlQuery.php");

	function LoadTasks(){

		$where = ($_SESSION['email'] != "root@itsmylife.com") ? "where j.owner = '".$_SESSION['email']."' or ".
					"j.useremail ='".$_SESSION['email']."'" : "";

	
	   	$strQuery = "select * from (".
					"tasks t full join taskshares s on (t.idtask = s.idtask))j ". $where;
 					

		//$strQuery = "SELECT * FROM tasks WHERE owner ='". $_SESSION['email']."'";
	    $Result = SqlExec($strQuery);
	   
	   	$first = true;

	  	while ($row = pg_fetch_array($Result)){

	  		$owner = ($_SESSION['email'] == "root@itsmylife.com") ? "(".$row[4].")" : "";

			
		    echo "<div class='PostFeed'>".
				 "<div class = 'Task'>".
							"<table>".
								"<tr>".
									"<td class = 'TaskTitle'>".
										$row[1]. $owner.
									"</td>".
								"</tr>".
								"<tr>".
									"<td>".
										"<div class='menuTaskOptions'>".
								            "<li class = 'menuimgconf'><img src = 'CSS/img/menu.png'>".
								                "<ul class = 'ListTaskOptions'>".
								                    "<li class = 'taskOption atribuir'><a href='#atribuir$row[0]' rel ='modal'>Atribuir</a>".	
								                    
								                    "</li>".
								                    "<li class = 'taskOption'><a href='#alterar$row[0]' rel='modal'>Alterar</a></li>".
								                    "<li class = 'taskOption'><a href='PHP/DeleteTask-Remind.php?id=".$row[0]."&type=0'>Excluir</a></li>".                    
								                "</ul>".
								            "</li>".                	
										"</div>".
										"<div class='window' id='atribuir$row[0]'>".
											"<a href='#' class='close'>__</a>".
											"<form id = 'frmAtr' method = 'post' action = 'PHP/AtrTask.php?id=".$row[0]."'>".	
											"<textarea id = 'txtAtr' name = 'txtAtr' class = 'atribuirTextArea' placeholder=''></textarea>".
											"<input type = 'submit' id = 'btnAtr' name 'btnAtr' class = 'buttons btnstr' value = 'Atribuir'/>".
											"</form>".
										"</div>".
										"<div class='window' id='alterar$row[0]'>".
										"<a href='#' class='close'>__</a>".
										"<form id = 'FormTask' method='post' onsubmit='validate(); return false;' action = 'PHP/CreateTask.php'>".	
											"<table>".
												"<tr>".
													"<td colspan='2' class = 'lblNewPost'>Título:</td>".
												"</tr>".
												"<tr>".
													"<td colspan='2'>".
														"<textarea id = 'taskTitle' name = 'taskTitle' class = 'TxtTitles required' placeholder='Digite aqui o título de sua nova tarefa.'>".$row[1]."</textarea>".
													"</td>".
												"</tr>".
												"<tr>".
													"<td colspan='2' class = 'lblNewPost'>Descrição</td>".
												"</tr>".
												"<tr>".
													"<td colspan='2'>".
														"<textarea id = 'taskDescription' name = 'taskDescription' class = 'FeedTextArea required' value=''>".$row[2]."</textarea>".
													"</td>".
												"</tr>".
												"<tr>".
													"<td class = 'lblNewPostMiddle'>Data</td>".
												"</tr>".
												"<tr>".
													"<td>".
														"<input type= 'text' name= 'data' id = 'data' class = 'FeedMiddleTextArea required' placeholder='Clique para adicionar uma data.'  size='10'length='10' value = '".date('d-m-Y', strtotime($row[3]))."'/>".
													"</td>".
												"</tr>".	
												"<tr>".
													"<td colspan='2' class = 'lblNewPost'>Local</td>".
												"</tr>".
												"<tr>".
													"<td colspan='2'>".
														"<textarea id = 'taskLocal' name = 'taskLocal' class = 'TxtTitles' placeholder='Digite aqui, se necessário, o local de sua nova tarefa.'>"."</textarea>".
													"</td>".
												"</tr>".
											"</table>".
												"<input type = 'submit' id = 'btnNewTask' name 'btnNewTask' class = 'buttons' value = 'Alterar'/>".	
										"</form>".
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
			    	 "</div>".
		     "</div>";  
		 }
	  

	}

	function LoadReminders(){

		$strQuery = "SELECT * FROM reminders WHERE owner ='". $_SESSION['email']."'";
	    $Result = SqlExec($strQuery);
	   
	   	$first = true;

	  	while ($row = pg_fetch_array($Result)){
			
		    echo "<div class='PostFeed'>".
				 "<div class = 'Task'>".
						"<form id = 'FormTask' method = 'post' action = ''>".
							"<table>".
								"<tr>".
									"<td class = 'TaskTitle'>".
										
									"</td>".
								"</tr>".
								"<tr>".
									"<td>".
										"<div class='menuTaskOptions'>".
								            "<li class = 'menuimgconf'><img src = 'CSS/img/menu.png'>".
								                "<ul class = 'ListTaskOptions'>".
								                    "<li class = 'taskOption'><a href='#'>Atribuir</a></li>".
								                    "<li class = 'taskOption'><a href='#'>Alterar</a></li>".
								                    "<li class = 'taskOption'><a href='PHP/DeleteTask-Remind.php?id=".$row[0]."&type=1'>Excluir</a></li>".                    
								                "</ul>".
								            "</li>".                	
										"</div>".
									"</td>".
								"</tr>".
								"<tr>".
								"</tr>".
								"<tr>".
									"<td class = 'TaskLabels'>".
										$row[1].
									"</td>".
								"</tr>".
			    	    	"</table>".
			    	    "</form>".
			    	 "</div>".
		     "</div>";  
		 }
	}
?>