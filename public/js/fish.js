$(document).ready(function() {
    $('.save').on('click', function(event) {
        event.preventDefault();
        url = $(this).parents('form').attr('action');
        console.log($(this).parents('form').attr('action'));
        $.ajax({
            url: url,
            method: 'post',
            data: $(this).parents('form').serialize(),
        })
        .done(function(data) {
            console.log(data);
            location.reload();
            window.scrollTo(0, 0);
        })
        .fail(function (data) {
            console.log(data.responseJSON.errors);
            var htmlText = '<div class="alert alert-danger"><ul>';
            $.each(data.responseJSON.errors, function(index, val) {
                console.log(index + ' => ' + val);
               htmlText += '<li>' + val + '</li>';
            });
            htmlText += '</ul></div>';
            $('h2.section-title').after(htmlText);
        });
    });

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
            var villages = $('.Village_ID');
            villages.html('<option value=0>من فضلك اختار</option>');
            $.each(data, function(index, val) {
                villages.append('<option value=' + index + '>' + val + '</option>');
                console.log(index + ' => ' + val);
            });
        });
    });
});
