$(document).ready(function (){
    $('.curso-btn').click(function (){
        location.href = "inscricao"
    })
    $('.btn-admin-login').click(function (){
        confirm('ATENÇÃO! Somente Os Alunos Da Instituição Poderam Fazer O Login!');
    })
})



let btn = document.querySelector('.curso-btn')

btn.click = function(){
    location.href = "inscricao"
}


