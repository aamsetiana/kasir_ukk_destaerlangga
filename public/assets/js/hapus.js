    $(document).ready(function() {
        // Tangkap event klik pada tombol delete dan isi modal dengan informasi produk
        $('.btn-danger').on('click', function() {
            var productId = $(this).data('id');
            $('#deleteMessage').html('Are you sure you want to delete ' + ' (ID: ' + productId + ')?');
            $('#confirmDeleteLink').attr('href', '/product/delete/' + productId);
        });
    });
