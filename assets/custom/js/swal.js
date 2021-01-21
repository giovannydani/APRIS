// hapus
$('.tombol-hapus').on('click',function(e){

    e.preventDefault();

    const linkdelete=$(this).attr('href');

    Swal.fire({
        title: 'Anda Yakin',
        text: "Ingin menghapus data ini",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {
          document.location.href=linkdelete;
        }
      })
})