<?php
    require_once('conexao.php');
   

   

// Gerar um novo token de acesso para o Dropbox a cada 3 horas/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.dropbox.com/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "refresh_token=<REFRESH_TOKEN_HERE>&grant_type=refresh_token&client_id=<KEY_HERE>&client_secret=<SECRET_HERE>");
$body = curl_exec($ch);
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
//Instancia o token para que ele possa ser acessado e visto sozinho
 $ViewToken =json_decode($result,1);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

else{

    if (is_array($result) || is_object($result))
{
    foreach ($result as $r) {
        //vizualisa o token:
        echo  "\n",$ViewToken['access_token'],"</br>";
    }
}


$obj = json_decode($result);
//Insere o token dentro de uma variavel 
$separado=print $obj->{'access_token'};
$separados=$obj->{'access_token'};

//Pega o horario atual e multiplica adicionando mais 3 horas  
$selectedTime =  date("Y-m-d H:i:s",strtotime("+0 week 0 days -5 hours 2 seconds"));
$timestamp = strtotime($selectedTime) + 60*180;
//Insere esse novo horario dentro de uma variavel 
$time = date('Y-m-d H:i:s', $timestamp);


//Insere a data atual dentro de uma variavel usaremos depois isso
$updated=date('Y-m-d H:i:s',strtotime("+0 week 0 days -5 hours 0 seconds"));

//Abaixo tem o exemplo caso queira inserir mas no caso vamos so atualizar para receber os novos valores

//$sql = "INSERT INTO users ( token,token_expires ) VALUES ('$separados','$time')";
$sql = "UPDATE users SET token='$separados' ,token_expires='$time', updated_at='$updated' WHERE id=50";

if($conn->query($sql) === true){
    echo "Atualizado com Suceso.";
} else{
    echo "Erro:Não foi possivel porque: $sql. " . $mysqli->error;
}
   
}
curl_close($ch);


?>