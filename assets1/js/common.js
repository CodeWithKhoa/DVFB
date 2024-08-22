
var orderStatus = {
    lack_money: 100,
    running: 1,
    error: 2,
    waiting_cancel: 98,
    cancelled: 3,
    refund: 97,
    completed: 0,
    need_warranty: 99
};

var momentFormat = {
    full: 'HH:mm:ss DD/MM/YYYY',
    full_reverse: 'YYYY/MM/DD HH:mm:ss',
    date: 'DD/MM/YYYY',
    datetime_picker: 'YYYY-MM-DD HH:mm:ss',
};

var exportField = {
    total_share: 'Tổng Bài Chia sẻ',
    duration: 'Thời gian',
    total_live: 'Tổng Live',
    group_ids: "ID Group",
    max_post: 'Bài viết Tối đa',
    post_done: 'Số Bài Đã chạy',
    live_used: 'Live Đã lên',
    live_left: 'Live Còn lại',
    live_per_day: 'Live /1 Ngày'
};

if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if (typeof toastr !== "undefined")
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

    if (typeof $.fn.dataTable !== 'undefined') {
        $.fn.dataTable.ext.errMode = 'none';
        $.extend( $.fn.dataTable.defaults, {
            // errMode: 'none',
            "language": {
                "sProcessing":   "Đang xử lý...",
                "sLengthMenu":   "Xem _MENU_ mục",
                "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                "emptyTable":  "Không tìm thấy dòng nào phù hợp",
                "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix":  "",
                "sSearch":       "Tìm:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Đầu",
                    "sPrevious": "Trước",
                    "sNext":     "Tiếp",
                    "sLast":     "Cuối"
                }
            }
        });
    }

    $('form.form-ajax').submit(function(e) {
        e.preventDefault();
        var target = $(this).data('done');

        // Update ckeditor
        if (typeof CKEDITOR !== "undefined" && Object.keys(CKEDITOR.instances).length > 0) {
            Object.keys(CKEDITOR.instances).forEach(function(key) {
                CKEDITOR.instances[key].updateElement();
            });
        }

        var formData = new FormData($(this)[0]);
        swalLoading('Đang xử lý...');
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (target && typeof window[target] !== 'undefined') {
                    window[target](data);
                } else {
                    if (datatable && datatable.ajax) datatable.ajax.reload(null, false);
                    swalSuccess(data.message);
                }
            },
            error: function(e) {
                if (target && typeof window[target] !== 'undefined' && ['loginSuccess', 'registerSuccess'].indexOf(target) != -1) {
                    if (typeof grecaptcha != 'undefined') grecaptcha.reset();
                    $('[name="g-recaptcha-response"]').attr('required', 'required');
                }
                eHandler(e);
            },
        });
    });
});


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

function swalConfirm(text = 'Bạn có chắc chắn muốn thực thi?') {
    return swal.fire({
        title: text,
        text: '',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Không'
    }).then(function(action) {
        return !!action.value;
    })
}

function swalConfirmX(title = "Xác Nhận", text = 'Bạn có chắc chắn muốn thực thi?') {
    return swal.fire({
        title: title,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Không'
    }).then(function(action) {
        return !!action.value;
    })
}

function swalError(text = 'Thao tác thất bại!') {
    return swal.fire({
        title: text,
        text: '',
        icon: 'error',
    })
}

function swalSuccess(title = 'Thao tác thành công!', text = '') {
    return swal.fire({
        title: title,
        html: text,
        icon: 'success',
    })
}

function swalLoading(title = 'Vui lòng chờ', text = 'Vui lòng không thoát đến khi Hệ thống xử lý hoàn tất, Xin cảm ơn!') {
    return swal.fire({
        title: title,
        text: '',
        icon: 'info',
        html: text,
        onBeforeOpen: function() {
            Swal.showLoading()
        },
    })
}

function swalX(data) {
    if (data && data.code == 200) return swalSuccess(data.message);
    var msg = 'Lỗi chưa xác định!';
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

function swalInput(title, inputValue = '', inputType = 'number') {
    return new Promise(function(resolve) {
        Swal.fire({
            title: title,
            inputValue: inputValue,
            input: inputType,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Không',
        }).then(function (action) {
            return resolve((action['isConfirmed'] && action['value']) ? resolve(action['value']) : false);
        })
    });
}

function closeSwal() {
    swal.close();
}

function formatMoney(input, suffix = '', round = true) {
    if (!input) return '0';
    if (round) {
        input = (parseInt(input) + 0.5).toString();
    } else {
        input = input.toString();
    }

    var negative = false;
    if (input.substr(0, 1) === '-') {
        input = input.substr(1);
        negative = true;
    }
    if (round) {
        input = parseInt(input);
    } else {
        input = parseFloat(input);
    }
    return (negative ? '-' : '') + input.toLocaleString('en-GB') + suffix;
}

function getMoment(timeString) {
    timeString = timeString.toString().trim();
    var format = 'DD/MM/YYYY';
    if (timeString.length == 10) {
        if (timeString.match(/\d{4}-\d{2}-\d{2}/)) format = 'YYYY-MM-DD';
    } else if (timeString.length > 10) {
        if (timeString.match(/\d{4}-\d{2}-\d{2}/)) {
            format = 'YYYY-MM-DD hh:mm:ss';
        } else {
            format = 'hh:mm:ss DD/MM/YYYY';
        }
    }

    return moment(timeString, format);
}

function timeLeft(expired_at) {
    if (!expired_at) return 'Hết hạn';
    var hours = getMoment(expired_at).diff(moment(), 'hours');
    if (hours < 0) return 'Hết hạn';
    if (hours > 24) {
        return (Math.floor(hours / 24))+ ' ngày';
    } else {
        return hours+ ' giờ';
    }
}

function getTicketStatus(status) {
    var mapping = {
        status_0: 'Chờ hỗ trợ',
        status_1: 'Đang hỗ trợ',
        status_2: 'Hoàn thành',
        status_3: 'Bảo hành',
        status_4: 'Cần thông tin',
    };

    return mapping['status_' + status] || 'NULL';
}

/**
 * Define table components for render
 */
var components = {
    text_default: value => value != null? `<span style="color:#526484">${value}</span>` : '',
    text_table: value => value != null? `<span style="color:#53535f">${value}</span>` : '',
    text_tag_p: value => value != null? `<span style="color:#72849a">${value}</span>` : '',
    text_primary: value => value != null? `<span class="text-primary">${value}</span>` : '',
    text_success: value => value != null? `<span class="text-success">${value}</span>` : '',
    text_danger: value => value != null? `<span class="text-danger">${value}</span>` : '',
    text_secondary: value => value != null? `<span style="color: #854fff">${value}</span>` : '',
    visible: value => `<span class="text-success">${parseInt(value) == 1 ? 'Bật' : 'Tắt'}</span>`,

    number: value => value != null? `<span>${formatMoney(value)}</span>` : '',
    number_float: value => value != null? `<span>${formatMoney(value, '', false)}</span>` : '',
    money: value => value != null? `<span class="text_money">${formatMoney(value)}</span>` : '',

    link: link => {
        if (!link) return ' ';
        if (link.indexOf('http') === 0) return `<a href="${link}" target="_blank">${link}</a>`;
        return `<a href="https://facebook.com/${link}" target="_blank">${link}</a>`;
    },
    normal_link: link => link ? `<a href="${link}" target="_blank">${link}</a>` : '',
    link_twitter: (link, t, log) => `<a href="${log.link}" target="_blank">${log.uid}</a>`,
    link_post_ins: link => link ? `<a href="https://www.instagram.com/p/${link}" target="_blank">${link}</a>` : '',
    link_ins: link => link ? `<a href="https://www.instagram.com/${link}" target="_blank">${link}</a>` : '',
    link_tiktok: (link, t, full) => link ? `<a href="${full.link}" target="_blank">${full.uid}</a>` : '',
    link_follow_tiktok: (link, t, full) => link ? `<a href="https://www.tiktok.com/@${link}" target="_blank">${full.uid}</a>` : '',
    link_post_tiktok: (link, t, full) => link ? `<a href="${link}" target="_blank">${full.uid}</a>` : '',
    link_shopee: link => link ? `<a href="https://shopee.vn/shop/${link}" target="_blank">${link}</a>` : '',
    link_sp_shopee: (link, t, full) => {
        return `<a href="${link}" target="_blank">${full.name}</a>`;
    },
    link_telegram: (link, t, full) => {
        let username = full.link.replace('https://t.me/', '');
        return `<a href="${link}" target="_blank">${username}</a>`;
    },
    link_video_youtube: (link, t, full) => {
        return `<a href="https://www.youtube.com/watch?v=${full.name}" target="_blank">${full.name}</a>`;
    },
    link_channel_youtube: (link, t, full) => {
        return `<a href="https://www.youtube.com/channel/${full.name}" target="_blank">${full.name}</a>`;
    },
    user: user => user ? components.text_table(user.username) : '',
    user_name: user => user ? components.text_table(user.name) : '',
    user_read: user_read => `<span>${user_read ? 'Đã đọc' : 'Chưa đọc'}</span>`,
    days_left: expired_at => {
        return timeLeft(expired_at);
    },
    days_left_text: expired_at => {
        let text = timeLeft(expired_at);
        if (text === 'Hết hạn') {
            return '<span class="text-danger">Hết hạn</span>';
        } else {
            return `<span class="text-success">${text}</span>`
        }
    },
    proxy_days_left: (proxy) => {
        return components.days_left_text(proxy.expired_at);
    },
    buff_action: (id, t, order) => {
        var html = '';
        if ([0, 2, 3, 94, 95, 97, 98, 99].includes(order.status)) html += '<i class="fas fa-check-circle text-success"></i>';
        if ([1, 100].includes(order.status) && order.package.is_cancel == 1)
            html += `<button class="btn btn-danger btn-sm btn-nw btn-dim btn-sm btn-cancel-order" style="min-width: 112px" data-id="${id}">
                        <em class="icon ni ni-cross-circle"></em> Hủy Order
                    </button>`;
        return html;
    },
    vip_action: (id, t, vip) => {
        var html = '';
        if ([0, 2, 3, 94, 95, 97, 98, 99].includes(vip.status)) html += '<i class="fas fa-check-circle text-success"></i>';
        if (['facebook-vip_cmt', 'facebook-vip_cmt_pro', 'facebook-vip_live'].includes(type) && notExpired(vip.expired_at)
        && ![97].includes(vip.status) && (type == "facebook-vip_cmt" && vip.package.api_endpoint != "new"))
            html += `<button class="btn btn-success btn-dim btn-sm btn-edit-vip" data-id="${id}">
                        <em class="icon ni ni-edit-fill"></em> Sửa
                    </button>`;
        if (vip.package.api_endpoint === 'aut' && type.match(/(vip_like|vip_cmt|vip_cmt_pro|vip_live)/) && [0, 1].includes(vip.status)) {
            html += `<button class="btn btn-primary btn-dim btn-sm btn-extend-vip" style="min-width: 112px" data-id="${id}">
                        <em class="icon ni ni-clock"></em> Gia hạn
                    </button>`;
        }

        if (!notExpired(vip.expired_at)) {
            html += `<button class="btn btn-danger btn-dim btn-sm btn-delete-vip-expired" style="min-width: 112px" data-id="${id}">
                        <i class="icon ni ni-trash"></i> Xoá gói
                    </button>`;
        }

        if ([1, 100].includes(vip.status) && vip.package.is_cancel == 1)
            html += `<button class="btn btn-danger btn-sm btn-nw btn-dim btn-sm btn-cancel-order" style="min-width: 112px" data-id="${id}">
                        <em class="icon ni ni-cross-circle"></em> Hủy Order
                    </button>`;

        return html;
    },
    reason: (value, t, order) => {
        if (![3, 4, 97].includes(order.status) || !value) return '';
        return `<span class="text-danger">${value}</span>`
    },
    order_status: status => {
        if (status == 0) return `<span class="badge badge-dim badge-pill badge-outline-success status">
                                    <em class="icon ni ni-check-circle" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
        if (status == 1) return `<span class="badge badge-dim badge-pill badge-outline-primary status">
                                    <em class="icon ni ni-spark" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
        if (status == 2) return `<span class="badge badge-dim badge-pill badge-outline-danger status">
                                    <em class="icon ni ni-alert-circle" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
        if (status == 3) return `<span class="badge badge-dim badge-pill badge-outline-danger status">
                                    <em class="icon ni ni-cross-circle" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
        if (status == 50) return `<span class="badge badge-dim badge-pill badge-outline-danger status">
                                    <em class="icon ni ni-search" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
        if (status == 93) return `<span class="badge badge-dim badge-pill badge-outline-warning status">
                                    <em class="icon ni ni-alert" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
        if (status == 94) return `<span class="badge badge-dim badge-pill badge-outline-warning status">
                                    <em class="icon ni ni-loader" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
        if (status == 95) return `<span class="badge badge-dim badge-pill badge-outline-info status">
                                    <em class="icon ni ni-coin-alt" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
        if (status == 96) return `<span class="badge badge-dim badge-pill badge-outline-info status">
                                    <em class="icon ni ni-coin-alt" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
        if (status == 97) return `<span class="badge badge-dim badge-pill badge-outline-dark status">
                                    <em class="icon ni ni-undo" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
        if (status == 98) return `<span class="badge badge-dim badge-pill badge-outline-warning status">
                                    <em class="icon ni ni-pause" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
        if (status == 99) return `<span class="badge badge-dim badge-pill badge-outline-info status">
                                    <em class="icon ni ni-clipboad-check" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
        if (status == 100) return `<span class="badge badge-dim badge-pill badge-outline-warning status">
                                    <em class="icon ni ni-clock" style="margin-right: 3px"></em> ${getOrderStatus(status)}</span>`;
    },
    order_reaction: reaction => {
        let arrReaction = reaction != null ? reaction.split(",") : [];
        let html = "";
        arrReaction.map(function(item) {
            html += `<img src="/assets/images/fb-reaction/${item}.svg" alt="" style="width: 30px">`;
        })
        return html;
    },
    package: (data) => data && data.display_name || '...',
    money_before: (money_before, t, full) => {
        if (!money_before) return ' ';
        var html = `<span class="text-primary">${formatMoney(money_before)}</span>`;
        money_before = Number(money_before);
        var realAmount = full.money_after + full.price;
        if (full.event_name === 'refund') realAmount = full.money_after - full.price;
        if (!isNaN(realAmount) && realAmount !== money_before && Math.abs(realAmount - money_before) > 10)
            html += "<span class='text-danger'><i class='fas fa-exclamation-triangle'></i></span>";
        return html;
    },
    money_after: (money) => `<span style="color:#886cff">${formatMoney(money)}</span>`,

    service_type: function(data) {
        if (!data) return '';
        var mapping = {
            buff_sub: 'Follow',
            buff_sub_slow: 'Đề xuất',
            share_profile: 'Share Profile',
            share_group: 'Share Group',
            like_page: "Like Trang",
            sub_page: "Follow Trang"
        };

        return mapping[data] || 'NULL';
    },
    support_type: function(data) {
        var mapping = {
            via: 'Via Facebook',
            bm: 'BM - Business',
            clone: 'Clone Facebook',
            'Facebook'               : 'Facebook',
            'facebook-like_post'        : 'Buff Like Bài viết',
            'facebook-reaction_post'    : 'Buff Cảm xúc Bài viết',
            'facebook-like_comment'     : 'Buff Like cho Comment',
            'facebook-like_page'        : 'Buff Like Page',
            'facebook-sub_page'         : 'Buff Follow Page',
            'facebook-follow'           : 'Buff Sub - Follow',
            'facebook-buff_sale'        : 'Buff Like - Follow Sale',
            'facebook-member_group'     : 'Buff Member Nhóm',
            'facebook-comment'          : 'Buff Comment',
            'facebook-review'           : 'Buff Đánh giá - Check in',
            'facebook-share'            : 'Buff Share Nhóm - Nick',
            'facebook-livestream'       : 'Buff Mắt Livestream',
            'facebook-view_video'       : 'Buff View Video',
            'facebook-view_story'       : 'Buff View Story',
            'facebook-vip_like'         : 'Gói Like (Tháng)',
            'facebook-vip_like_group'   : 'Gói Like Group (Tháng)',
            'facebook-vip_cmt'          : 'Gói Comment (Tháng)',
            'facebook-vip_cmt_pro'      : 'Gói Comment Xịn (Tháng)',
            'facebook-vip_live'         : 'Gói Mắtlivestream (Tháng)',
            'bot-proxies'               : 'IP - Proxy riêng',
            'bot-love_story'            : 'BOT Love Story',
            'bot-love'                  : 'BOT Tương tác Facebook',
            'bot-comment'               : 'BOT Comment Facebook',
            'Instagram'                 : 'Instagram',
            'instagram-love'            : 'Instagram - Buff Tim',
            'instagram-sub'             : 'Instagram - Buff Follow',
            'instagram-comment'         : 'Instagram - Buff Comment',
            'instagram-view'            : 'Instagram - Buff View',
            'instagram-vip_like'        : 'Instagram - VIP Tim (Tháng)',
            'Tiktok'                    : 'Tiktok',
            'tiktok-love'               : 'TikTok - Buff Tim',
            'tiktok-follow'             : 'TikTok - Buff Follow',
            'tiktok-comment'            : 'TikTok - Buff Comment',
            'tiktok-view'               : 'TikTok - Buff View',
            'tiktok-share'              : 'TikTok - Buff Share',
            'tiktok-live'               : 'TikTok - Buff Mắt Livestream',
            'Youtube'                   : 'Youtube',
            'youtube-like'              : 'Youtube - Buff Thích Video',
            'youtube-follow'            : 'Youtube - Buff Subscribe',
            'youtube-comment'           : 'Youtube - Buff Comment',
            'youtube-view'              : 'Youtube - Buff View',
            'youtube-view_hour'         : 'Youtube - Buff 4k Giờ xem',
            'Shopee'                    : 'Shopee',
            'shopee-love'               : 'Shopee - Buff Yêu thích',
            'shopee-follow'             : 'Shopee - Buff Follow',
            'Telegram'                  : 'Telegram',
            'telegram-member'           : 'Telegram - Buff Thành viên',
            'Twitter'                   : 'Twitter',
            'twitter-like'              : 'Twitter - Buff Like',
            'twitter-follow'            : 'Twitter - Buff Theo dõi',
        };

        return mapping[data] || '';
    },
    cookie_live: cookie_live => {
        if (cookie_live) return "<span class='text-success'>Hoạt động</span>";
        return "<span class='text-danger'>Hỏng/Lỗi</span>";
    },
    blocked: blocked => {
        if (!blocked) return "<span class='text-success'>Không</span>";
        return "<span class='text-danger'>Bị chặn</span>";
    },
    is_running: (running, t, bot) => {
        return `` +
            `
         <div class="custom-control custom-checkbox">
             <input id="cb_all_${bot.id}" type="checkbox" class="custom-control-input cb-toggle-bot" data-id="${bot.id}" ${running ? 'checked' : ''}>
             <label class="custom-control-label" for="cb_all_${bot.id}"></label>
         </div>
        `
    },
    main_id: function(mainId, t, full) {
        if (mainId) return ` [${mainId}]`;
        return full.id;
    },
    enable: enable => enable ? 'Không' : 'Có',
    sim_status: status => {
        if (status == 0) return `<span class="badge badge-pill badge-geekblue status">
                                    <i class="icon ni ni-spark" style="vertical-align: -.3em;"></i> ${getS4OrderStatus(status)}</span>`;
        if (status == 1) return `<span class="badge badge-pill badge-cyan status">
                                    <i class="icon ni ni-check-circle" style="vertical-align: -.3em;"></i> ${getS4OrderStatus(status)}</span>`;
        if (status == 2) return `<span class="badge badge-pill badge-orange status">
                                    <i class="icon ni ni-loader" style="vertical-align: -.3em;"></i> ${getS4OrderStatus(status)}</span>`;
        if (status == 3) return `<span class="badge badge-pill badge-red status">
                                    <i class="icon ni ni-alert-circle" style="vertical-align: -.3em;"></i> ${getS4OrderStatus(status)}</span>`;
        if (status == 4) return `<span class="badge badge-pill badge-magenta status">
                                    <i class="icon ni ni-undo" style="vertical-align: -.3em;"></i> ${getS4OrderStatus(status)}</span>`;
        if (status == 5) return `<span class="badge badge-pill badge-red status">
                                    <i class="icon ni ni-loader" style="vertical-align: -.3em;"></i> ${getS4OrderStatus(status)}</span>`;
        if (status == 6) return `<span class="badge badge-pill badge-volcano status">
                                    <i class="icon ni ni-loader" style="vertical-align: -.3em;"></i> ${getS4OrderStatus(status)}</span>`;
    },
    btn_view_ticket: function(id, is_new = false) {
        let ticket = `<button class="btn btn-primary btn-dim btn-sm btn-nw btn-view-ticket" data-id="${id}">
        <em class="icon ni ni-eye"></em> Xem`;
        if (is_new) {
            ticket += `<span class="badge badge-pill badge-red ml-2">1</span>`;
        }
        ticket += `</button>`;
        return ticket;
    },
};

/**
 *
 * @param {string} title data title
 * @param {string} name data name to display
 * @param {string|function|null} render -> if string, it will be taken from $components, else it should be empty or an function
 * @param {boolean} disableSort
 * @param {boolean} disableSearch
 * @returns {Object}
 */
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

var definedColumns = {
    total_price: makeColumn('Tổng tiền', 'total_price', 'money'),
    note: makeColumn('Ghi chú', 'note', 'note'),
    created_at: makeColumn('Thời gian', 'created_at'),
    reason: makeColumn('Lý do', 'reason', 'reason'),
    order_status: makeColumn('Trạng thái', 'status', 'order_status'),
    action: render => {return { title: 'Tác vụ', data: 'id', name: 'id', orderable: false, searchable: false, render}},
    sim_status: makeColumn('Trạng thái', 'status', 'sim_status'),
    card_type: makeColumn('Loại Card', 'card_type', cardType => {
        return `<span class="text-success">${cardType}</span>`;
    }),
    card_serial: makeColumn('Seri thẻ', 'card_serial'),
    card_code: makeColumn('Mã thẻ', 'card_code'),
    card_value: makeColumn('Mệnh giá', 'card_value', card_value => formatMoney(card_value * 1000, ' VND')),
    card_status: makeColumn('Trạng thái', 'status', status => {
        var allText = {
            t_1: 'Thành công',
            t_2: 'Sai mệnh giá',
            t_3: 'Thẻ lỗi',
            t_4: 'Bảo trì',
            t_99: 'Chờ xử lý',
        };
        return `<span class="text-success">${allText['t_' + status]}</span>`;
    }),
    id: makeColumn('STT', 'id'),
    title: makeColumn('Tiêu đề', 'title'),
    uid: makeColumn('ID Seeding', 'uid', 'text_secondary'),
    id_fb: makeColumn('ID Via / Clone / BM', 'uid', 'text_secondary'),
    order_id: makeColumn('ID Order', 'order_id', 'text_primary'),
    order_id_uid: makeColumn('ID / ID Order', 'id', (status, t, ticket) => {
        return components.text_primary(ticket.order_id || ticket.uid);
    }, true),
    updated_at: makeColumn('Cập nhật cuối', 'updated_at', 'created_at'),
    ticket_topic: makeColumn('Dịch vụ', 'topic','support_type'),
    ticket_status:  makeColumn('Trạng Thái', 'status', (status, t, ticket) => {
        if (status == 0) return `<span class="badge badge-pill badge-outline-warning status"><em class="icon ni ni-loader" style="margin-right: 3px"></em>${getTicketStatus(status)}</span>`;
        if (status == 2) return `<span class="badge badge-pill badge-outline-success status"><em class="icon ni ni-check-circle" style="margin-right: 3px"></em>${getTicketStatus(status)}</span>`;
        if (status == 1) return `<span class="badge badge-pill badge-outline-primary status"><em class="icon ni ni-spark" style="margin-right: 3px"></em>${getTicketStatus(status)}</span>`;
        if (status == 3) return `<span class="badge badge-pill badge-outline-info status"><em class="icon ni ni-clipboad-check" style="margin-right: 3px"></em>${getTicketStatus(status)}</span>`;
        if (status == 4) return `<span class="badge badge-pill badge-outline-danger status"><em class="icon ni ni-clock" style="margin-right: 3px"></em>${getTicketStatus(status)}</span>`;
    }),
    username: makeColumn('Tài khoản', 'username', (status, t, ticket) => {
        return ticket.user.username;
    }, true),
    main_order_id: makeColumn('ID Order', 'main_order_id', (main_order_id, t, row) => {
        if (main_order_id) return `<span>${main_order_id}</span>`;
        return `<span>[${row.order_id}]</span>`;
    }),
    data: makeColumn('Chi tiết', 'other', (data, t, order) => {
        // Merge data_input and other
        let obj = {};
        // if (order.data_input && Object.keys(order.data_input).length) obj = {...obj, ...order.data_input}
        if (order.other && Object.keys(order.other).length) obj = {...obj, ...order.other}

        let string = '';
        if (data && Object.keys(obj).length > 0) {
            for (let [key, value] of Object.entries(obj)) {
                if(exportField.hasOwnProperty(key) && value != null && value !== "") {
                    string += `<b>${exportField[key]}:</b> ${value}<br />`;
                }
            }
        }
        return `<div contenteditable="true" class="data-input">${string}</div>`
    }, true),
};

function getOrderStatus(status) {
    var mapping = {
        status_0: 'Hoàn thành',
        status_1: 'Đang chạy',
        status_2: 'ID Lỗi / Die',
        status_3: 'Hủy đơn',
        status_50: 'Tracking',
        status_93: 'Order Sai/Lỗi',
        status_94: 'Chờ xử lý',
        status_95: 'Hoàn tiền 1 phần',
        status_96: 'Chờ hoàn tiền',
        status_97: 'Hoàn tiền',
        status_98: 'Chờ huỷ đơn',
        status_99: 'Bảo hành',
        status_100: 'Đang xử lý',
    };

    return mapping['status_' + status] || 'NULL';
}

function getS4OrderStatus(status) {
    var mapping = {
        status_0: 'Đang chờ SMS',
        status_1: 'Hoàn thành',
        status_2: 'Không có SMS',
        status_3: 'Hết hạn',
        status_4: 'Hoàn tiền',
        status_5: 'Hủy đơn',
        status_6: 'Chờ lấy SĐT',
    };

    return mapping['status_' + status] || 'NULL';
}

function notExpired(expired_at) {
    return getMoment(expired_at).diff(moment(), 'hours') + 12 > 0;
}

$('.area-status-filter .nav-link').click(function() {
    var status = $(this).data('status');
    // swalLoading('Vui lòng chờ....');

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

    toastr.success('Đã sao chép!');
});

$(document).on('click', '.input-copy', function() {
    /* Get the text field */
    var copyText = this;

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy");

    toastr.success('Đã sao chép!');
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

    toastr.success('Đã sao chép!');
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
