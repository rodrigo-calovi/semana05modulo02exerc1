

<?php

$valido = false;

    $nome = filter_input(INPUT_POST,'txtNome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'txtEmail', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST,'txtTelefone', FILTER_SANITIZE_STRING);
    $assunto = filter_input(INPUT_POST,'slcAssunto', FILTER_SANITIZE_NUMBER_INT);
    $mensagem = filter_input(INPUT_POST,'txtMensagem', FILTER_SANITIZE_STRING);

    $valido = validar($nome, $email, $telefone, $assunto, $mensagem);


function validar($nome, $email, $telefone, $assunto, $mensagem){

    if(strlen($mensagem) == 0){ 
        return false;
    }
    
    return true;
}

?>

<!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <title>Pagina de confirmação</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/unsemantic-grid-responsive.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    </head>


<?php if($valido) : ?>

   
    <body>

    <section class="max-width">
        <div>
            <h1>Contato Enviado</h1>
            <hr>
        </div>

        <div class="modeloResp">
            <div >
                <h3> Olá <?php echo $nome; ?> recebemos a sua mensagem em breve, 
                    um de nossos atendentes irá responde-lo(a). </h3>
            </div>

            <div class="grid-100 mobile-grid-100">
                <p>
                    <strong>Nome:</strong> <?php echo $nome; ?> <br>
                    <strong>E-mail:</strong> <?php echo $email; ?> <br>
                    <strong>Telefone:</strong> <?php echo $telefone; ?> <br>
                    <strong>Assunto:</strong>
                        <?php switch ($assunto) {
                            case 1: 
                                echo "Comercial";
                                break;
                            case 2: 
                                echo "Dúvidas";
                                break;
                            case 3:
                                echo "Parceria";
                                break;
                            case 4:
                                echo "Outros";
                                break;
                            }
                        ?>                    
                        <br>
                    <strong>Mensagem:</strong> <?php echo $mensagem; ?> 

                    <div class="grid-90">&nbsp;</div>
                    <div class="grid-10" >
                        <a class="btnEnviar" href="index.html" >Voltar</a>
                    </div>

                </p>

                
            </div>
      
        </div>
    </section>

    

<?php else : ?>

    <section class="max-width">
        <div>
            <h1>Mensagem</h1>
            <hr>
        </div>

        <div ">
            <div class="modeloResp borderRed">
                <h1>Falha!</h1>
                <p>
                    Não foi possível receber seus dados.
                    Tente mais tarde!<br>
                    Obrigado!<br>
                    <br>
                    <div class="grid-90">&nbsp;</div>
                    <div class="grid-10" >
                        <a class="btnEnviar" href="index.html" >Voltar</a>
                    </div>
                </p>
                <br>
             </div>
        </div>
    </<section>
        
     

    
<?php endif; ?>

</body>
</html>

