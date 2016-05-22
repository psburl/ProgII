<!doctype html>

<html lang = "pt-br">
	<head>
		<title>It'sMyLife</title>
		<meta charset = "utf-8"/>
		<script type="text/javascript" src="JS/jquery-2.2.1.js"></script>
		<script type="text/javascript" src="JS/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="JS/hideDisplay.js"></script>
		<script type="text/javascript" src="JS/calendary.js"></script>
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script type="text/javascript" src="JS/LoadTasks.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="CSS/start.css">
		<link rel="icon" type="image/x-icon" href="img/Icon.ico">
		<script type="text/javascript" src="JS/jquery.validate.js"></script>
	</head>
	<?php
		session_start();
		$Result  = ($_SESSION['Result']) ? $_SESSION['Result'] : "";

	?>
	
	<body>
		<div id = "SiteArea" name ="SiteArea">
			<div id = "LeftPanel">
				<div id = "UserPicture" >
					<img id = "UserPicture" src = "CSS/img/AvatarDefault.png"/>
				</div>
				<div id = "UserName" name = "UserName">
					<?php 
						echo $Result['3'];
							
					?>
				</div>
				<div id = "FriendPanel"></div>
			</div>
			<div id = "FeedArea">
				<div id = "fixButton">
					<input type="submit" value="Lembrete" class = "fixesbuttons" id = "btnReminder">
					<input type="submit" value="Tarefa"  class = "fixesbuttons" id = "btnTask">
				</div>
				<div id = "TypefulTextArea">
					<form id = "FormReminder">
						<table>
							<tr>
								<td colspan="2" class = "lblNew">Novo Lembrete</td>
							</tr>
							<tr>
								<td colspan="2" class = "lblNewPost">Lembrete:</td>
							</tr>	
							<tr>
								<td colspan="2">
									<textarea id = "taskDescription" name = "taskDescription" class = "FeedTextArea" placeholder="Digite aqui o que deseja lembrar!"></textarea>
								</td>
							</tr>
						</table>
						<input type = "submit" id = "btnNewReminder" name "btnNewReminder" class = "buttons" value = "Criar"/>
					</form>
					<div id = "PostFeed"></div>
				</div>
				<div id = "TypeTaskArea" >
					<form id = "FormTask" method="post" onsubmit="validate(); return false;" action = "PHP/CreateTask.php">
						<table>
							<tr>
								<td colspan="2" class = "lblNew" >Nova Tarefa</td>
							</tr>
							<tr>
								<td colspan="2" class = "lblNewPost">Título:</td>
							</tr>
							<tr>
								<td colspan="2">
									<textarea id = "taskTitle" name = "taskTitle" class = "TxtTitles required" placeholder="Digite aqui o título de sua nova tarefa."></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="2" class = "lblNewPost">Descrição:</td>
							</tr>
							<tr>
								<td colspan="2">
									<textarea id = "taskDescription" name = "taskDescription" class = "FeedTextArea required" placeholder="Digite aqui a descrição de sua nova tarefa."></textarea>
								</td>
							</tr>
							<tr>
								<td class = "lblNewPostMiddle">Data:</td>
							</tr>
							<tr>
								<td>
									<input type= "text" name= "data" id = "data" class = "FeedMiddleTextArea required" placeholder="Clique para adicionar uma data."  size="10" maxlength="10"/>
								</td>
							</tr>	
							<tr>
								<td colspan="2" class = "lblNewPost">Local:</td>
							</tr>
							<tr>
								<td colspan="2">
									<textarea id = "taskLocal" name = "taskLocal" class = "TxtTitles" placeholder="Digite aqui, se necessário, o local de sua nova tarefa."></textarea>
								</td>
							</tr>
							</table>
						</table>
							<input type = "submit" id = "btnNewTask" name "btnNewTask" class = "buttons" value = "Criar"/>	
					</form>
					<div id = "PostFeed">
						
						<?php
							if(file_exists("PHP/LoadTasks.php"))
						       include("PHP/LoadTasks.php");

						   	LoadTasks();
						?>
					</div>
				</div>
				
				
			</div>
		</div>
		<div id = "UserStorage">
			<div id = "AddInStorage">
				<div id = "btnAddNewFolder">
					
					<input type = "submit" id = "btnNewFolder" name "btnNewFolder" value = ""/>
				</div>
				<div id = "btnAddNewFile">
				</div>
			</div>
		</div>
		<div id = "loginBar">
			<form id = "frmLogin" method="post" action = "authentic.php">
				<a id = "btnLogout"></a>
				<a id = "logo"></a>
			</form>
		</div>
	</body>
		
</html>