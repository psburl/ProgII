<!doctype html>

<html lang = "pt-br">
	<head>
		<title>It'sMyLife</title>
		<meta charset = "utf-8"/>
		<script type="text/javascript" src="JS/jquery-2.2.1.js"></script>
		<script type="text/javascript" src="JS/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="JS/hideDisplay.js"></script>
		<script type="text/javascript" src="JS/calendary.js"></script>
		<script type="text/javascript" src="JS/email.js"></script>
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script type="text/javascript" src="JS/LoadTasks.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="CSS/start.css">
		<link rel="icon" type="image/x-icon" href="img/Icon.ico">
		<script type="text/javascript" src="JS/jquery.validate.js"></script>
	</head>
	<?php

		if(file_exists("PHP/LoadStorage.php"))
			include("PHP/LoadStorage.php");

		session_start();

		$Result  = ($_SESSION['Result']) ? $_SESSION['Result'] : "";
	?>
	
	<body>

		<div id = "SiteArea" name ="SiteArea">
			<div id = "LeftPanel">
				<div id = "UserPicture" >
					<img id = "UserPicture" src = "CSS/img/AvatarDefault.png"/>
				</div>
				<div id = "UserName" name = "UserName"><?php echo $Result['3'];	?></div>
				<div id = "FriendPanel">
					<div id = "divSendEmail" class = 'divSendEmail's>
						<a href = "#sendEmail" id = "btnSendEmail" rel = "modal">Novo Email</a>
					</div>
					<div class="window" id="sendEmail">
					    <a href="#" class="close">__</a>
					    <form  id = 'frmEmail' method="post" onsubmit="validate(); return false;" action = "PHP/SendEmail.php">

		    				<textarea id = "btnSendEmailTo" name = "btnSendEmailTo" class = "sendEmailTo" placeholder="Digite o remetente"></textarea>

		    				<textarea id = "btnSendEmailRespect" name = "btnSendEmailRespect" class = "sendEmailRespect" placeholder="Digite o assunto"></textarea>

		    				<textarea id = "btnSendEmailBody" name = "btnSendEmailBody" class = "sendEmailBody" placeholder="Digite o corpo do email"></textarea>

		    				<input type = "submit" id = "btnSend" name "btnSendEmail" class = "buttons btnEmail" value = "Enviar"/>
					    </form>
					</div>
					<div id = "divSendMessage" class = 'divSendEmail'>
						<a href = "#sendMessage" id = "btnSendMessage" rel = "modal">
							Nova Mensagem
						</a>
					</div>
					<div class="window" id="sendMessage">
					    <a href="#" class="close">__</a>
					    <form  id = 'frmMessage' method="post" onsubmit="validate(); return false;" action = "PHP/SendMessage.php">
					    	<textarea id = "btnSendMessageTo" name = "btnSendMessageTo" class = "sendEmailTo" placeholder="Digite o remetente"></textarea>
		    				<textarea id = "btnSendMessageBody" name = "btnSendMessageBody" class = "sendEmailBody" placeholder="Digite o corpo do email"></textarea>
		    				<input type = "submit" id = "btnSend" name "btnSendEmail" class = "buttons btnEmail" value = "Enviar"/>
					    </form>
					</div>
					
				</div>
				<?php 
						if($_SESSION['email'] == "root@itsmylife.com"){
							
							echo
							"<form id = '' method='post' action = 'PHP/mpdf.php'>".
								"<div id = '' class = ''>".
									"<input type = 'submit' id = 'pdf' value = 'Gerar Pdf
									'/>".
								"</div>".
							"</form>";
						}
				?>

			</div>
				
			<div id = "FeedArea">
				<div id = "fixButton">
					<input type="submit" value="Lembrete" class = "fixesbuttons" id = "btnReminder">
					<input type="submit" value="Tarefa"  class = "fixesbuttons" id = "btnTask">
				</div>
				<div id = "TypefulTextArea">
					<form id = "FormReminder" method="post" onsubmit="validate(); return false;" action = "PHP/CreateReminder.php">
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
					<div id = "PostFeed">
						<?php
							if(file_exists("PHP/LoadTasks.php"))
						       include("PHP/LoadTasks.php");

						   	LoadReminders();
						?>
					</div>
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
						   	LoadTasks();
						?>
					</div>
				</div>
				
				
			</div>
		</div>

		<div id = 'minimizedUserStorage'><a id = 'showMUS'>Mostrar Arquivos</a></div>
		<div id = 'maximizedUserStorage'>
			<div><a id ='closeMUS'>__</a></div>
			
			<form id = "frmUserStorage" method="post" action = "PHP/createFolder.php">
	 		<?php
					LoadStorage("");
			?>
			</form>
		</div>
		<div id = "UserStorage">
		<form id = "frmUserStorage" method="post" action = "PHP/createFolder.php">
	 		<?php
					LoadStorage("");
	   		?>
		</form>
		</div>
		<div id = "loginBar">
			<form id = "frmLogin" method="post" action = "authentic.php">
				<a id = "btnLogout" href = 'PHP/Logout.php'></a>
				<a id = "logo"></a>
			</form>
		</div>
	</body>
		
</html>