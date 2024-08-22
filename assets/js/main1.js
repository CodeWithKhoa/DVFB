console.log(
    "%c Website: KEYVIPP.COM %c",
    'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:15px;color:#7fff00;-webkit-text-fill-color:#7fff00;-webkit-text-stroke: 1px #7fff00;',
    "font-size:12px;color:#999999;"
);
console.log(
    "%c Coder By: Mạnh Con(ManhDev) %c",
    'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:15px;color:#ff7f00;-webkit-text-fill-color:#ff7f00;-webkit-text-stroke: 1px #ff7f00;',
    "font-size:12px;color:#999999;"
);
console.log(
    "%c Liên Hệ: https://www.zalo.me/0528139892 %c",
    'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:15px;color:#00bbee;-webkit-text-fill-color:#00bbee;-webkit-text-stroke: 1px #00bbee;',
    "font-size:12px;color:#999999;"
);
console.log(
    "%c Thông Điệp: Cảm Ơn Bạn Đã Liên Hệ Và Thuê Code Từ Chúng Tôi! Rất Hân Hạnh Được Phục Vụ Bạn %c",
    'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:15px;color:#007fff;-webkit-text-fill-color:#007fff;-webkit-text-stroke: 1px #007fff;',
    "font-size:12px;color:#999999;"
);
const swal = (title, text, icon) => Swal.fire(title, text, icon);
const noti = (text, icon) => toastr[icon](text);
const clipboard = new ClipboardJS('.copyText');
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": 300,
    "hideDuration": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

clipboard.on('success', function (e) {
    noti('Đã Sao Chép' + e.text, 'success');
})

function validURL(str) {
    var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
    var pattern = new RegExp(regex);
    return pattern.test(str);
}

$('#formCard').ajaxForm({
    url: "../ajax.php",
    dataType: 'json',
    data: {
        action: 'reCharge'
    },
    beforeSend: () => $('#formCard > div.mb-2.text-center > button').prop('disabled', true) && $('#formCard > div.mb-2.text-center > button').html('<i class="fas fa-spinner fa-spin" aria-hidden="true"></i> Đang Thực Hiện, Vui Lòng Không Tải Lại Trang!'),
    success: (res) => {
        $('#formCard > div.mb-2.text-center > button').prop('disabled', false) && $('#formCard > div.mb-2.text-center > button').html('<i class="fa fa-shopping-cart" aria-hidden="true"></i> Nạp Thẻ Ngay')
        res.error ? swal('Thông Báo', res.error, 'error') : swal('Thông Báo', res.success, 'success') && setTimeout(() => window.location.reload(), 1500)
    }
});