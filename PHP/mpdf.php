<?php
	
	if(file_exists("../PHP/LoadTasks.php"))
		 include("../PHP/LoadTasks.php");
	if(file_exists("../PHP/SqlQuery.php"))
       include("../PHP/SqlQuery.php");

	
  include("../mpdf60/mpdf.php");

  		session_start();

		$where = ($_SESSION['email'] != "root@itsmylife.com") ? "where j.owner = '".$_SESSION['email']."' or ".
					"j.useremail ='".$_SESSION['email']."'" : "";

	
	   	$strQuery = "select * from (".
					"tasks t full join taskshares s on (t.idtask = s.idtask))j ". $where;
 					

		//$strQuery = "SELECT * FROM tasks WHERE owner ='". $_SESSION['email']."'";
	    $Result = SqlExec($strQuery);
	   
	   	$first = true;

	   	$result = "<head>".
					"<title>ItsMyLife</title>".
					"<meta charset = 'utf-8'/>".
					"<link rel='stylesheet' type='text/css' href='../CSS/start.css'>".
					"<link rel='icon' type='image/x-icon' href='../img/Icon.ico'>".
				"</head>";
	  	while ($row = pg_fetch_array($Result)){

	  		$owner = ($_SESSION['email'] == "root@itsmylife.com") ? "(".$row[4].")" : "";

			
		    $result .= "<div class='PostFeed'>".
				 "<div class = 'Task'>".
							"<table>".
								"<tr>".
									"<td class = 'TaskTitle'>".
										$row[1]. $owner.
									"</td>".
								"</tr>".
								"<tr>".
									"<td>".
								
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
	 


  $mpdf=new mPDF();
  $mpdf->WriteHTML($result);
  $mpdf->Output();
  exit();