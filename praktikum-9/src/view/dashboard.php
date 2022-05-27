<?php 
    session_start();
    include '../functions/db_functions.php';

    $id = $_SESSION['user_id'];
    $datas = select("SELECT * FROM posts WHERE author = $id"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebBlog | Dashboard</title>

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

    <div class="container">
        <h3 class="mt-3">My Posts</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Title</td>
                    <td>Image</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; foreach($datas as $row) : ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><img src="../../img/<?= $row['image_path'] ?>" alt="<?= $$row['image_path'] ?>" height="100px"></td>
                        <td>
                            <a href="post.php?id=<?= $row['id'] ?>" class="btn btn-info"><i class="bi bi-eye"></i></a>
                            <a href="editPost.php?id=<?= $row['id'] ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <form action="../functions/deletePost.php" method="post" class="d-inline">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php $count++; endforeach; ?>
            </tbody>
        </table>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>