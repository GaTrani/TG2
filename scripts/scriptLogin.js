var fromLogin  = document.querySelector('#formLogin')
var FormCriarConta  = document.querySelector('#formCriarConta')

document.querySelector('#botaol').addEventListener('click', () => {
    fromLogin.style.left = "15px"
    FormCriarConta.style.left = "250px"
})


document.querySelector('#botaoc').addEventListener('click', () => {
    FormCriarConta.style.left = "15px"
    fromLogin.style.left = "250px"
})

