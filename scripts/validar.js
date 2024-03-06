
function validarUsuario(){
    var login = document.getElementById('entradaLog').value;
    var senha = document.getElementById('entradaPass').value;

    if(login == 'admin' && senha == 'admin'){
        alert('Sucesso!');
        location.href = "./site/home.html"
    }else{
        alert('Usuario ou senha incorretos!');
    }
}
 