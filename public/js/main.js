$(document).ready(function(){
    var nome = document.getElementById('nome_template');
    var descricao = document.getElementById('descricao_template');
    var altura = document.getElementById('altura');
    var largura = document.getElementById('largura');

    $("#nome_template").blur(function(){
        if((nome).val() == ""){
            $("#span-nome").html("Este campo não pode ficar em branco!");
            $("#span-nome").css({"color" : "#F00"});
            $("#nome_template").css({"border-color" : "#F00"});
        } else {
            $("#span-nome").html("Este campo não pode ficar em branco!");
            $("#span-nome").css({"color" : "#F00"});
            $("#nome_template").css({"border-color" : "#F00"});
        }
    })
});