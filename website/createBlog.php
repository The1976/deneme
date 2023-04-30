<?php 
    require "libs/function.php";

    $title = $description = $imageUrl = $url = "";
    $title_err = $description_err = $imageUrl_err = $url_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        require "views/_addFilm.php";

    }



?>




<?php include "views/_header.php" ?>
<?php include "views/_navbar.php" ?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="createBlog.php" method="POST">

                        <div class="mb-3">
                            <label for="title" class="form-label">title</label>
                            <input type="text" name="title" id="title" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid':'' ?>" value="<?php echo $title ?>">
                            <span class="invalid-feedback"><?php echo $title_err ?></span>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">description</label>
                            <textarea name="description" id="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid':'' ?>" value="<?php echo $description ?>"></textarea>
                            <span class="invalid-feedback"><?php echo $description_err ?></span>
                        </div>

                        <div class="mb-3">
                            <label for="imageUrl" class="form-label">Resim</label>
                            <input type="text" name="imageUrl" id="imageUrl" class="form-control <?php echo (!empty($imageUrl_err)) ? 'is-invalid':'' ?>" value="<?php echo $imageUrl ?>">
                            <span class="invalid-feedback"><?php echo $imageUrl_err ?></span>
                        </div>
                        
                        <div class="mb-3">
                            <label for="url" class="form-label">url</label>
                            <input type="text" class="form-control <?php echo (!empty($url_err)) ? 'is-invalid':'' ?>" value="<?php echo $url ?>" name="url" id="url">
                            <span class="invalid-feedback"><?php echo $url_err ?></span>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
























<?php include "views/_footer.php" ?>