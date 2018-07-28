
<!-- Formulário para adicionar/editar contato -->
<div class="title">
    <h4>Novo Contato</h4>
    <button type="button" class="btn btn-outline-info" onclick="document.location.href = 'http://localhost/codeigniter/contatos/index';">
        <i class="fas fa-arrow-left"></i>
        Voltar
    </button>
</div>

<?php if( validation_errors() ) : ?>
    <div class="alert alert-danger" role="alert">
        Por favor, corrija os campos:
    </div>
<?php endif; ?>

<?php echo form_open('http://localhost/codeigniter/contatos/salvar') ?>
    <div class="form-group">
        <label for="id">Id</label>
        <input class="form-control" type="number" readonly name="id" id="id">
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input class="form-control" type="text" name="nome" id="nome">
        <?php echo form_error('nome'); ?>
    </div>
    <div class="form-group">
        <label for="numero">Número</label>
        <input class="form-control" type="number" name="numero" id="numero">
        <?php echo form_error('numero'); ?>
    </div>
    <div class="btns-footer-form">
        <button class="btn btn-success" type="submit">
            <i class="far fa-save"></i>
            Salvar
        </button>
        <button class="btn btn-outline-danger btn-cancel-form" type="button" onclick="document.location.href = 'http://localhost/codeigniter/contatos/index';">
            <i class="fas fa-ban"></i>
            Cancelar
        </button>
    </div>
</form>