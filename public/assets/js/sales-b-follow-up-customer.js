$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("follow-up-customer-menu");
    menu.classList.add("active");

    // Datatable
    const datatableComponent = document.getElementsByClassName("datatable-component");
    $(datatableComponent).DataTable();

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    $(".btn-order").each(function(){
    	$(this).on("click",function(){
    		let id = $(this).attr("id");
    		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	    	$.ajax({
	            type: 'POST',
	            url: "/sales-b/follow-up/order",
	            data:{
					_token: CSRF_TOKEN,
					ID_KONFIRMASI_PENJUALAN: id
	            },
	            success: function (results) {
	     //            if (results.success === true) {
	     //            	Swal.fire(
						//   'Berhasil!',
						//   'Status konfirmasi berhasil diubah',
						//   'success'
						// );
	     //            } else {
	     //                Swal.fire(
						//   'Gagal!',
						//   'Status konfirmasi tidak diubah',
						//   'danger'
						// )
	     //            }
	            }
	        });
    	});
    });
    

});