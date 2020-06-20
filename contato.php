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

<body>

<?php if($valido) : ?>

    <section class="max-width">    
        <div>
            <h1>Contato</h1>
        </div>

        <div>
            <h3> Olá <?php echo $nome; ?> recebemos a sua mensagem em breve, 
                um de nossos atendentes irá responde-lo(a). </h3>
        </div>

        <div>
            <p>
                <strong>Nome:</strong> <?php echo $nome; ?> <br>
                <strong>E-mail:</strong> <?php echo $email; ?> <br>
                <strong>Telefone:</strong> <?php echo $telefone; ?> <br>
                <strong>Assunto:</strong> <?php echo $assunto; ?> <br>
                <strong>Mensagem:</strong> <?php echo $mensagem; ?> 
            </p>
        </div>
    </section>

    

<?php else : ?>
    <section class="max-width">
        
            <h1>Contato</h1>
        </div>
        <div>
            <p>
                Não foi possível receber seus dados. Tente mais tarde!<br>
                Verifique se a mensagem não esta vazia!
            </p>
            <br>
        </div>
        <div >
            <a  href="index.html" >Voltar</a>
        </div>

    </section>
    
<?php endif; ?>

</body>
</html>

