
<!-- Formulário para adicionar/editar contato -->
<div class="title">
    <h4>Novo Contato</h4>
    <button type="button" class="btn btn-outline-info" onclick="document.location.href = 'http://localhost/codeigniter/index.php/contato/index';">
        <i class="fas fa-arrow-left"></i>
        Voltar
    </button>
</div>

<form action="http://localhost/codeigniter/index.php/contato/salvar" method="POST">
    <div class="form-group">
        <label for="id">Id</label>
        <input class="form-control" type="number" name="id" id="id">
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input class="form-control" type="text" name="nome" id="nome">
    </div>
    <div class="form-group">
        <label for="numero">Número</label>
        <input class="form-control" type="number" name="numero" id="numero">
    </div>
    <div class="btns-footer-form">
        <button class="btn btn-success" type="submit">
            <i class="far fa-save"></i>
            Salvar
        </button>
        <button class="btn btn-outline-danger btn-cancel-form" type="button" onclick="document.location.href = 'http://localhost/codeigniter/index.php/contato/index';">
            <i class="fas fa-ban"></i>
            Cancelar
        </button>
    </div>
</form>