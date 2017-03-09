$(function () {
    $("#load").hide();
    jQuery('#ContatoIndexForm').submit(function () {
        if (validaForm()){
            var dados = jQuery(this).serialize();
            $("#load").show();
            jQuery.ajax({
                type: "POST",
                url: jQuery(this).attr("action"),
                data: dados,
                success: function (data){
                    $("#load").hide();
                    if ($.trim(data) == "true") {
                        $("#validacao").html("Mensagem enviada com sucesso!");
                        jQuery('#ContatoIndexForm')[0].reset();
                    } else {
                        $("#validacao").html("Houve algum erro no envio.<br />" + data);
                    }
                }
            });
        }
        return false;
    });

    $('#ContatoTelefone').mask("(99) 9999-9999?9").ready(function (event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if (phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    });
});

function validaForm()
{
    var ret = true;
    var msg_validacao = "<ul style='culor:red'>";
    if ($('#ContatoEmail').val() != "") {
        if (!$.validateEmail($('#ContatoEmail').val())) {
            msg_validacao += "<li>Digite um e-mail válido.</li>";
            ret = false;
        }
    }
    else {
        msg_validacao += "<li>Preencha o e-mail.</li>";
        ret = false;
    }
    if ($("#ContatoNome").val() == "") {
        msg_validacao += "<li>Preencha o seu nome.</li>";
        ret = false;
    }

    if ($("#ContatoTelefone").val() == "") {
        msg_validacao += "<li>Preencha o seu telefone.</li>";
        ret = false;
    }

    if ($("#ContatoMensagem").val() == "") {
        msg_validacao += "<li>Preencha sua mensagem.</li>";
        ret = false;
    }
    msg_validacao += "</ul>";
    $("#validacao").html(msg_validacao);
    return ret;
}

$.validateEmail = function (email){
    er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    if (er.exec(email))
        return true;
    else
        return false;
};