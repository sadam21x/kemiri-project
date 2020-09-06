$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("order-barang-menu");
    menu.classList.add("active");
 
    // Datatable
    const orderBarangTable = document.getElementById("order-barang-table");
    $(orderBarangTable).DataTable();

    $(".konfirmasi").each(function(){
    	$(this).on("click",function(){
    		let id = $(this).attr("id");
    		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	    	$.ajax({
	            type: 'POST',
	            url: "/manajer-marketing/status-konfirmasi",
	            data:{
					_token: CSRF_TOKEN,
					ID_KONFIRMASI_PENJUALAN: id
	            },
	            success: function (results) {
	                if (results.success === true) {
						swal("Berhasil!", 
							"Status Konfirmasi berhasil disimpan!", 
                            "success");
                        // $(".konfirmasi").remove();
                        // $(".terkonfirmasi").add();
	                } else {
						swal("Gagal!", 
							"Status konfirmasi gagal disimpan!", 
							"error");
	                }

	            }
	        });
    	});
    });
});
