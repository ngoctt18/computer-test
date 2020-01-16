<script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/adminlte.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/fastclick/fastclick.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
<script>
    $("a#btnDelete").fancybox();
</script>
@stack('scripts')
