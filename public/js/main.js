$(document).ready(function () {
    $(document).on('click', '.btn-add-modifier', function (e) {
        e.preventDefault();
        var i = $('.modifier-name').length;
        var temp = '<div class="col-md-6"><label>Özellik Adı</label><input type="text" class="form-control modifier-name" name="modifier['+i+'][name]"></div>' +
            '<div class="col-md-6"><label>Özellik Değeri</label><input type="text" class="form-control" name="modifier['+i+'][value]"></div>';
        $('.modifier-div').append(temp);
        i++;

    });
});