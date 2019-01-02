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

$(document).ready(function () {
    $("a[href='#']").attr('href', 'javascript:;');
});