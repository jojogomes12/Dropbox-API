


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dropbox";

require  __DIR__. '/vendor/autoload.php';


use Spatie\Dropbox\Client as DropboxClient;
 use Spatie\Dropbox\TokenProvider  ;
 use Spatie\Dropbox\RefreshableTokenProvider;
 use GuzzleHttp\Client;
 use PHPUnit\Framework\TestCase;
 use GuzzleHttp\Exception\ClientException;
 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query  = "SELECT * FROM Users WHERE id = '50' LIMIT 1";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));



while($row = mysqli_fetch_assoc($result)) {
    $token = $row['token'];
    $validade = $row['token_expires'];
    //$atual = strtotime(date("Y-m-d H:i:s"));
    $atual=date('d/m/Y H:i:s',strtotime("+0 week 0 days -5 hours 0 seconds"));

    $today = date("Y-m-d H:i:s");  
   
   
}


if($atual>=$validade){
    echo '<br>';
echo ' ta na hora de trocar amigo',"<br>" ;
echo '<br>';
// Executa o crul para inserir novo dado na tabela 
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost/dropbox-oauth2-example/curl.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
 
exec('http://localhost/dropbox-oauth2-example/curl.php');


}
else{
    
    
 
}

if ($conn->query($query) == TRUE) {
    echo '<br>';
  echo "Dados:" ," <br> Validade: <strong>",$validade ," </strong> <br>", "Hoje:",$atual;

  

} else {
  echo "Error lista: " . $conn->error.mysqli_error($conn);
  ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
}

$conn->close();




//Formulario de criação de arquivos dropbox
$obDropboxClient = new DropboxClient($token);
//Criar uma Pasta no Dropbox



if(isset($_POST['submit']))

{
 
  
 
    if($atual>=$validade){
      exec("php curl.php");
 
      
  
    }
   

    
   $obDropboxClient->createFolder('Dropbox-Api/'.$_POST['n']);
   header("Location:index.php");
   die();
    

}





?>

<html>
    <head>
    <title>Dropbox-API</title>
        <meta charset="utf-8">
          <meta meta name="viewport" content=
            "width=device-width, user-scalable=no" />
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <div class="formulario">
<?php


?>

<form action="index.php" method="post">
  <div id="logo" class="logo">
    <img src="imagens/dropbox.png"> 
</div>
<div class="titulo">Dropbox</div>
<div class="inputs">
<label>NOME:</label> 
    <input type="text" name="n" />
   
  
   <button type="submit" name="submit" value="Criar Pasta">Criar Pasta</button>
</div>
<a href="https://twitter.com/prathkum">Lista arquivos</a>
</form>
</div>
    </body>
</html>
