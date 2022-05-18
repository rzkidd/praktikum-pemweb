<?php 
    include 'src/functions/getData.php';
    $datas = getJsonData('src/data/data.json');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>WebBlog | Home</title>
    
</head>
<body>
    <?php include 'src/partials/navbar.php'; ?>

    <div class="container-fluid p-0">
        <img src="https://source.unsplash.com/1520x400?web" alt="jumbotron">
    </div>

    <div class="container">
        <?php 
            $counter = 1;
            foreach ($datas as $data){
        ?>
        <div class="<?= ($counter > 2) ? "hide" : "show" ?>">
            <article>
                <div class="article">
                    <a href="src/view/post.php?id=<?= $data['id'] ?>" class="text-decoration-none text-black fs-3" style="font-weight: 600"><?= $data['title'] ?></a>
                    <p>By: <?= $data['author'] ?></p>
                    <p >
                        <?= substr($data['body'], 0, 150) . ' ....' ?>
                    </p>
                    <a href="src/view/post.php?id=<?= $data['id'] ?>">Read more</a>
                </div>
                
                <img src="https://source.unsplash.com/200x200" alt="post image">
            </article>
            <div class="line"></div>
        </div>
        <?php $counter++; } ?>

        <div class="show-more" id="showMore">
            <a href="#article-3" onclick="show()">Show more</a>
        </div>
    </div>

    <footer class="container-fluid bg-dark">
        <p>&copy 2022</p>
    </footer>

    <script>
        $(document).ready(function(){
            $('.hide').hide();

            $('#navAbout').hover(function(){
                $('#aboutCard').toggle();
            });

            $('#navHome').addClass('active');
        })

        function show(){
            $('.hide').show();
            $('#showMore').hide();
        }
    </script>
</body>
</html>