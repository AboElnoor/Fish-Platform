$(document).ready(function() {
    $('#wysiwyg').summernote({
        height: 300, lang: 'ar-AR'
    });

    $('.next').on('click', function(event) {
        event.preventDefault();
        var form = $(this).parents('form');
        var url = form.attr('action');
        console.log(url);

        $.ajax({
                url: url,
                method: 'post',
                data: form.serialize(),
            })
            .done(function() {
                console.log("success");
                var hash = window.location.hash ? window.location.hash : '#menu0';
                console.log(hash);
                var tabNum = parseInt(hash.match(/\d+/)[0]) + 1;
                var tabTxt = hash.replace(/\d+/, '');
                var nextHash = tabTxt + tabNum;
                console.log(nextHash);
                window.location.hash = nextHash;
                location.reload();
            })
            .fail(function(data) {
                console.log(data.responseJSON.errors);
                var htmlText = '<div class="alert alert-danger"><ul>';
                $.each(data.responseJSON.errors, function(index, val) {
                    console.log(index + ' => ' + val);
                    htmlText += '<li>' + val + '</li>';
                });
                htmlText += '</ul></div>';
                $('h2.section-title').after(htmlText);
            })
            .always(function() {
                window.scrollTo(0, 0);
            });

    });

    $('.save').on('click', function(event) {
        event.preventDefault();
        var form = $(this).parents('form');
        var url = form.attr('action');
        console.log(url);

        $.ajax({
                url: url,
                method: 'post',
                data: form.serialize(),
            })
            .done(function(data) {
                console.log(data);
                location.reload();
            })
            .fail(function(data) {
                console.log(data.responseJSON.errors);
                var htmlText = '<div class="alert alert-danger"><ul>';
                $.each(data.responseJSON.errors, function(index, val) {
                    console.log(index + ' => ' + val);
                    htmlText += '<li>' + val + '</li>';
                });
                htmlText += '</ul></div>';
                $('h2.section-title').after(htmlText);
            })
            .always(function() {
                window.scrollTo(0, 0);
            });
    });

    $('table').on('click', '.edit', function(event) {
        event.preventDefault();
        var url = $(this).attr('href');
        var form = $('.' + $(this).data('form'));
        var action = $(this).data('action');
        console.log(url);

        $.ajax({
                url: url,
            })
            .done(function(data) {
                $.each(data, function(index, val) {
                    if (val == null) {
                        return true;
                    }
                    if (index == 'Governorate_ID') {
                        var baseURL = window.location.origin;
                        var url = baseURL + '/localities/' + val;
                        console.log(url);
                        $.ajax({
                                url: url,
                            })
                            .done(function(localities) {
                                var locals = $('.Locality_ID');
                                locals.html('<option value=0>من فضلك اختار</option>');
                                $.each(localities, function(id, loacal) {
                                    locals.append('<option value=' + id + (data.Locality_ID == id ? ' selected' : '') + '>' + loacal + '</option>');
                                });
                            });
                    }

                    if (index == 'Locality_ID') {
                        var baseURL = window.location.origin;
                        var url = baseURL + '/villages/' + val;
                        console.log(url);
                        $.ajax({
                                url: url,
                            })
                            .done(function(villages) {
                                var select = $('.Village_ID');
                                select.html('<option value=0>من فضلك اختار</option>');
                                $.each(villages, function(id, village) {
                                    select.append('<option value=' + id + (data.Village_ID == id ? ' selected' : '') + '>' + village + '</option>');
                                });
                            });
                    }
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

    $('.Governorate_ID').on('change', function() {
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
