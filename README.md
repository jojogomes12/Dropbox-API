# Dropbox-API
Infinity Refresh token

Para usar esse repositorio você vai precisar utilizar os seguintes passos:

Extraia o arquivo: Vendor.rar.

Criar uma Aplicativo no:https://www.dropbox.com/developers/apps#settings
Liberar todas as permissões na guia :permisions

Verificar seu token.

Verificar sua key.

Verificar seu Secret.

Depois desses passos vamos criar um refresh token utilizando os seguintes passos:

Acesse esse link para gerar um  codigo de verificação:
https://www.dropbox.com/developers/documentation/http/documentation#authorization

Navegue até a parte de :Auth URL for code flow with offline token access type, para gerar um token de acesso offline.
Acesse:https://www.dropbox.com/oauth2/authorize?client_id=<APP_KEY>&token_access_type=offline&response_type=code

e utilize sua key para gerar o codigo, com o codigo em mãos agora iremos gerar um refresh token usando o comando:

curl https://api.dropbox.com/oauth2/token \
    -d code=AUTHORIZATIONCODEHERE \
    -d grant_type=authorization_code \
    -u APPKEYHERE:APPSECRETHERE​
LEMBRE DE INSERIR SUA KEY E SEU SECRET JUNTO DO SEU CODIGO DE AUTORIZAÇÃO!!!!!
com isso em mãos agora iremos gerar um token de acesso toda vez que o comando for executado utilizando o comando:


curl https://api.dropbox.com/oauth2/token \
   -d refresh_token=REFRESHTOKENHERE \
   -d grant_type=refresh_token \
   -d client_id=APPKEYHERE \
   -d client_secret=APPSECRETHERE



Agora converta esse codigo em um comando php e execute no seu projeto. Após isso pegue os valores e jogue dentro de variaveis que serão salvas no seu banco de dados.Pronto você tem tudo que precisa para gerar um token novo , automaticamente.


 





 
