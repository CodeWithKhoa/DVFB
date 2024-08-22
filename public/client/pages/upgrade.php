<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Nâng Cấp Bậc Tài Khoản</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
    
    <div class="col-md-6 col-lg-6 col-xl-4 mb-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="pricing text-center">
                    <div class="pricing-top">
                        <h4 class="text-success mb-0">Cộng Tác Viên</h4>
                        <img src="/img/pricing-starter.svg" class="img-fluid my-4" alt="starter pricing">
                        <div class="pricing-amount">
                            <h3 class="text-success mb-0">500.000</h3>
                            <h6 class="pricing-duration">Coin</h6>
                        </div>
                    </div>
                    <div class="pricing-middle">
                            <p><i class="fas fa-check mr-2"></i>Được giảm giá</p>
                            <p><i class="fas fa-check mr-2"></i>Được tạo website riêng</p>
                    </div>
                    <div class="pricing-bottom pricing-bottom-basic mt-3">
                        <div class="pricing-btn">
                            <a href="/recharge/banking" class="btn btn-success font-16">Nâng cấp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-6 col-xl-4 mb-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="pricing text-center">
                    <div class="pricing-top">
                        <h3 class="text-primary mb-0">Đại Lý</h3>
                        <img src="/img/pricing-premium.svg" class="img-fluid price-pro-image my-4" alt="premium pricing">
                        <div class="pricing-amount">
                            <h2 class="text-primary mb-0">10.000.000</h2>
                            <h5 class="pricing-duration">Coin</h5>
                        </div>
                    </div>
                    <div class="pricing-middle">
                            <p><i class="fas fa-check mr-2"></i>Được giảm giá</p>
                            <p><i class="fas fa-check mr-2"></i>Được hỗ trợ riêng</p>
                            <p><i class="fas fa-check mr-2"></i>Được tạo website riêng</p>
                    </div>
                    <div class="pricing-bottom pricing-bottom-professional mt-3">
                        <div class="pricing-btn">
                            <a href="/recharge/banking" class="btn btn-primary font-16">Nâng cấp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-6 col-xl-4 mb-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="pricing text-center">
                    <div class="pricing-top">
                        <h4 class="text-info mb-0">Nhà Phân Phối</h4>
                        <img src="/img/pricing-ultimate.svg" class="img-fluid my-4" alt="ultimate pricing">
                        <div class="pricing-amount">
                            <h3 class="text-info mb-0">20.000.000</h3>
                            <h6 class="pricing-duration">Coin</h6>
                        </div>
                    </div>
                    <div class="pricing-middle">
                            <p><i class="fas fa-check mr-2"></i>Được giảm giá</p>
                            <p><i class="fas fa-check mr-2"></i>Được hỗ trợ riêng 24/7</p>
                            <p><i class="fas fa-check mr-2"></i>Được tạo website riêng</p>
                            <p><i class="fas fa-check mr-2"></i>Được nhiều ưu đãi khác</p>
                    </div>
                    <div class="pricing-bottom pricing-bottom-enterprise mt-3">
                        <div class="pricing-btn">
                            <a href="/recharge/banking" class="btn btn-info font-16">Nâng cấp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>