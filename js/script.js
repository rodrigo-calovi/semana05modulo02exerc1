'use scrict'

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('form-contato').addEventListener('submit', (event) => {
        
        var obj = getAtributos();
        if(!validar(obj))
            event.preventDefault();
    });
});


function getAtributos(){

    return obj = {
        nome: [getValue('txtNome'), 'txtNome'],
        email: [getValue('txtEmail'), 'txtEmail'],
        telefone: [getValue('txtTelefone'), 'txtTelefone'],
        assunto: [getValue('slcAssunto'), 'slcAssunto'],
        mensagem: [getValue('txtMensagem'), 'txtMensagem']
    };

}

function validar(obj) {
    
    let erros = [];

    if(obj.nome[0].length < 3 || obj.nome[0].length > 50) {
        
        erros.push("*,Nome inválido - Mín 3 e Máx. 50 caracteres. \r\n\r\n *");
        setBorder(obj.nome[1], "form invalido");
    } else {
        setBorder(obj.nome[1], "form");
    }

    //if((obj.email[0].length < 3 || obj.email[0].length > 50) || obj.email[0].indexOf("@") == -1 || obj.email[0].indexOf(".") == -1  ) {
    if((obj.email[0].length < 3 || obj.email[0].length > 50) || !/[^1]*([a-z0-9.]+?\-?[a-z0-9]+)\@[^1]*([a-z0-9]+\.[a-z0-9]+)/.test(obj.email[0])){
        erros.push("Email inválido - Mín 3 e Máx. 100 caracteres com '@' e '.' .  \r\n\r\n *");
        setBorder(obj.email[1], "form invalido");
    } else {
        setBorder(obj.email[1], "form");
    }

    
    if((obj.telefone[0].length < 12 || obj.telefone[0].length > 15) || (!/\([0-9]{2}\)? ?[0-9]{3,4}?\.?[0-9]{4,6}/.test(obj.telefone[0]))) {
        
            erros.push("Telefone inválido - Mín 12 e Máx. 14  caracteres, DDD com uso 2 digitos entre os '( )' c/s espaço. \r\n\r\n ");
            setBorder(obj.telefone[1], "form invalido");
        
    } else {
        setBorder(obj.telefone[1], "form");
    }

    if(obj.assunto[0] < 1 || obj.assunto[0] > 4) {
        
        erros.push("Assunto - escolha entre os 4 tipos. \r\n\r\n ");
        document.getElementById("slcAssunto");
        setBorder(obj.assunto[1], "form invalido");
    } else {
        setBorder(obj.assunto[1], "form");
    }


    if(obj.mensagem[0].length <= 0) {
        erros.push("Mensagem - consta em branco. \r\n\r\n ");
        document.getElementById("txtMensagem");
        setBorder(obj.mensagem[1], "form invalido");
    } else {
        setBorder(obj.mensagem[1], "form");
    }


    if(erros.length>0) {
        alert(erros.toString());
        return false;
    }

    return true;
    
}

function getValue(el) {
    return document.getElementById(el).value;
}

function setBorder(el, classesNames){
    document.getElementById(el).className = classesNames;
}