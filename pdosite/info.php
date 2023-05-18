<?php include "views/_headers.php" ?>

<?php

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $username = $username_err = "";
    $comment = $comment_err = "";

    $input_username = $_POST["username"];
    if (empty(trim($input_username))) {
        $username_err = "Kullanıcı Adınızı Griniz";
    } elseif (strlen($input_username) > 20) {
        $username_err = "Kullanıcı Adınızı Hatalı Girdiniz";
    } else {
        $username = $input_username;
    }

    $input_comment = $_POST["comment"];
    if (empty(trim($input_comment))) {
        $comment_err = "Yorum Giriniz.";
    } elseif (strlen($input_comment) > 254) {
        $comment_err = "255 Karakterden Fazla Yorum Yapamazsınız.";
    } else {
        $comment = $input_comment;
    }


    if (empty($username_err) && empty($comment_err)) {
        $ekle = new search();

        $ekle->addcomment($id,$username, $comment);
        header('location: index.php');
    } else {
        echo "boşşş";
        print_r($username_err);
        print_r($comment_err);
    }
}
?>


<div class="container mt-3">

    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $vt = new search();
        $results = $vt->selectFilm($id);
    }
    ?>
    <?php if ($results) : ?>
        <?php include "views/_filmInfo.php"; ?>
    <?php else : ?>
        <?php include "views/_filmyok.php"; ?>
    <?php endif; ?>

</div>


<?php include "DENEME.php"; ?>








<div class="container mt-3 card border" style="max-width: 1300px;">
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
        <div class="mb-3">
            <label for="username" class="form-label mt-3">Kullanıcınız</label>
            <input type="username" class="form-control" id="username" name="username" placeholder="Kullanıcı Adınızı Giriniz">
            <span class="invalid-feedback"><?php echo $username_err ?></span>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Yorum</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            <span class="invalid-feedback"><?php echo $comment_err ?></span>
        </div>
        <div class="mb-3">
            <button type="submit" name="submit" class="btn btn-primary">Yorumu Kaydet</button>
        </div>
    </form>
</div>



<?php include "views/_footer.php" ?>