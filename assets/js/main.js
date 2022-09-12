$(window).on('load', function () {
    $.ajax({
        url: `assets/php/lights.php`,
        dataType: 'JSON'
    }).done(response => {
        $('#rooms').empty();
        response.forEach(room => {
            $('#rooms').append(Room(room));
        });
    }).fail(error => {
        console.log(error);
    })
})

$(document).on('click', '#btn-status', function () {
    let btn = $(this);
    btn.prop('disabled', true);
    let tr = btn.parents('tr');
    let data = JSON.parse(tr.attr('data-room'));
    $.ajax({
        url: `assets/php/change.php`,
        dataType: 'JSON',
        type: 'POST',
        data: data
    }).done(response => {
        tr.attr('data-room', JSON.stringify(response));
        btn.prop('disabled', false);
        btn.attr('class', `light-${response.status ? 'on': 'off'}`);
        btn.html(Button(response));
    }).fail(error => {
        btn.prop('disabled', false);
        console.log(error);
    })
})