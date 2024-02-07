



function start_Toast(Status, fullNameHtmlInput) {
    loadResponse(Status, fullNameHtmlInput);
}

function loadResponse(Status , fullNameHtmlInput){    
    if (Status == 'true') {
        toastr.remove();
        showToastr('success', "Succès de l'Ajout :" + fullNameHtmlInput);
    }
    if (Status == 'false') {
        toastr.remove();
        showToastr('error', 'Taxon Supprimé :' + fullNameHtmlInput);
    }
}

function showToastr(type, title) {
    let body;
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "showDuration": "1000",
        "hideDuration": "100",
        "timeOut": 1000,
        "onclick": null,
        "onCloseClick": null,
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": true
    };
    switch(type){
        case "info": body = "<span> <i class='fa fa-spinner fa-pulse'></i></span>";
            break;
        default: body = '';
    }
    
    toastr[type](body, title)
}

