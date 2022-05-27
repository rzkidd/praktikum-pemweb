<?php 
    session_start();
    include 'db_functions.php';

    $title = validateData($_POST['title']);
    $author = $_POST['author'];
    $body = $_POST['body'];
    $image = upload();

    if(insert()){
        echo "
            <script>
                alert('Post has been created!');
                window.location.href = '../../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Post creation failed!');
                window.location.href = '../../index.php';
            </script>
        ";
    }

    function upload()
    {
        $acceptedFileTypes = ['jpg', 'jpeg', 'png'];
        $imageName = $_FILES['image']['name'];
        $imageType = explode('.', $imageName);
        $imageType = end($imageType);
        $imageSize = $_FILES['image']['size'];
        $imageTemp = $_FILES['image']['tmp_name'];

        if(!in_array($imageType, $acceptedFileTypes)){
            $_SESSION['is_error'] = true;
            $_SESSION['message'] = "File type is not accepted.";
            header("Location: ../view/createPost.php");
        }

        if($imageSize > 5000000){
            $_SESSION['is_error'] = true;
            $_SESSION['message'] = "File is too big.";
            header("Location: ../view/createPost.php");
        }

        $newImageName = uniqid();
        $newImageName .= '.';
        $newImageName .= $imageType;

        move_uploaded_file($imageTemp, "../../img/$newImageName");
        return $newImageName;
    }

    function validateData($data)
    {   
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }

    function insert()
    {
        global $mysqli, $title, $author, $body, $image;
        $query = "INSERT INTO posts (title, author, body, image_path) VALUES ('$title', $author, '$body', '$image')";
        $result = $mysqli->query($query);
        if ($result){
            return 1;
        } else {
            return 0;
        }
    }
?>