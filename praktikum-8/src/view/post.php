<?php 
    session_start();

    include '../functions/getData.php';
    $id = $_GET;
    $data = getJsonData('../data/data.json');
    $indexData = array_search($id['id'], array_column(getJsonData('../data/data.json'), "id"));
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/style.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>WebBlog | <?= $data[$indexData]['title'] ?></title>
</head>
<body>
    <?php include '../partials/navbar.php' ?>
    
    <div class="row justify-content-center mt-3">
        <div class="col-md-6">
            <a href="/praktikum-8" class="btn btn-secondary mb-2"><i class="bi bi-arrow-left"></i> Back</a>
            <h2><?= $data[$indexData]['title'] ?></h2>
            <p>By : <?= $data[$indexData]['author'] ?></p>
            <img src="https://source.unsplash.com/800x400" alt="post image" width="100%">
            <p class="mt-3"><?= $data[$indexData]['body'] ?></p>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#navAbout').hover(function(){
                $('#aboutCard').toggle();
            });
            $('#navPosts').addClass('active');
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>