<?php 
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebBlog | Create Post</title>

    <link rel="stylesheet" href="../../css/style.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Trix Editor -->
    <link rel="stylesheet" type="text/css" href="../../css/trix.css">
    <script type="text/javascript" src="../../js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

</head>
<body>
    <?php include '../partials/navbar.php' ?>

    <div class="row">
        <div class="col-md-6 mx-auto mt-3">
            <h3 class="mb-3">Create a Post</h3>
            <form action="../functions/createPost.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div>
                    <input type="text" id="author" name="author" class="form-control" value="<?= $_SESSION['user_id'] ?>" hidden>
                </div>
                <div>
                    <label for="body" class="form-label">Body</label>
                    <input id="body" type="hidden" name="body" >
                    <trix-editor input="body" ></trix-editor>
                </div>
                <div>
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-control <?php if(!empty($_SESSION['is_error'])) echo "is-invalid" ?> " required>
                    <?php if(!empty($_SESSION['is_error'])) : ?>
                        <div class="invalid-feedback"><?= $_SESSION['message'] ?></div>
                    <?php endif; ?>
                    <div>File type : .jpg, .jpeg, .png</div>
                    <div>Max : 5 Mb</div>
                </div>
                <input type="submit" class="btn btn-dark mt-3">
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>