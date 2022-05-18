<?php 
    session_start();

    include '../functions/getData.php';
    $oldData = getJsonData('../data/data.json');
    $newData = $_POST;
    if($_POST){
        storeJsonData($newData, $oldData);
        echo '<script>';
        echo 'alert("Post created successfully");';
        echo 'window.location.href = "/praktikum-8";';
        echo '</script>';
    };
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

</head>
<body>
    <?php include '../partials/navbar.php' ?>

    <div class="row">
        <div class="col-md-6 mx-auto mt-3">
            <h3 class="mb-3">Create a Post</h3>
            <form action="#" method="post">
                <div>
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div>
                    <input type="text" id="author" name="author" class="form-control" value="<?= $_SESSION['user'] ?>" hidden>
                </div>
                <div>
                    <label for="body" class="form-label">Body</label>
                    <textarea id="body" name="body" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-dark mt-3">
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>