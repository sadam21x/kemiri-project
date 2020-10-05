$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("pengiriman-menu");
    menu.classList.add("active");
 
    // Datatable
    const pengirimanBarangTable = document.getElementById("pengiriman-barang-table");
    $(pengirimanBarangTable).DataTable();

    const orderBarangTable = document.getElementById("order-barang-table");
    $(orderBarangTable).DataTable();

    // Form validation
    (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();

});
