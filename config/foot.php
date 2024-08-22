</div>
</div>

<footer class="footer">
<div class="container-fluid">
<p class="clearfix mb-0 text-center"> Copyright <a href="javascript:void(0);" class="text-primary"><?=$ManhDev->site('nameWeb');?></a> © <?=date('Y');?> All right reserved. Website Được Vận Hành Bởi <a href="//zalo.me/<?=$ManhDev->site('phoneAdmin');?>" class="text-danger"><?=$ManhDev->site('nameAdmin');?></a></p>
</div>
</footer>
</div>
</div>
<style>

    .contact-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 30px;
        cursor: pointer;
        z-index: 1032;
    }
    

    .contact-info {
        display: none;
        position: fixed;
        bottom: 90px;
        right: 20px;
        border: 1px solid #ccc;
        background-color: inherit;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }
    
    .contact-link {
        display: block;
        margin-bottom: 10px;
        color: #007bff;
        text-decoration: none;
    }
    
    .contact-icon {
        width: 20px;
        height: 20px;
        margin-right: 5px;
    }
    .form-group {
    margin-top: 10px;
}
</style>
    <div class="contact-button" onclick="toggleContactInfo()">
        <span id="contactButtonText">Liên Hệ</span>
        <img src="https://creator-cdn.icons8.com/BnLmJCV30roCbeRSxXvghqvawNJy5q9tA3xwyKhUwmU/rs:fit:200:200/czM6Ly9pY29uczgt/b3VjaC1wcm9kLWFz/c2V0cy9zdmcvODY5/L2Y4MWQwNmRlLTMy/ODItNGNjMi1iNWNm/LTNhNWMzOWM5YTdl/Yi5zdmc.png" alt="Close Icon" class="close-icon" id="closeIcon" style="display: none;" width="20" height="20">
    </div>
    <div class="contact-info" id="contactInfo">
        <a href="https://www.facebook.com/trandangkhoa.com.vn" target="_blank" class="contact-link">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/1200px-Facebook_Logo_%282019%29.png" alt="Facebook" class="contact-icon"> Facebook
        </a>
        <a href="https://zalo.me/0936763612" target="_blank" class="contact-link">
            <img src="https://cdn.haitrieu.com/wp-content/uploads/2022/01/Logo-Zalo-Arc.png" alt="Zalo" class="contact-icon"> Zalo
        </a>
    </div>

    <script>
            document.getElementById('closeIcon').style.display = 'none';
            function toggleContactInfo() {
            var contactInfo = document.getElementById('contactInfo');
            var contactButton = document.querySelector('.contact-button');
            var contactButtonText = document.getElementById('contactButtonText');
            var closeIcon = document.getElementById('closeIcon');
            
            if (contactInfo.style.display === 'block') {
                contactInfo.style.display = 'none';
                contactButtonText.style.display = 'inline';
                closeIcon.style.display = 'none';
            } else {
                contactInfo.style.display = 'block';
                contactButtonText.style.display = 'none';
                closeIcon.style.display = 'inline';
            }

            if (closeIcon.style.display === 'inline') {
                contactButton.style.paddingRight = '30px';
            } else {
                contactButton.style.paddingRight = '20px';
            }
        }
    </script>


<script>
$(document).ready(function() {
$('#modalSystem').modal('show');
});
function closeModalSystem() {
setCookie('modalSystem', true, 1);
$('#modalSystem').modal('hide');
}
</script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js?1711466686"></script>
<script src="/assets/js/metismenujs.min.js?1711466686"></script>
<script src="/assets/js/simplebar.min.js?1711466686"></script>
<script src="/assets/js/eva.min.js?1711466686"></script>
<script src="/assets/js/app.js?t=1711466686"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
</body>
</html>