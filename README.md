# Envio de Email
Esse projeto tem o objetivo fazer envios de e-mails com php junto com a biblioteca Composer. 
# Composer
Cuidado, para conseguir instalar está biblioteca, será necessário o XAMPP como conector do [Composer](https://getcomposer.org/download/).

Caso seu SO, seja Windowns, apenas clique no primeiro link para download. Outros tipos, Linux, Mac OS, é por via terminal.

O [XAMPP](https://www.apachefriends.org/download.html) é ultilizado porque já vem instalado o php junto com o software, mais simples e prático de fazer o download.

# Como Iniciar

- Após baixar os dois programas, será necessário acessar o github do PHPMailer para copiar o `scr` e colar em seu projeto. Caso queira fazer o passo-a-passo.
  
- Para acessar o github do Composer, apenas navegue até `vendor/phpmailer/phpmailer` deste projeto, chegando no fim das pastas, você irá encontrar a documentação oficial. Se não, acesse-o [PHPMailer](https://github.com/PHPMailer/PHPMailer).
- Só será necessário renomear o token de senha, e renomear o endereço de e-mail. Em breve irei comentar como fazer isso.
- Após baixar em `zip` o projeto oficial do PHPMailer, apenas usaremos o `scr` do projeto, copie-o cole em seu projeto.
- Crie o `index.php` e a pasta `includes` e o arquivo `config.php` dentro desta pasta.

  # Teste
Crie um simples texto dentro do index:
```php
echo 'teste';
```
Caso deseja testar se o `index.php` está funcionando, entre o terminal do VsCode e digite:
```php
php -S localhost:8080
```

# Onde Consigo o Token de Senha?

- Para conseguir a senha pra ter o acesso ao e-mail que irá fazer o envio, será necessário a opção de `verificação em duas etapas` ativado, e necessário criar um `senha para aplicativos` na conta google.
- Crie um nome fácil para identificar.
- Após feito essas duas etapas, copie a chave criada pelo google, e cole no $MAIL->PASSWORD = ' '; e troque também a senha dentro da pasta 'includes', o arquivo config.php.
  
```php
$mail->PASSWORD = 'chave aqui';
```
Troque a de config também:
```php
define("SMTP_HOST"," smtp.gmail.com");              
define("SMTP_PORT"," 587");                         //porta do google
define("SMTP_USER"," naorespondaagr@gmail.com");    //email que irá fazer o envio
define("SMTP_PASS","#######");                      // coloque a senha aqui
```
Coloque o e-mail que irá fazer o envio
```php
$mail->Username   = 'email@gmail.com'; 
```

- Apenas o e-mail e senha devem ser trocados para o projeto funcionar normalmente.

OBS: Não envie e-mail para `davibritojunior1@gmail.com`, irei considerar como spam.
# Exemplo

```php
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;



include("includes/config.php");
include("vendor/autoload.php");

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //Server settings
    $mail->isSMTP();                                                //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                           //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
    $mail->Username   = 'naorespondaagr@gmail.com';                 //SMTP username
    $mail->Password   = '######';                                   //SMTP password
    $mail->Port       = 587;                                       //porta do goole
    

    //Recipients
    $mail->setFrom('naorespondaagr@gmail.com', 'Fatec ZS');       //quem entrou em contato
    $mail->addAddress('davibritojunior1@gmail.com', 'Davi');     //quem irá receber o email

    //Content
    $mail->isHTML(true);                                //Set email format to HTML
    $mail->Subject = 'Contato do Site';
    $mail->Body    = 'Fatec entrou em contato</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';        //caso o navegador nao tenha html para fazer a leitura

    $mail->send();
    echo 'E-mail enviado com sucesso';
} catch (Exception $e) {
    echo "Error ao enviar o e-mail. Mailer Error: {$mail->ErrorInfo}";
}
?>
```

  
  

