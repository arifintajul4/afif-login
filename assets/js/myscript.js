$(document).ready( function () {

    $('#datatable').DataTable();


    $('.editKriteria').on('click', function(){
    	const id = $(this).data('id');
    	$('.modal-body form').attr('action', 'http://localhost/afif-login/kriteria/edit/'+id);

    	$.ajax({
    		url: 'http://localhost/afif-login/kriteria/getubah',
    		data: {id : id},
    		dataType: 'json',
    		method: 'post',
    		success: function(data){
    			$('.modal-body #id').val(data.id);
    			$('.modal-body #nama').val(data.nama_kriteria);
    			$('.modal-body #bobot').val(data.bobot);
    			$('.modal-body #poin1').val(data.poin1);
    			$('.modal-body #poin2').val(data.poin2);
    			$('.modal-body #poin3').val(data.poin3);
    			$('.modal-body #poin4').val(data.poin4);
    			$('.modal-body #poin5').val(data.poin5);
    		}
    	});
    });

    $('.editAlternatif').on('click', function(){
        const id = $(this).data('id');
        $('.modal-body form').attr('action', 'http://localhost/afif-login/alternatif/edit/'+id);

        $.ajax({
            url: 'http://localhost/afif-login/alternatif/getubah',
            data: {id : id},
            dataType: 'json',
            method: 'post',
            success: function(data){
                console.log(data);
                $('.modal-body #id').val(data.id);
                $('.modal-body #nama').val(data.nama_alternatif);
            }
        });
    });


    $('.hapus').on('click', function(e){
        e.preventDefault(); //cancel default action

        //Recuperate href value
        var href = $(this).attr('href');
        var message = $(this).data('confirm');

        //pop up
        swal({
            title: "Apakah Anda Yakin ??",
            text: message, 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Data Berhasil dihapus!", {
              icon: "success",
            });
            window.location.href = href;
          } else {
            swal("Data Batal dihapus!");
          }
        });
    });

} );