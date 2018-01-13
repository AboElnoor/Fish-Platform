$(document).ready(function() {
    $('table').on('click', '.edit', function(event) {
        event.preventDefault();
        url = $(this).attr('href');
        form = $('.' + $(this).data('form'));
        action = $(this).data('action');
        console.log(url);
        $.ajax({
            url: url,
        })
        .done(function(data) {
            $.each(data, function(index, val) {
                if (val == null) { return true; }
                $('.' + index).val(val);
                console.log(index + ' => ' + val);
            });
            form.attr('action', action);
            form.prepend('<input name="_method" type="hidden" value="PUT">');
            $('.save').val('تعديل');
        })
        .fail(function() {
            alert('ﻻ توجد بيانات');
        });
    });
});
