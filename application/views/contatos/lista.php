<!-- Lista de contatos -->
<div class="title">
    <h4>Lista de contatos</h4>
    <button type="button" class="btn btn-success" onclick="document.location.href = '<?php echo site_url("contatos/adicionar"); ?>';">
        <i class="fas fa-plus-circle"></i>
        Novo Contato
    </button>
</div>

<?php if( isset($response) ) : ?>
    <div class="alert <?php echo ($response ? 'alert-success' : 'alert-danger'); ?>" role="alert">
        <?php echo $msg ?>
    </div>
<?php endif; ?>

<table class="table table-bordered table-striped" id="tableList">
    <thead>
        <tr>
            <!-- Checkbox para selecionar todos os contatos -->
            <th>
                <input type="checkbox" />
            </th>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Número</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($contatos as $contato_id => $contato) : ?>
            <tr>
                <!-- Checkbox para selecionar o contato -->
                <td>
                    <input type="checkbox" />
                </td>
                <th scope="row"><?php echo $contato_id ?></th>
                <td><?php echo $contato["nome"] ?></td>
                <td>
                    <?php 
                        // exibe o primeiro telefone
                        $primeiro = reset($contato["telefones"])["numero"];
                        echo $primeiro;
                        // e se tiver mais de um exibe um link para ver os outros
                        if(count($contato["telefones"]) > 1){
                            echo "<a href='#'> e +".(count($contato["telefones"])-1)."</a>";
                        }
                    ?>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-info" onclick="document.location.href = '<?php echo site_url("contatos/editar/".$contato_id); ?>';" >
                        <i class="far fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="document.location.href = '<?php echo site_url("contatos/excluir/".$contato_id); ?>';" >
                        <i class="far fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <!-- Botão para excluir vários contatos -->
            <th>
                <button type="button" class="btn btn-sm btn-danger">
                    <i class="far fa-trash-alt"></i>
                </button>
            </th>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Número</th>
            <th scope="col">Ações</th>
        </tr>
    </tfoot>
</table>