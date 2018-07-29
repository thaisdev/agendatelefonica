<!-- Close div container-fluid and body -->
</div>
</body>

<!-- Plugins jquery and bootstrap for all views -->
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap.min.js"></script>

<!-- Scripts and plugins for list views -->
<?php if($view == 'list') : ?>
    <!-- Plugin datatables -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables.bootstrap4.min.js"></script>
    <!-- My custom scripts js -->
    <script src="<?php echo base_url(); ?>assets/js/scripts-list.js"></script>
<!-- Scripts and plugins for form views -->    
<?php elseif($view == 'form') : ?>
    <!-- Plugin jquery for mask -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.mask.min.js"></script>
    <!-- My custom scripts js -->
    <script src="<?php echo base_url(); ?>assets/js/scripts-form.js" type="text/javascript"></script>
<?php endif; ?>

</html>