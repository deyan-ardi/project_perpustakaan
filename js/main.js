$('a#tombol-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Apakah Anda Yakin Ingin Menghapus?',
        text: "Tindakan ini tidak bisa dibatalkan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Data Terhapus!',
                'Data Telah Berhasil Dihapus',
                'success'
            )
            setTimeout(function () {
                document.location.href = href;
            }, 1500);
        }
    })

});
