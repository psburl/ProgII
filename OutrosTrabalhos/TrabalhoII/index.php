<?php
if (!empty($_POST["calcular"])) {

	$altura = $_POST['altura'];

	$base = $_POST['base'];

	$area = $base * $altura;
  
	echo "Um retangulo com os lados ".$base." e ".$altura. " tem area de ".$area."<BR>";
}
?>
