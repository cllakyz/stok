</div>
</div>
</div>
</div>
</div>
<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- Adon Scripts -->
<!-- Core -->
<script src="<?php echo PLUGIN_PATH; ?>/jquery/dist/jquery.min.js"></script>
<script src="<?php echo JS_PATH; ?>/popper.js"></script>
<script src="<?php echo PLUGIN_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo PLUGIN_PATH; ?>/chart-circle/circle-progress.min.js"></script>
<!-- Optional JS -->
<script src="<?php echo PLUGIN_PATH; ?>/chart.js/dist/Chart.min.js"></script>
<script src="<?php echo PLUGIN_PATH; ?>/chart.js/dist/Chart.extension.js"></script>
<!-- Data tables -->
<script src="<?php echo PLUGIN_PATH; ?>/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo PLUGIN_PATH; ?>/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo PLUGIN_PATH; ?>/datatable/dataTables.responsive.min.js"></script>
<script src="<?php echo PLUGIN_PATH; ?>/datatable/responsive.bootstrap4.min.js"></script>
<!-- Fullside-menu Js-->
<script src="<?php echo PLUGIN_PATH; ?>/toggle-sidebar/js/sidemenu.js"></script>
<!-- Custom scroll bar Js-->
<script src="<?php echo PLUGIN_PATH; ?>/customscroll/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- peitychart -->
<script src="<?php echo PLUGIN_PATH; ?>/peitychart/jquery.peity.min.js"></script>
<script src="<?php echo PLUGIN_PATH; ?>/peitychart/peitychart.init.js"></script>
<!-- Sweet alert Plugin -->
<script src="<?php echo PLUGIN_PATH; ?>/sweet-alert/sweetalert.min.js"></script>
<!-- Adon JS -->
<script src="<?php echo JS_PATH; ?>/custom.js"></script>
<script src="<?php echo JS_PATH; ?>/datatable.js"></script>
<?php
if(helper::route(0) == ""){ ?>
    <script src="<?php echo JS_PATH; ?>/dashboard-finance.js"></script>
<?php
}
?>
<script src="<?php echo JS_PATH; ?>/iziToast.min.js"></script>
<script src="<?php echo JS_PATH; ?>/main.js?v=<?php echo time(); ?>"></script>
<script>
    var ajax_response_msg = localStorage.getItem('message');
    if(ajax_response_msg !== null){
        notify("success", "Başarılı", ajax_response_msg);
        localStorage.removeItem('message');
    }
</script>

</body>

</html>