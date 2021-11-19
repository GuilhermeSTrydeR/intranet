function erro_login(){

    alert("usuario ou senha invalidos!");
    
}

// essa funcao ira ser chamada no botao para fechar o modal, ou seja ela fecha o modal
function fecharModal(){
    const texto = document.getElementById( 'modalInicio' ).style.display = 'none';
    // const texto = document.getElementById( 'sombraInicio' ).style.display = 'none';
}