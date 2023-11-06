
@push('js')
    <script>
        // Wait for the DOM to be ready
        $(document).ready(function () {
            // Initialize Select2 on the select element with the "mySelect" ID
            $('#employees').select2({
                theme: 'tailwind',
            });
        });
    </script>
</script>
@endpush