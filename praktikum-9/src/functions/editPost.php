<?php 
    session_start();
    include 'db_functions.php';

    $id = $_POST['id'];
    $title = validateData($_POST['title']);
    $body = $_POST['body'];
    $oldImage = $_POST['oldImage'];


    if($_FILES['image']['error'] === 4){
        $image = $oldImage;
    } else {
        $image = upload();
    }

    if(update()){
        echo "
            <script>
                alert('Post has been updated!');
                window.location.href = '../view/dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Update failed!');
                window.location.href = '../view/dashboard.php';
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

    function update()
    {
        global $mysqli, $title, $body, $image, $id;
        $query = "UPDATE posts SET title = '$title', body = '$body', image_path = '$image' WHERE id = $id";
        $result = $mysqli->query($query);
        if ($result){
            return 1;
        } else {
            return 0;
        }
    }
?>