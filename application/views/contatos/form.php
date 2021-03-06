
<!-- Formulário para adicionar/editar contato -->
<div class="title">
    <h4>Novo Contato</h4>
    <button type="button" class="btn btn-outline-info" onclick="document.location.href = '<?php echo site_url("contatos"); ?>';">
        <i class="fas fa-arrow-left"></i>
        Voltar
    </button>
</div>

<?php if( validation_errors()  ) : ?>
    <div class="alert alert-danger" role="alert">
        Por favor, corrija os campos:
    </div>
<?php endif; ?>

<?php if( isset($response) ) : ?>
    <div class="alert <?php echo ($response ? 'alert-success' : 'alert-danger'); ?>" role="alert">
        <?php echo $msg ?>
    </div>
<?php endif; ?>

<?php echo form_open(site_url('contatos/salvar')) ?>
    <div class="form-group">
        <label for="id">Id</label>
        <input class="form-control" type="number" readonly name="id" id="id" value="<?php echo (isset($contato) ? $contato['contato_id'] : "");?>">
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input class="form-control" type="text" name="nome" id="nome" value="<?php echo (isset($contato) ? $contato['nome'] : "");?>">
        <?php echo form_error('nome'); ?>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Telefones</h5>
            <?php if(isset($contato) && isset($contato["telefones"]) ) :
            foreach($contato["telefones"] as $telefone_id => $telefone) : ?>
                <div id="phoneGroup_<?php echo $telefone_id?>" class="phone-group">
                    <div class="btn-rm-phone">
                        <button type="button" class="btn btn-sm btn-outline-danger btns-rm" onclick="removePhone(<?php echo $telefone_id?>)">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                        </div>
                        <select class="custom-select" name="telefones[<?php echo $telefone_id?>][tipo]" onchange="changeMask(this, <?php echo $telefone_id?>)" id="selectType_<?php echo $telefone_id?>">
                            <option value="C">Celular</option>
                            <option value="R" <?php echo ( $telefone['tipo']=='R' ? "selected" : "" ); ?>>Residencial</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telefone">Número</label>
                        <input class="form-control input-phone" type="text" name="telefones[<?php echo $telefone_id?>][numero]" id="inputPhone_<?php echo $telefone_id?>" onkeyup="checkValPhone()" value="<?php echo $telefone['numero']; ?>">
                    </div>
                </div>
            <?php endforeach;
            endif; ?>
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
                    <select class="custom-select" name="telefones[0][tipo]" onchange="changeMask(this, 0)" id="selectType_0">
                        <option value="C">Celular</option>
                        <option value="R">Residencial</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="telefone">Número</label>
                    <input class="form-control input-phone" type="text" name="telefones[0][numero]" id="inputPhone_0" onkeyup="checkValPhone()">
                </div>
            </div>
            <div id="others"></div>
            <button type="button" class="btn btn-sm btn-info btns-add" onclick="addOtherPhone()">
                <i class="fas fa-plus"></i>Adicionar outro
            </button>
        </div>
    </div>
    <div class="btns-footer-form">
        <button class="btn btn-success" id="btnSave" type="submit" disabled>
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