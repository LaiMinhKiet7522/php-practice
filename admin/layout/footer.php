<?php
if ($cur_page != 'login.php') :
?>
    </main>


    </div>
    </div>
<?php
endif;
?>
<script src="<?php echo BASE_URL; ?>dist-admin/js/jquery-3.6.3.min.js"></script>
<script src="<?php echo BASE_URL; ?>dist-admin/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL; ?>dist-admin/js/feather.min.js"></script>
<script src="<?php echo BASE_URL; ?>dist-admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_URL; ?>dist-admin/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo BASE_URL; ?>dist-admin/tinymce/tinymce.min.js"></script>
<script src="<?php echo BASE_URL; ?>dist-admin/js/select2.min.js"></script>
<script src="<?php echo BASE_URL; ?>dist-admin/js/custom.js"></script>

<?php
if ($cur_page == 'index.php') :
?>
<?php
include_once("layout/chart.php");
?>
<?php
endif;
?>
</body>

</html>