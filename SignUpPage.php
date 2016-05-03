

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
					</tr>
					<tr>
						<td> 
							<input class="required" id = "name" name = "name" type= "text" placeholder="Nome" value = 
							<?php
								echo $_POST['name'];
							?>>
						</td>
					</tr>
					<tr>
						<td class = "SignUpLabels">Sobrenome:</td>
					</tr>
					<tr>	
						<td>
							<input class="required" id = "lastname" name = "lastname" placeholder="Sobrenome" 
							value = <?php
								echo $_POST['lastName'];
							?>>
						</td>
					</tr>
					<tr>
						<td class = "SignUpLabels">Email:</td>
					</tr>
					<tr>
						<td>
							<input class="required" id = "email" name = "email" type = "email" placeholder="email@provedor.com" value = 
							<?php
								echo $_POST['email'];
							?>>
						</td>
					</tr>
					<tr>
						<td class = "SignUpLabels">Senha:</td>
					</tr>
					<tr>
						<td> 
							<input class="required" id = "password" name = "password" type = "password" maxlength = "16" placeholder="senha" value = 
							<?php
								echo $_POST['password'];
							?>>
						</td>
					</tr>
					<tr>
						<td class = "SignUpLabels">Confirmação de Senha:</td>
					</tr>
					<tr>
						<td>
							<input class="required" id = "passwordConfirm" name = "passwordConfirm" type = "password" maxlength = "16" placeholder="confirmação de senha" value = 
							<?php
								echo $_POST['passwordConf'];
							?>>
						</td>
					</tr>
					<tr>
						<td class = "SignUpLabels">Telefone:</td>
					</tr>
					<tr>
						<td>
							<input class="required" id = "phone" name = "phone" type = "text" maxlength = "16" placeholder="Telefone" >
						</td>
					</tr>
					<tr>
						<td colspan = "2" class = "SignUpLabels">Rua: </td>
					</tr>
					<tr>
						<td colspan = "2">
							<input id = "street" name = 'street' type = "text" maxlength = "50" placeholder="Rua" class = "required">
						</td>
					</tr>
					<tr>
						<td colspan = "2" class = "SignUpLabels">Numero: </td>
					</tr>
					<tr>
						<td colspan = "2">
							<input id = "number" name = 'number' type = "text" maxlength = "50" placeholder="Numero" class = "required">
						</td>
					</tr>
					<tr>
						<td colspan = "2" class = "SignUpLabels">Complemento: </td>
					</tr>
					<tr>
						<td colspan = "2">
							<input id = "passwordCofirm" name = 'complement' type = "text" maxlength = "50" placeholder= "complement" class = "required">
						</td>
					</tr>
					<tr>
						<td colspan = "2" class = "SignUpLabels">Bairro: </td>
					</tr>
					<tr>
						<td colspan = "2">
							<input id = "neighborhood" name = 'neighborhood' type = "text" maxlength = "50" placeholder="Cidade" class = "required">
						</td>
					</tr>
					<tr>
						<td colspan = "2" class = "SignUpLabels">Cidade: </td>
					</tr>
					<tr>
						<td colspan = "2">
							<input id = "city" name = 'city' type = "text" maxlength = "20" placeholder="Cidade" class = "required">
						</td>
					</tr>
					<tr>
						<td colspan = "2" class = "SignUpLabels">Estado: </td>
					</tr>
					<tr>
						<td colspan = "2">
							<input id = "state" name = 'state' type = "text" maxlength = "2" placeholder="Estado" class = "required">
						</td>
					</tr>
					<tr>
						<td colspan = "2" class = "SignUpLabels">País: </td>
					</tr>
					<tr>
						<td colspan = "2">
							<input id = "country" name = 'country' type = "text" maxlength = "2" placeholder="País" class = "required">
						</td>
					</tr>
					<tr>
						<td colspan = "2" class = "SignUpLabels">CEP: </td>
					</tr>
					<tr>
						<td colspan = "2">
							<input id = "zipCode" name = 'zipCode' type = "text" maxlength = "10" placeholder="CEP" class = "required">
						</td>
					</tr>
					<tr>
						<td>
							<input id = "LoginButton" name = "btnSignUp" type="submit" value="Cadastre-se">
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