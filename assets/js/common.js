if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}

function callAjaxGet(url) {
    return callAjax(url, {}, 'GET');
}

function callAjaxPost(url, data = {}, isFormData = false) {
    return callAjax(url, data, 'POST', isFormData);
}

function callAjax(url, data, method, isFormData = false) {
    return new Promise(function(resolve, reject) {
        var requestObj = {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url,
            method,
            data,
            dataType: 'JSON',
            success: function(result) {
                return resolve(result);
            },
            error: function(err) {
                return reject(err);
            }
        };
        if (isFormData) {
            requestObj.processData = false;
            requestObj.contentType = false;
        }
        $.ajax(requestObj);
    });
}

function swalError(text = 'Thao tĂ¡c tháº¥t báº¡i!') {
    return swal.fire({
        title: text,
        text: '',
        icon: 'error',
    })
}

function swalSuccess(title = 'Thao tĂ¡c thĂ nh cĂ´ng!', text = '') {
    return swal.fire({
        title: title,
        html: text,
        icon: 'success',
    })
}

function swalX(data) {
    if (data && data.code == 200) return swalSuccess(data.message);
    var msg = 'Lá»—i chÆ°a xĂ¡c Ä‘á»‹nh!';
    try {
        if (data.message) {
            msg = data.message.toString();
        } else if (data.responseJSON) {
            msg = data.responseJSON.message;
        }
    } catch (e) { console.log(e) }

    return swalError(msg);
}
var eHandler = swalX;


function closeSwal() {
    swal.close();
}

function makeColumn(title, name, render = null, disableSort = false, disableSearch = false) {
    var obj = {
        title: title,
        data: name,
        name: name
    };

    if (disableSort) obj.orderable = false;
    if (disableSearch) obj.searchable = false;
    if (render) {
        if (typeof render === 'string') obj.render = components[render];
        else obj.render = render;
    }
    return obj;
}


function notExpired(expired_at) {
    return getMoment(expired_at).diff(moment(), 'hours') + 12 > 0;
}

$('.area-status-filter .nav-link').click(function() {
    var status = $(this).data('status');
    // swalLoading('Vui lĂ²ng chá»....');

    datatable.ajax.url(urls[orderType].all + (status != 'all' ? ('&status=' + status) : '')).load();
});

$('input[name="comment_on"]').change(function() {
    var checked = $(this).is(':checked');
    var areaComment = $(this).closest('form').find('.comment-content-wrapper').first();
    if (!areaComment.length) return;
    areaComment[checked ? 'show' : 'hide'](500);
    areaComment.find('textarea[name="comments"]').prop('required', checked);
    areaComment.find('input[name="max_comment"]').prop('required', checked);
});

$('input[name="reaction_on"]').change(function() {
    var checked = $(this).is(':checked');
    $(this).closest('form').find('.reaction-wrapper')[checked ? 'show' : 'hide'](500);
});

$('.comment-content-wrapper .badge').click(function() {
    var appendText;
    if ($(this).hasClass('badge-danger')) {
        appendText = '|';
    } else {
        appendText = $(this).html();
    }
    if (appendText === '{icon}') {
        var index = Math.floor(Math.random() * (10 - 1 + 1)) + 1;
        appendText = `{icon${index}}`;
    }

    var commentElm = $(this).closest('form').find('textarea[name="comments"]');
    commentElm.val(commentElm.val() + appendText);
});

function countLine(text) {
    try {
        return text.split("\n").map(x => x.trim()).filter(x => !!x).length;
    } catch (e) {
        console.error(e);
        return 0;
    }
}

$(document).on('click', '.btn-copy', function() {
    /* Get the text field */
    var copyText = document.getElementById($(this).data('target'));

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy");

    toastr.success('Sao Chép!');
});

$(document).on('click', '.input-copy', function() {
    /* Get the text field */
    var copyText = this;

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy");

    toastr.success('Sao Chép!');
});

$(document).on('click', '.copy-on-click', function() {
    var text = $(this).html().trim();
    if (!text) return;
    const el = document.createElement('textarea');
    el.value = text;
    document.body.appendChild(el);
    el.select();
    el.setSelectionRange(0, 99999); /* For mobile devices */
    document.execCommand('copy');
    document.body.removeChild(el);

    toastr.success('Sao Chép!');
});

function getObj(obj) {
    return JSON.parse(JSON.stringify(obj));
}

function logoutWeb() {
    callAjaxPost('/Model/Client/Users/Logout').then(() => {
        window.location.href = '/';
    });
}

function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function hideModal() {
    $('.modal.show').modal('hide');
}

function getFileName() {
    return window.location.host.split('.').map(x => capitalize(x)).join('.') + '_' + moment().format('DD_MM_YYYY') + '_';
}

$('.server-box').click(function() {
    window.location.href = $(this).data('url');
});

var TicketStatusCommon = {
    waiting: 0,
    chating: 1,
    complete: 2,
    guarantee: 3,
    info: 4
}