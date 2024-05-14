# Envio de Email com PHPMailer

Este projeto tem o objetivo de facilitar o envio de e-mails utilizando a biblioteca PHPMailer, oferecendo uma maneira simples e eficaz de integrar funcionalidades de e-mail em suas aplicações PHP.

# Configuração
Para usar essa biblioteca, será necessário o [XAMPP](https://www.apachefriends.org/download.html)  em seu ambiente de desenvolvimento, pois ele será utilizado como conector do Composer. O [Composer](https://getcomposer.org/download/) é uma ferramenta de gerenciamento de dependências para PHP que nos permite instalar bibliotecas PHP facilmente.


# Como Iniciar ?


1. Caso prefira um guia passo a passo, será necessário acessar o repositório do [PHPMailer no GitHub](https://github.com/PHPMailer/PHPMailer) para obter o código fonte.
2. Após baixar o arquivo ZIP do projeto PHPMailer, extraia a pasta src do projeto.
  
3. Crie o `index.php` na raiz do seu projeto, bem como uma pasta `includes`.
4. Dentro da pasta `includes`, crie um arquivo `config.php`.
5. Abra o arquivo `config.php` e adicione as configurações necessárias, como o endereço do servidor SMTP, a porta SMTP, o e-mail de envio e a senha do e-mail.
6. No arquivo `index.php`, inclua o PHPMailer e as configurações do arquivo `config.php`.

# Testes
Crie um simples texto dentro do `index.php`:
```php
echo 'teste';
```
Para testar se o `index.php` está funcionando corretamente, você pode executar o seguinte comando no PowerShell:
```php
php -S localhost:8080
```

# Onde Consigo o Token de Senha?

- Para conseguir a senha pra ter o acesso ao e-mail que irá fazer o envio, será necessário a opção de `verificação em duas etapas` ativado, e necessário criar um `senha para aplicativos` na conta Google.

- Após feito essas duas etapas, copie a chave criada pelo Google, e cole no $MAIL->PASSWORD = ' '; e troque também a senha dentro da pasta `includes`, o arquivo `config.php`.
  
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
# Resultado Esperado no Terminal
```
2024-03-20 22:56:16 SERVER -> CLIENT: 220 smtp.gmail.com ESMTP p20-20020a170902ead400b001dd69a072absm14247019pld.178 - gsmtp 2024-03-20 22:56:16 CLIENT -> SERVER: EHLO localhost 2024-03-20 22:56:16 SERVER -> CLIENT: 250-smtp.gmail.com at your service, [189.121.202.43] 250-SIZE 35882577 250-8BITMIME 250-STARTTLS 250-ENHANCEDSTATUSCODES 250-PIPELINING 250-CHUNKING 250 SMTPUTF8 2024-03-20 22:56:16 CLIENT -> SERVER: STARTTLS 2024-03-20 22:56:16 SERVER -> CLIENT: 220 2.0.0 Ready to start TLS 2024-03-20 22:56:16 CLIENT -> SERVER: EHLO localhost 2024-03-20 22:56:16 SERVER -> CLIENT: 250-smtp.gmail.com at your service, [189.121.202.43] 250-SIZE 35882577 250-8BITMIME 250-AUTH LOGIN PLAIN XOAUTH2 PLAIN-CLIENTTOKEN OAUTHBEARER XOAUTH 250-ENHANCEDSTATUSCODES 250-PIPELINING 250-CHUNKING 250 SMTPUTF8 2024-03-20 22:56:16 CLIENT -> SERVER: AUTH LOGIN 2024-03-20 22:56:17 SERVER -> CLIENT: 334 VXNlcm5hbWU6 2024-03-20 22:56:17 CLIENT -> SERVER: [credentials hidden] 2024-03-20 22:56:17 SERVER -> CLIENT: 334 UGFzc3dvcmQ6 2024-03-20 22:56:17 CLIENT -> SERVER: [credentials hidden] 2024-03-20 22:56:17 SERVER -> CLIENT: 235 2.7.0 Accepted 2024-03-20 22:56:17 CLIENT -> SERVER: MAIL FROM: 2024-03-20 22:56:17 SERVER -> CLIENT: 250 2.1.0 OK p20-20020a170902ead400b001dd69a072absm14247019pld.178 - gsmtp 2024-03-20 22:56:17 CLIENT -> SERVER: RCPT TO: 2024-03-20 22:56:17 SERVER -> CLIENT: 250 2.1.5 OK p20-20020a170902ead400b001dd69a072absm14247019pld.178 - gsmtp 2024-03-20 22:56:17 CLIENT -> SERVER: DATA 2024-03-20 22:56:18 SERVER -> CLIENT: 354 Go ahead p20-20020a170902ead400b001dd69a072absm14247019pld.178 - gsmtp 2024-03-20 22:56:18 CLIENT -> SERVER: Date: Wed, 20 Mar 2024 23:56:15 +0100 2024-03-20 22:56:18 CLIENT -> SERVER: To: Davi 2024-03-20 22:56:18 CLIENT -> SERVER: From: Fatec ZS 2024-03-20 22:56:18 CLIENT -> SERVER: Subject: Contato do Site 2024-03-20 22:56:18 CLIENT -> SERVER: Message-ID: 2024-03-20 22:56:18 CLIENT -> SERVER: X-Mailer: PHPMailer 6.9.1 (https://github.com/PHPMailer/PHPMailer) 2024-03-20 22:56:18 CLIENT -> SERVER: MIME-Version: 1.0 2024-03-20 22:56:18 CLIENT -> SERVER: Content-Type: multipart/alternative; 2024-03-20 22:56:18 CLIENT -> SERVER: boundary="b1=_OrJiKZpLFOPFtYD4yADMNOR577UzphYmeE75LG2Ig" 2024-03-20 22:56:18 CLIENT -> SERVER: Content-Transfer-Encoding: 8bit 2024-03-20 22:56:18 CLIENT -> SERVER: 2024-03-20 22:56:18 CLIENT -> SERVER: --b1=_OrJiKZpLFOPFtYD4yADMNOR577UzphYmeE75LG2Ig 2024-03-20 22:56:18 CLIENT -> SERVER: Content-Type: text/plain; charset=us-ascii 2024-03-20 22:56:18 CLIENT -> SERVER: 2024-03-20 22:56:18 CLIENT -> SERVER: This is the body in plain text for non-HTML mail clients 2024-03-20 22:56:18 CLIENT -> SERVER: 2024-03-20 22:56:18 CLIENT -> SERVER: --b1=_OrJiKZpLFOPFtYD4yADMNOR577UzphYmeE75LG2Ig 2024-03-20 22:56:18 CLIENT -> SERVER: Content-Type: text/html; charset=us-ascii 2024-03-20 22:56:18 CLIENT -> SERVER: 2024-03-20 22:56:18 CLIENT -> SERVER: Fatec entrou em contataaao 2024-03-20 22:56:18 CLIENT -> SERVER: 2024-03-20 22:56:18 CLIENT -> SERVER: 2024-03-20 22:56:18 CLIENT -> SERVER: --b1=_OrJiKZpLFOPFtYD4yADMNOR577UzphYmeE75LG2Ig-- 2024-03-20 22:56:18 CLIENT -> SERVER: 2024-03-20 22:56:18 CLIENT -> SERVER: . 2024-03-20 22:56:19 SERVER -> CLIENT: 250 2.0.0 OK 1710975379 p20-20020a170902ead400b001dd69a072absm14247019pld.178 - gsmtp 2024-03-20 22:56:19 CLIENT -> SERVER: QUIT 2024-03-20 22:56:19 SERVER -> CLIENT: 221 2.0.0 closing connection p20-20020a170902ead400b001dd69a072absm14247019pld.178 - gsmtp E-mail enviado com sucesso
```


  
  

