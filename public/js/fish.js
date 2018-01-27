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

    $('.Governorate_ID').on('change', function(event) {
        var url = $(this).data('url') + '/' + $(this).val();
        $.ajax({
            url: url,
        })
        .done(function(data) {
            var locals = $('.Locality_ID');
            locals.html('<option value=0>من فضلك اختار</option>');
            $.each(data, function(index, val) {
                locals.append('<option value=' + index + '>' + val + '</option>');
                console.log(index + ' => ' + val);
            });
        });
    });

    $('.Locality_ID').on('change', function(event) {
        var url = $(this).data('url') + '/' + $(this).val();
        $.ajax({
            url: url,
        })
        .done(function(data) {
            console.log(data);
            var villages = $('.Village_ID');
            villages.html('<option value=0>من فضلك اختار</option>');
            $.each(data, function(index, val) {
                villages.append('<option value=' + index + '>' + val + '</option>');
                console.log(index + ' => ' + val);
            });
        });
    });
});
