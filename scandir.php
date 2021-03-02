<?php $files = scandir($_POST['path']);

function human_filesize($bytes, $decimals = 2) {
    $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . " ".@$size[$factor];
}
?>

<table class="table table-hover border border-5 tablesorter" id="table" style="background-color: white ;font-family: 'Ubuntu', sans-serif;">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Size</th>
        <th scope="col">Upload Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($files as $file) {
        if ($file == '.') { continue; } ?>
        <tr>
            <td style="color: black">
            <?php if (!is_dir($file)) { ?>

                <i class="bi bi-file-earmark"></i>
                <a href="<?= explode("public_html", $_POST['path'])[1].$file?>">
                <?= pathinfo($file, PATHINFO_FILENAME); ?></a>
            <?php }
                else {
                    if ($file == '..') { ?> <i class="bi bi-arrow-90deg-up subfolder" style="cursor: pointer; font-weight: bold"></i> <?php }
                    else { ?>
                        <i class="bi bi-folder-fill"></i>
                        <span class="subfolder" style="font-weight: bold; cursor: pointer">
                    <?= pathinfo($file, PATHINFO_FILENAME); ?></span>
                    <?php }} ?>

            </td>
            <td style="color: black; text-align: left"><?php if (!is_dir($file)) { echo human_filesize(filesize($_POST['path'].$file));} ?></td>
            <td style="color: black"><?php if (!is_dir($file)) { echo date("F d Y H:i:s.", filemtime($_POST['path'].$file));} ?></td>

        </tr>
    <?php } ?>
    </tbody>
</table>