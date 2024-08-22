<?php require('../../../../../config/config.php');
$rand = random('123456789', 6).time(); ?>
<div class="gachthe row mt-2" data-row="<?=$rand;?>">
    <div class="col-lg-3">
        <div class="form-group">
            <select id="loaithe" name="loaithe" class="telco form-control" data-row="<?=$rand;?>">
                <option value="">-- Loại thẻ --</option>
                <?php foreach($list_loaithe as $row) { ?>
                <option value="<?=$row;?>">
                    <?=$row;?> Auto
                </option>
                <?php }?>
            </select>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <select id="menhgia" name="menhgia" class="charging-amount form-control" data-row="<?=$rand;?>">
                <option value="0">Chọn mệnh giá</option>
            </select>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <input id="seri" name="seri" class="serial form-control" type="text" data-row="<?=$rand;?>" placeholder="Serial">

        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <input id="pin" class="pin form-control" name="pin" type="text" data-row="<?=$rand;?>" placeholder="Mã thẻ">
        </div>
    </div>

    <div class="col-lg-2">
        <div class="form-group">
            <button class="btn btn-sm" onclick="deletet<?=$rand;?>()"><img src="https://icon-library.com/images/delete-icon-image/delete-icon-image-17.jpg" height="40px"></button>
        </div>
    </div>
</div>

<script>
function deletet<?=$rand;?>() {
    $('.gachthe[data-row="<?=$rand;?>"]').remove();
}
</script>
