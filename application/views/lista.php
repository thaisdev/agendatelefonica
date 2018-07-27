<table class="table table-bordered" id="tableList">
    <thead class="thead-dark">
        <tr>
            <td scope="col">#</td>
            <td scope="col">Nome</td>
            <td scope="col">Número</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">1</td>
            <td>Ana</td>
            <td>123</td>
        </tr>
        <tr>
            <td scope="row">1</td>
            <td>Ana</td>
            <td>123</td>
        </tr>
        <tr>
            <td scope="row">1</td>
            <td>Ana</td>
            <td>123</td>
        </tr>
        <tr>
            <td scope="row">1</td>
            <td>Ana</td>
            <td>123</td>
        </tr>
    </tbody>
</table>

<script src="http://localhost/codeigniter/assets/js/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#tableList').DataTable();
    } );
</script>