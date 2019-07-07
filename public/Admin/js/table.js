$('.edit').click(function () {
    $('#editModalLong').modal({ backdrop: 'static', keyboard: false });
    var id = $(this).parents('tr').attr('id');
    $('#custNameInput').val($.trim($('#' + id).children('td:eq(0)').text()));
    $('#indcatTreeDescInput').val($.trim($('#' + id).children('td:eq(1)').text()));
    $('#custEmployeeDescInput').val($.trim($('#' + id).children('td:eq(2)').text()));
    $('#custCapitalDescInput').val($.trim($('#' + id).children('td:eq(3)').text()));
    $('#areaDescInput').val($.trim($('#' + id).children('td:eq(4)').text()));
    $('#custWebSiteInput').val($.trim($('#' + id).children('td:eq(5)').text()));
    $('#profileInput').val($.trim($('#' + id).children('td:eq(7)').text()));
    $('#productInput').val($.trim($('#' + id).children('td:eq(8)').text()));
    $('#editModalLongTitle').text('編號 ' + id);
    $('#editModalLongTitle').attr('index', id);
    $('#editModalLong').modal('show');
});
$('.editInput').blur(function () {
    var id = $('#editModalLongTitle').attr('index');
    var name = $(this).attr('id').slice(0, -5);
    if ($(this).val() != $.trim($('#' + id).children('.' + name).text())) {
        $(this).addClass('text-danger');
    } else {
        $(this).removeClass('text-danger');
    }
});
$('.editModalClose').click(function () {
    if ($('.editInput').hasClass('text-danger')) {
        $('#alertModalLong').modal('show');
    } else {
        $('#editModalLong').modal('hide');
    }
});
$('.alertModalYes').click(function () {
    $('#alertModalLong').modal('show');
    $('#editModalLong').modal('hide');
    $('#alertModalLong').modal('hide');
    $('.editInput').removeClass('text-danger');
});
$('#save').click(function () {

});
$('.delete').click(function () {
    $('#deleteModalLong').modal('show');
});
$('.wrap').mouseover(function () {
    $(this).addClass('text-wrap');
});
$('.wrap').mouseout(function () {
    $(this).removeClass('text-wrap');
});
function fetchInfo(id) {
    var xhr = new XMLHttpRequest;
    xhr.open('POST', '/index.php?c=Magager&a=fetchInfo');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (JSON.parse(xhr.responseText).status) {
                console.log();
            }
        }
    }
    xhr.send('id=' + id);
}
function logout() {
    var xhr = new XMLHttpRequest;
    xhr.open('get', '/index.php?c=manager&a=logout');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.location.href = "/index.php";
        }
    }
    xhr.send(null);
}