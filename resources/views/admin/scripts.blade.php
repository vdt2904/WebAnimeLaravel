<script>
    // Sử dụng JavaScript để thay đổi hình ảnh khi chọn tệp mới
    document.getElementById('image').addEventListener('change', function () {
        var imagePreview = document.getElementById('imagePreview');
        var fileInput = this;
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    });
</script>
<script src="/Admin/vendor/jquery/jquery.min.js"></script>
    <script src="/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/Admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/Admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/Admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/Admin/js/demo/chart-area-demo.js"></script>
    <script src="/Admin/js/demo/chart-pie-demo.js"></script>