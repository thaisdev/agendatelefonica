
<!-- Formulário para adicionar/editar contato -->
<div class="title">
    <h4>Novo Contato</h4>
    <button type="button" class="btn btn-outline-info" onclick="document.location.href = '<?php echo site_url("contatos"); ?>';">
        <i class="fas fa-arrow-left"></i>
        Voltar
    </button>
</div>

<?php if( validation_errors() ) : ?>
    <div class="alert alert-danger" role="alert">
        Por favor, corrija os campos:
    </div>
<?php endif; ?>

<?php echo form_open(site_url('contatos/salvar')) ?>
    <div class="form-group">
        <label for="id">Id</label>
        <input class="form-control" type="number" readonly name="id" id="id">
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input class="form-control" type="text" name="nome" id="nome">
        <?php echo form_error('nome'); ?>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Telefones</h5>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                </div>
                <select class="custom-select" id="tipo" name="telefones[1][tipo]">
                    <option value="R">Residencial</option>
                    <option value="C">Celular</option>
                </select>
            </div>
            <div class="form-group">
                <label for="telefone">Número</label>
                <input class="form-control" type="text" name="telefones[1][numero]" id="telefone">
                <?php echo form_error('telefone'); ?>
            </div>
            <div id="others"></div>
            <button type="button" class="btn btn-sm btn-info" onclick="addOtherPhone()">
                <i class="fas fa-plus"></i>Adicionar outro
            </button>
        </div>
    </div>
    <div class="btns-footer-form">
        <button class="btn btn-success" type="submit">
            <i class="far fa-save"></i>
            Salvar
        </button>
        <button class="btn btn-outline-danger btn-cancel-form" type="button" onclick="document.location.href = '<?php echo site_url("contatos"); ?>';">
            <i class="fas fa-ban"></i>
            Cancelar
        </button>
    </div>
</form>

<script>
    // inicializa contador de campos de telefone
    var cont = 1;

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
        var html = '<div class="input-group mb-3">'+
            '<div class="input-group-prepend">'+
                '<label class="input-group-text" for="inputGroupSelect01">Tipo</label>'+
            '</div>'+
            '<select class="custom-select" id="tipo" name="telefones['+(cont)+'][tipo]">'+
                '<option value="R">Residencial</option>'+
                '<option value="C">Celular</option>'+
            '</select>'+
        '</div>'+
        '<div class="form-group">'+
            '<label for="telefone">Número</label>'+
            '<input class="form-control" type="text" name="telefones['+(cont)+'][numero]" id="telefone">'+
            '<?php echo form_error("telefone"); ?>'+
        '</div>';
        // concatena o html na div
        $("#others").append(html);
    }
</script>