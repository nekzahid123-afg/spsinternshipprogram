</div><!-- /.container-fluid -->

<footer class="site-footer">
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center">
            <small>&copy; <?php echo date('Y'); ?> SPS-BMS. All rights reserved.</small>
            <small>Human Resource Management</small>
        </div>
    </div>
</footer>

<script src="<?php echo $base_url; ?>/assets/js/velzon/bootstrap.bundle.min.js"></script>
<?php if (isset($page_scripts))
    echo $page_scripts; ?>
</body>

</html>