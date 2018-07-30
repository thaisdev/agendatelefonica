// inicializa contador de campos de telefone
var cont = 0;
// define a máscara de cada tipo
var masks = {
    'C' : "(00) 00000-0000",
    'R' : "(00) 0000-0000"
}

// pré-define as máscaras dos campos de telefone para o padrão celular SP
setMaskPhone($('.input-phone'), masks['C']);
// esconde ou exibe os botoes de remover
toggleButtonRemove();
// verifica se possui algum número de telefone preenchido para habilitar o botão salvar
checkValPhone();

/**
 * setMaskPhone
 * Generate mask for inputs
 * @author Thaís Oliveira
 * @since 07/2018
 */
function setMaskPhone(element, mask){
    $(element).mask(mask);
}

/**
 * addOtherPhone
 * Adiciona mais um campo de tipo e número de telefone
 * @author Thaís Oliveira
 * @since 07/2018
 */
function addOtherPhone(){
    // incrementa o contador de campos
    cont++;
    // html que contém o select com os tipos e o input para o número
    var html = '<div id="phoneGroup_'+cont+'" class="phone-group">'+
        '<div class="btn-rm-phone">'+
        '<button type="button" class="btn btn-sm btn-outline-danger btns-rm" onclick="removePhone('+cont+')">'+
            '<i class="fas fa-times"></i>'+
        '</button></div>'+
        '<div class="input-group mb-3">'+
            '<div class="input-group-prepend">'+
                '<label class="input-group-text" for="inputGroupSelect01">Tipo</label>'+
            '</div>'+
            '<select class="custom-select" name="telefones['+cont+'][tipo]" onchange="changeMask(this, '+cont+')" id="selectType_'+cont+'">'+
                '<option value="C">Celular</option>'+
                '<option value="R">Residencial</option>'+
            '</select>'+
        '</div>'+
        '<div class="form-group">'+
            '<label for="telefone">Número</label>'+
            '<input class="form-control input-phone" type="text" name="telefones['+cont+'][numero]" id="inputPhone_'+cont+'" onkeyup="checkValPhone()">'+
        '</div></div>';
    // concatena o html na div
    $("#others").append(html);
    // adiciona máscara para o campo de numero de telefone
    setMaskPhone($("#inputPhone_"+cont), masks['C']);
    // verifica se é necessário exibir os botoes de remover
    toggleButtonRemove();
}

/**
 * changeMask
 * Change the mask
 * @author Thaís Oliveira
 * @since 07/2018
 */
function changeMask(element, cont){
    // define um ponteiro para o input que receberá a máscara
    var input = $("#inputPhone_"+cont);
    // limpa o valor do campo para o caso de já ter sido preenchido
    input.val("");
    // aplica a máscara de acordo com o tipo para o input em questão
    setMaskPhone(input, masks[element.value]);
}

/**
 * removePhone
 * Remove um campo de telefone
 * @author Thaís Oliveira
 * @since 07/2018
 */
function removePhone(cont){
    // remove a div que contém o botao clicado
    $("#phoneGroup_"+cont).remove();
    // verifica se é preciso esconder os botões de remover
    toggleButtonRemove();
}

/**
 * toggleButtonRemove
 * verifica se é necessário trocar a visibilidade do botão de remover telefone,
 * seguindo a regra de que pelo menos um campo de telefone deve ser exibido
 * @author Thaís Oliveira
 * @since 07/2018
 */
function toggleButtonRemove(){
    // se só existir um campo de telefone, esconde o botao
    if($(".phone-group").length == 1){
        $(".btns-rm").hide();
    } else {
        // do contrário exibe todos
        $(".btns-rm").show();
    }
}

/**
 * checkValPhone
 * Verifica se há algum número de telefone preenchido e habilita o botão salvar
 * @author Thaís Oliveira
 * @since 07/2018
 */
function checkValPhone(){
    // inicializa a variável utilizada para checar se tem um numero válido
    var isPhoneValid = false;
    // percorre todos os campos existentes
    $('.input-phone').each(function(index, item){
        // pega o id do campo
        var id = $(item).attr('id');
        // captura o contador
        var cont = id.replace("inputPhone_", "");
        // captura o tipo de telefone
        var tipo = $("#selectType_"+cont).val();
        // verifica se o número está completo pelo tipo de telefone
        if( (tipo == 'C' && item.value.length == 15) || 
            (tipo == 'R' && item.value.length == 14) ){
            $("#btnSave").attr("disabled", false);
            // atualiza o valor da variável aux
            isPhoneValid = true;
            // para o loop
            return true;
        }
    });
    // se passou pela iteração sem nenhum numero valido...
    if (!isPhoneValid){
        // desabilita novamente
        $("#btnSave").attr("disabled", "disabled");
        return false;
    }
}