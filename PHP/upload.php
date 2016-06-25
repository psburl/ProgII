 <?php
$pasta = "/var/www/html/ProgII/files";
/* Coloque aqui,
a pasta no servidor onde os arquivos serão salvos.
Atenção: se você não
souber sua pasta no servidor, contate o administrador
do mesmo. */
$file = $_POST['file'];

$dest = $pasta."/"."nome.csv"; // Não altere esta variável.

if(!move_uploaded_file($file, $dest)) { // Executa o comando do upload no servidor
   echo "Não foi possível
enviar o arquivo!"; /* Caso não foi possível
enviar o arquivo,
   mostra o erro. */
} else {
   echo "Arquivo enviado com sucesso!";
/* Caso o arquivo tenha sido enviado
   com sucesso, mostra a mensagem de
sucesso. */
}
?>