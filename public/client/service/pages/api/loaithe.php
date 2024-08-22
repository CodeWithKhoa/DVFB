<?php require('../../../../../config/config.php'); ?>

<option value="">-- Loại thẻ --</option>
<?php foreach($list_loaithe as $row) { ?>
<option value="<?=$row;?>">
    <?=$row;?> Auto
</option>
<?php }?>