$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("order-barang-menu");
    menu.classList.add("active");
 
    // Mencegah submit form via tombol enter
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
    });

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    //ambil semua produk
    $.ajax({
        type: 'GET',
        url: "/sales-b/order-barang/products/",
        success: function (results) {
            if (results.success === true) {
                $("#product").empty();
                results.data.forEach(addOption)
                function addOption(item, index, arr){
                    let text = item.NAMA_PRODUCT;
                    let val = item.KODE_PRODUCT;
                    var o = new Option(text, val);
                    $(o).html(text);
                    $("#product").append(o);
                }
            }
        }
    });

    //ambil produk ketika kategori dipilih
    $('#categories').change(function(){
        $("#product").empty();
        if($(this).val() == "semua"){
            $.ajax({
                type: 'GET',
                url: "/sales-b/order-barang/products/",
                success: function (results) {
                    if (results.success === true) {
                        $("#product").empty();
                        results.data.forEach(addOption)
                        function addOption(item, index, arr){
                            let text = item.NAMA_PRODUCT;
                            let val = item.KODE_PRODUCT;
                            var o = new Option(text, val);
                            $(o).html(text);
                            $("#product").append(o);
                        }
                    }
                }
            });
        }
        else{
            var jenis = $(this).val();
            $.ajax({
                type: 'GET',
                url: "/sales-b/order-barang/products/"+jenis,
                success: function (results) {
                    if (results.success === true) {
                        $("#product").empty();
                        results.data.forEach(addOption)
                        function addOption(item, index, arr){
                            let text = item.NAMA_PRODUCT;
                            let val = item.KODE_PRODUCT;
                            var o = new Option(text, val);
                            $(o).html(text);
                            $("#product").append(o);
                        }
                    }
                }
            });
        }
    });

    //KODE_PRODUCT 1 = INDEXNYA 0
    console.log(products[0]["KODE_PRODUCT"]);

    $('#add-btn').on('click',function(){
        let id = $("#product").val();

        if($("#keranjang tbody tr#"+id).length){
            let qty = Number($("#qty-"+id).val());
            $("#qty-"+id).val(Number(qty+1));
            hitungTotalHargaProduk(id);
        }
        else{

            let product = products[id-1];

            let row = '<tr id="'+product["KODE_PRODUCT"]+'">\
                <td>\
                    '+product["KODE_PRODUCT"]+'\
                </td>\
                <td>\
                    '+product["NAMA_PRODUCT"]+'\
                </td>\
                <td>\
                    <input type="hidden" name="harga[]" id="price-'+product["KODE_PRODUCT"]+'" value="'+product["HARGA_PRODUCT"]+'">'+product["HARGA_PRODUCT"]+'\
                </td>\
                <td>\
                    <input type="number" name="quantity[]" id="qty-'+product["KODE_PRODUCT"]+'" value="1" min="1" class="input-num-sm quantity">\
                </td>\
                <td>\
                    <input type="hidden" name="discount[]" id="disc-'+product["KODE_PRODUCT"]+'"> \
                    <input type="number" id="discpersen-'+product["KODE_PRODUCT"]+'" value="0" min="0" max="100" class="input-num-sm discpersen">\
                </td>\
                <td>\
                    <span id="totalharga-'+product["KODE_PRODUCT"]+'"></span>\
                    <input type="hidden" name="total[]" id="total-'+product["KODE_PRODUCT"]+'" value="1" min="1" class="input-num-sm totalharga">\
                </td>\
                <td>\
                    <button type="button" class="btn btn-sm btn-youtube del-btn" id="del-'+product["KODE_PRODUCT"]+'">\
                        <i class="fas fa-trash-alt"></i>\
                    </button>\
                </td>\
            </tr>';
            id = product["KODE_PRODUCT"];
            $("#keranjang tbody").append(row);
            hitungTotalHargaProduk(id);
            hitungSemuaTotal();
        }
    });

    $(document).on("click",".del-btn",function(){
        let id = $(this).attr('id').slice(4);
        $('#'+id).remove();
        hitungSemuaTotal();
    });

    $("#input-ongkos-kirim").on("input",function(){
        $("#ongkos-kirim").val(new Intl.NumberFormat(['id']).format($(this).val()));
        hitungSemuaTotal();
    });

    $(document).on("input",".quantity",function(){
        let id = $(this).attr('id').slice(4);
        hitungTotalHargaProduk(id);
    });

    $(document).on("input",".discpersen",function(){
        let id = $(this).attr('id').slice(11);
        let percent = Number($(this).val());
        let harga = Number($("#price-"+id).val());
        let qty = Number($("#qty-"+id).val());
        $("#disc-"+id).val(parseFloat(percent/100*harga*qty));
        hitungTotalHargaProduk(id);
    });

    function hitungTotalHargaProduk(id){
        let quantity = Number($("#qty-"+id).val());
        let disc = Number($("#disc-"+id).val());
        let harga = Number($("#price-"+id).val());
        let total = Number((harga*quantity)-disc);
        $("#total-"+id).val(total);
        $("#totalharga-"+id).html(new Intl.NumberFormat(['id']).format(total));
        hitungSemuaTotal();
    }

    function hitungSemuaTotal(){
        $("#total-item").val(new Intl.NumberFormat(['id']).format(hitungTotalItem()));
        $("#total-harga").val(new Intl.NumberFormat(['id']).format(hitungTotalHarga()));
        $("#total-bayar").val(new Intl.NumberFormat(['id']).format(hitungTotalBayar()));
    }

    function hitungTotalItem(){
        let totalitem = 0;
        $(".quantity").each(function(){
            totalitem =  totalitem+Number($(this).val());
        });
        return totalitem;
    }

    function hitungTotalHarga(){
        let totalharga = 0;
        $(".totalharga").each(function(){
            totalharga =  totalharga+Number($(this).val());
        });
        return totalharga;
    }

    function hitungTotalBayar(){
        let totalharga = Number(hitungTotalHarga());
        let ongkir = Number($("#input-ongkos-kirim").val());
        let totalbayar = Number(totalharga+ongkir);
        return totalbayar;
    }
});