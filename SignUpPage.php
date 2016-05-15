

<html lang="pt-BR">
	<head>
		<title>Cadastro</title>
		<meta charset="utf-8"/>
		<script type="text/javascript" src="JS/jquery-2.2.1.js"></script>
		<script type="text/javascript" src="JS/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="JS/fieldsValidate.js"></script>
		<script type="text/javascript" src="JS/jquery.js"></script>
		<script type="text/javascript" src="JS/jquery.validate.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/SignUp.css">
		<link rel="stylesheet" type="text/css" href="CSS/master.css">
	</head>

	<body>
		<div id="SignUpBox">
			
			<!--Criação de mini-formulario para Cadastro-->

			<form id = "frmSignUp" method = "post" onsubmit="validate(); return false;" action = "PHP/SignUp.php">
				<table>
					<tr>
						<td class = "SignUpLabels">Nome:</td>
						<td class = "SignUpLabels lbl2">Sobrenome:</td>
					</tr>
					<tr>
						<td> 
							<input class="required Inputs Mid" id = "name" name = "name" type= "text" placeholder="Digite o seu nome" value = 
							<?php
								echo $_POST['name'];
							?>>
						</td>
						<td>
							<input class="required Inputs Mid" id = "lastname" name = "lastname" placeholder="Digite o seu sobrenome" 
							value = <?php
								echo $_POST['lastName'];
							?>>
						</td>
					</tr>
					<tr>
						<td colspan = "2" class = "SignUpLabels Full">Email:</td>
					</tr>
					<tr>
						<td colspan = "2" >
							<input class="required Inputs Full" id = "email" name = "email" type = "email" placeholder="Digite o seu email" value = 
							<?php
								echo $_POST['email'];
							?>>
						</td>
					</tr>
					<tr>
						<td class = "SignUpLabels">Senha:</td>
						<td class = "SignUpLabels">Confirmação de Senha:</td>
					</tr>
					<tr>
						<td> 
							<input class="required Inputs Mid" id = "password" name = "password" type = "password" maxlength = "16" placeholder="Digite a sua senha" value = 
							<?php
								echo $_POST['password'];
							?>>
						</td>
						<td>
							<input class="required Inputs Mid" id = "passwordConfirm" name = "passwordConfirm" type = "password" maxlength = "16" placeholder="Confirmação de senha" value = 
							<?php
								echo $_POST['passwordConf'];
							?>>
						</td>
					</tr>
					<tr>
						<td colspan = "2" class = "SignUpLabels">Telefone:</td>
					</tr>
					<tr>
						<td colspan = "2" >
							<input class="required Inputs Full" id = "phone" name = "phone" type = "text" maxlength = "16" placeholder="Telefone" >
						</td>
					</tr>
					<tr>
						<td class = "SignUpLabels">País: </td>
						<td class = "SignUpLabels">Estado: </td>
					</tr>
					<tr>
						<td>
							<input id = "country" name = 'country' type = "text" maxlength = "2" placeholder="País" class = "required Inputs Mid">
						</td>
						<td>
							<input id = "state" name = 'state' type = "text" maxlength = "2" placeholder="Estado" class = "required Inputs Mid">
						</td>
					</tr>
					<tr>
						<td class = "SignUpLabels">Cidade: </td>
						<td class = "SignUpLabels">CEP: </td>
					</tr>
					<tr>
						<td>
							<input id = "city" name = 'city' type = "text" maxlength = "20" placeholder="Cidade" class = "required Inputs Mid">
						</td>
						<td>
							<input id = "zipCode" name = 'zipCode' type = "text" maxlength = "10" placeholder="CEP" class = "required Inputs Mid">
						</td>
					</tr>
					<tr>
						<td class = "SignUpLabels">Rua: </td>
						<td class = "SignUpLabels">Bairro: </td>
					</tr>
					<tr>
						<td>
							<input id = "street" name = 'street' type = "text" maxlength = "50" placeholder="Rua" class = "required Inputs Mid">
						</td>
						<td>
							<input id = "neighborhood" name = 'neighborhood' type = "text" maxlength = "50" placeholder="Cidade" class = "required Inputs Mid">
						</td>
					</tr>
					<tr>
						<td class = "SignUpLabels">Numero: </td>
						<td class = "SignUpLabels">Complemento: </td>
					</tr>
					<tr>
						<td>
							<input id = "number" name = 'number' type = "text" maxlength = "50" placeholder="Numero" class = "required Inputs Mid">
						</td>
						<td>
							<input id = "complement" name = 'complement' type = "text" maxlength = "50" placeholder= "Complemento" class = "required Inputs Mid">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input id = "LoginButton" class = "buttons" name = "btnSignUp" type="submit" value="Cadastre-se">
						</td>
					</tr>					
				</table>
			</form>
			
			<!--Logotipo dentro do cadastro-->
			
			<div id = "Logo">
				<img alt = "erro" src = "img/logotipo.png">						
			</div>
		</div>

		<!--Rodapé-->

		<div id="footer">
			<nav id="subFooter">
				<ul>
					<li><a href="#P">Politicas</a></li>
					<li><a href="#H">Ajuda</a></li>
					<li><a href="TrabalhoI/index.htm">Web Designer</a></li>
					<li><a href="#T">Termos</a></li>
				</ul>
			</nav>
		</div>

	</body>
</html>