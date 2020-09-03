$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("evaluasi-kinerja-sales-menu");
    menu.classList.add("active");

    // Mencegah submit form via tombol enter
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
    });

    // tiny mce
    tinymce.init({
        selector: '.tinymce-textarea',
    });

});