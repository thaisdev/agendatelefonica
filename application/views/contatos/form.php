
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
            <div id="phoneGroup_0" class="phone-group">
                <div class="btn-rm-phone">
                    <button type="button" class="btn btn-sm btn-outline-danger btns-rm" onclick="removePhone(0)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                    </div>
                    <select class="custom-select" name="telefones[0][tipo]" onchange="changeMask(this, 0)">
                        <option value="C">Celular</option>
                        <option value="R">Residencial</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="telefone">Número</label>
                    <input class="form-control input-phone" type="text" name="telefones[0][numero]" id="inputPhone_0">
                </div>
            </div>
            <div id="others"></div>
            <button type="button" class="btn btn-sm btn-info btns-add" onclick="addOtherPhone()">
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
    

</script>