<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/moment/moment.min.js"></script>
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ str_replace('index.php', '', url('/')) }}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ str_replace('index.php', '', url('/')) }}/dist/js/pages/dashboard.js"></script>
<!-- SweetAlert2 -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- DataTables -->
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ str_replace('index.php', '', url('/')) }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ str_replace('index.php', '', url('/')) }}dist/js/demo.js"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
        });
</script>
@yield('script')
</body>

</html>
