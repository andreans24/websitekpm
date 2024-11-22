<!-- plugins:js -->
<script src="{{ asset('admin-purple/src/assets/vendors/js/vendor.bundle.base.js') }}  "></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('admin-purple/src/assets/vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('admin-purple/src/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('admin-purple/src/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin-purple/src/assets/js/misc.js') }}"></script>
<script src="{{ asset('admin-purple/src/assets/js/settings.js') }}"></script>
<script src="{{ asset('admin-purple/src/assets/js/todolist.js') }}"></script>
<script src="{{ asset('admin-purple/src/assets/js/jquery.cookie.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src=" {{ asset('admin-purple/src/assets/js/dashboard.js') }} "></script>
<!-- End custom js for this page -->
<script>
    function logout() {
        const form = document.createElement('form');
        form.method = 'POST',
            form.action = '{{ route('logout') }}';

        const token = document.createElement('input');
        token.type = 'hiddne';
        token.name = '_token';
        token.value = '{{ csrf_token() }}';

        form.appendChild(token);
        document.body.appendChild(form);
        form.submit();
    }
</script>
