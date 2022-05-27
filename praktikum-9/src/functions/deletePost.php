<?php 
    include 'db_functions.php';

    if(delete()){
        echo "
            <script>
                alert('Post has been deleted!');
                window.location.href = '../view/dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Delete failed!');
                window.location.href = '../view/dashboard.php';
            </script>
        ";
    }

    function delete()
    {
        global $mysqli;
        $id = $_POST['id'];
        $result = $mysqli->query("DELETE FROM posts WHERE id = $id");
        if($result){
            return 1;
        } else {
            return 0;
        }
    }
?>