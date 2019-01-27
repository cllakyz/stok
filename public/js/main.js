$(document).ready(function () {
    $("a[href='#']").attr('href', 'javascript:;');

    $('[data-toggle="tooltip"]').tooltip();

    $('.datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true
    });

    $('form').not('#login_form').attr("autocomplete", "off");

    checkSwitch();

    $(document).on('click', '.custom-switch-input', function () {
        checkSwitch();
        var thisInput = $(this);
        var controller = thisInput.attr("data-controller");
        var id = thisInput.attr("data-id");
        if(controller && id){
            var status;
            if(thisInput.is(':checked')){
                status = 1;
            } else{
                status = 0;
            }
            $.post(site_url + "/" + controller + "/changeStatus", {id: id, status: status}, function (data) {
                var data = $.parseJSON(data);
                if(data.status_code == 100){
                    notify("success", "Başarılı", data.status_text);
                } else{
                    notify("error", "Hata!", data.status_text);
                }
            });
        }
    });

    $(document).on('click', '.btn-add-modifier', function (e) {
        e.preventDefault();
        var i = $('.modifier-name').length;
        var temp = '<div class="row modifier-row"><div class="col-md-6"><label>Özellik Adı</label><input type="text" class="form-control modifier-name" name="modifier['+i+'][name]"></div>' +
            '<div class="col-md-6"><label>Özellik Değeri</label><div class="input-group"><input type="text" class="form-control" name="modifier['+i+'][value]"><span class="input-group-append"><button class="btn btn-danger btn-remove-modifier" type="button">Sil</button></span></div></div></div>';
        $('.modifier-div').append(temp);
        i++;

    });

    $(document).on('click', '.btn-remove-modifier', function (e) {
        e.preventDefault();
        $(this).parents('.modifier-row').remove();
    });

    $(document).on('submit', '.excel_import_form', function (e) {
        e.preventDefault();
        var thisForm = $(this);
        if($('.dropify').val() == ""){
            notify("info", "Uyarı", "Lütfen bir excel dosyası seçiniz");
            return false;
        }
        $.ajax({
            url: thisForm.attr('action'),
            type: "POST",
            data: new FormData(thisForm[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function(result){
                result = $.parseJSON(result);
                if(result.status_code == 100){
                    notify("success", "Başarılı", result.status_text);
                } else{
                    notify("error", "Hata!", result.status_text);
                }
            },
            error: function(er){
                notify("error", "Hata!", er);
            }
        });
    });
});

function notify(type, title, message) {
    var options = {
        title: title,
        message: message,
        position: 'topCenter',
        timeout: 1500,
    };
    if(type == 'success'){
        iziToast.success(options);
    }else if(type == 'error'){
        iziToast.error(options);
    }else if(type == 'info'){
        iziToast.info(options);
    } else if(type == 'warning'){
        iziToast.warning(options);
    }
}

function post_form(form_id){
    var this_form = $('#' + form_id);

    this_form.submit(function (e) {
        /* submit olduğundan sayfa yenilemesini engelle */
        e.preventDefault();
    });
    /* boş bırakılan input saydırmak için */
    var hata = 0;

    /* submit butonu pasif et */
    this_form.find('button[type=submit]').attr('disabled', 'disabled');
    this_form.find('input[type=submit]').attr('disabled', 'disabled');

    /* zorunlu class atılan inputlar boş mu? */
    this_form.find('.required').each(function () {
        if ($(this).val() == '') {
            /* value boş */
            $(this).addClass('is-invalid');
            hata++;
        }
    });

    if (hata > 0) {
        /* hata mesajı ver */
        /*alert('lütfen zorunlu alanları doldurun');*/
        this_form.find('button[type=submit]').removeAttr('disabled');
        this_form.find('input[type=submit]').removeAttr('disabled');
        notify('info', "Uyarı", "Lütfen Zorunlu Alanları Doldurun");
        return false;
    }

    var post_url = this_form.attr('action');
    var serialized_form = this_form.serialize();

    $.post(post_url, serialized_form, function (data) {
        var data = $.parseJSON(data);

        if (data.status_code == 100) {
            localStorage.setItem('message', data.status_text);
            if(data in data){
                window.location.href = site_url + data.data.redirect_url;
            } else{
                window.location.reload();
            }
        } else {
            notify("error", "Hata!", data.status_text);
            this_form.find('button[type=submit]').removeAttr('disabled');
            this_form.find('input[type=submit]').removeAttr('disabled');
        }
    });
}

function delete_item(controller, id) {
    if(controller && id){
        swal({
            title: "Emin misiniz?",
            text: "Sildiğiniz item kalıcı olarak silinecektir. Devam etmek istiyor musunuz?",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Evet, Sil!",
            cancelButtonText: "Hayır",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.post(site_url + "/" + controller + "/delete", {id: id}, function (data) {
                    var data = $.parseJSON(data);
                    if(data.status_code == 100){
                        notify("success", "Başarılı", data.status_text);
                        swal.close();
                        if($('.datatable-row').length > 1){
                            $('.row_' + id).remove();
                        } else{
                            window.location.reload();
                        }
                    } else{
                        notify("error", "Hata!", data.status_text);
                    }
                });
            } else {
                swal.close();
            }
        });
    } else{
        return false;
    }
}

function checkSwitch(){
    var checkItem = $('.custom-switch-input');
    if(checkItem.is(':checked')){
        $('.custom-switch-description.active').fadeIn(0);
        $('.custom-switch-description.passive').fadeOut(0);
    } else{
        $('.custom-switch-description.active').fadeOut(0);
        $('.custom-switch-description.passive').fadeIn(0);
    }
}