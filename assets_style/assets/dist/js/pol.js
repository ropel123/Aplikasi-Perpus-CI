$(document).ready(function () {
    $("<p>Made with <i class='fa fa-heart'></i>Kelompok3</p>").appendTo("#mw");
});
$('.hpsa').on('click', function (e) {
    e.preventDefault();
    const tol = $(this).attr('href');
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data Akan Dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya,hapus saja'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Dihapus',
                text: 'Anda Menghapus Data Pinjam Buku',
                type: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    location.href = tol;
                }
            });
        }
    });
});


