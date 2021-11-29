<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>contato</title>
</head>
<body>
<?php
    //1 – Definimos Para quem vai ser enviado o email
    $para = "nwramon@gmail.com";
    //2 - resgatar o que foi digitado no formulário e  grava nas variaveis
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    // 3 - resgatar o assunto digitado no formulário e  grava na variavel
    //$assunto
    $assunto = $_POST['assunto'];
    //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
    $mensagem = "<br><strong>Nome:  </strong>".$nome. 
            "<br><strong>sobrenome:  </strong>".$sobrenome. 
            "<br><strong>cidade:  </strong>".$cidade. 
            "<br><strong>estado:  </strong>".$estado. 
            "<br><strong>cep:  </strong>".$cep;


    $mensagem .= "<p><strong>Mensagem: </strong>".$_POST['mensagem'];

    //5 – agora inserimos as codificações corretas e  tudo mais.
    $headers =  "Content-Type:text/html; charset=UTF-8\n";
    $headers .= "From:  nwramon@gmail.com<nwramon@gmail.com>\n";
    //Vai ser //mostrado que  o email partiu deste email e seguido do nome
    $headers .= "X-Sender:  <nwramon@gmail.com>\n";
    //email do servidor //que enviou
    $headers .= "X-Mailer: PHP  v".phpversion()."\n";
    $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
    $headers .= "Return-Path:  <nwramon@gmail.com>\n";
    //caso a msg //seja respondida vai para  este email.
    $headers .= "MIME-Version: 1.0\n";
?>

    <div class="msgemailsucess">
        <?php
            //função que faz o envio do email.
            if(mail($para, $assunto, $mensagem, $headers)){
                echo "<h2> E-MAIL ENVIADO COM SUCESSO! </h2>";
                header("refresh: 3; ../../sistemalivrariavirtual/contato.html");
            } else {
                echo '<div style="background-color:red; justify-content:center; height:90px; line-height:90px;"> 
                    <h2> FALHA AO ENVIAR E-MAIL! </h2></div>';
                    header("refresh: 3; ../../sistemalivrariavirtual/contato.html");
            }
        ?> 
    </div>
</body>
</html>