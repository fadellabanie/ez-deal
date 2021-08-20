require('./bootstrap');

require('alpinejs');

window.addEventListener('alert', event => {
    toastr[event.detail.type](event.detail.message);
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
    }
});

window.addEventListener('swal',function(e){
    Swal.fire(e.detail);
});