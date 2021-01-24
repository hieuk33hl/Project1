<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Font/fontawesome-free-5.15.1-web/css/all.min.css" />
</head>

<body>
    <div id="pagination">
        <?php
        if ($current_page > 3) {
            $first_page = 1;
        ?>
            <a class="page-item" href="?<?= $link ?>per_page=<?= $item_per_page ?>&page=<?= $first_page ?>"><i class="fas fa-angle-double-left"></i></a>
        <?php
        }
        if ($current_page > 1) {
            $prev_page = $current_page - 1;
        ?>
            <a class="page-item" href="?<?= $link ?>per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>"><i class="fas fa-angle-left"></i></a>
        <?php }
        ?>
        <?php for ($num = 1; $num <= $totalPages; $num++) { ?>
            <?php if ($num != $current_page) { ?>
                <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                    <a class="page-item" href="?<?= $link ?>per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
                <?php } ?>
            <?php } else { ?>
                <strong class="current-page page-item"><?= $num ?></strong>
            <?php } ?>
        <?php } ?>
        <?php
        if ($current_page < $totalPages - 1) {
            $next_page = $current_page + 1;
        ?>
            <a class="page-item" href="?<?= $link ?>per_page=<?= $item_per_page ?>&page=<?= $next_page ?>"><i class="fas fa-angle-right"></i></a>
        <?php
        }
        if ($current_page < $totalPages - 3) {
            $end_page = $totalPages;
        ?>
            <a class="page-item" href="?<?= $link ?>per_page=<?= $item_per_page ?>&page=<?= $end_page ?>"><i class="fas fa-angle-double-right"></i></a>
        <?php
        }
        ?>
        <?php ?>
    </div>
</body>

</html>