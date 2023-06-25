<?php include "views/_headers.php" ?>

<?php


if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $username = $username_err = "";
    $comment = $comment_err = "";

    $input_username = cleanInput($_POST["username"]);
    if (empty($input_username)) {
        $username_err = "Kullanıcı Adınızı Giriniz";
    } elseif (strlen($input_username) > 50) {
        $username_err = "Kullanıcı Adınızı Hatalı Girdiniz";
    } elseif (preg_match('/[<>]/', $input_username)){
        $username_err = '<div class="alert alert-danger container mt-2" role="alert">Özel Karakter Kullanmayınız</div>';
    } else {
        $username = $input_username;
    }

    $input_comment = cleanInput($_POST["comment"]);
    if (empty($input_comment)) {
        $comment_err = "Yorum Giriniz.";
    } elseif (strlen($input_comment) > 254) {
        $comment_err = "255 Karakterden Fazla Yorum Yapamazsınız.";
    } elseif (preg_match('/[<>]/', $input_comment)){
        $comment_err = '<div class="alert alert-danger container mt-2" role="alert">Özel Karakter Kullanmayınız</div>';
    } else {
        $comment = $input_comment;
    }

    if (empty($username_err) && empty($comment_err)) {
        $ekle = new search();
        $ekle->addcomment($id, $username, $comment);
        header('location: index.php');
    } else {
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


<?php include "comments.php"; ?>


<div class="container mt-3 card border" style="max-width: 1300px;">
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']);?>">
        <div class="mb-3">
            <label for="username" class="form-label mt-3">Kullanıcınız</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Kullanıcı Adınızı Giriniz">
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
