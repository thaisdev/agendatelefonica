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

/**
 * setMaskPhone
 * Generate mask for inputs
 * @author Thaís Oliveira
 * @since 07/2018
 */
function setMaskPhone(element, mask){
    element.mask(mask);
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
            '<select class="custom-select" name="telefones['+cont+'][tipo]" onchange="changeMask(this, '+cont+')">'+
                '<option value="C">Celular</option>'+
                '<option value="R">Residencial</option>'+
            '</select>'+
        '</div>'+
        '<div class="form-group">'+
            '<label for="telefone">Número</label>'+
            '<input class="form-control input-phone" type="text" name="telefones['+cont+'][numero]" id="inputPhone_'+cont+'">'+
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