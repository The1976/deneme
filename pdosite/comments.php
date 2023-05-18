<?php
    $getComments = new search();
    $result = $getComments->getComments($_GET['id']);
    ?>

    <?php if($result):?>
        <?php include "views/_comments.php"; ?>
    <?php else:?>
    <?php endif;?>
