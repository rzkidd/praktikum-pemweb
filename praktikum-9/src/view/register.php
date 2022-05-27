<?php 
    session_start();
    session_unset();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebBlog | Register</title>

    <link rel="stylesheet" href="../../css/style.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="background-color: #f1f2f6;">
    <div class="row">
        <div class="col-md-3 mx-auto mt-5">
            <h2 class="text-center">WebBlog</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mx-auto mt-3 bg-body rounded shadow">
            <form action="../functions/register.php" method="post" class="mt-4 ">
                <?php if (!empty($_SESSION['err_password']) || !empty($_SESSION['err_username'])) : ?>
                    <div class="alert alert-danger "><?= "Registration Failed!" ?></div>
                <?php endif; ?>
                <input type="text" placeholder="Name" id="name" name="name" class="form-control mb-3" required>
                <input type="text" placeholder="Username" id="username" name="username" class="form-control mb-3 <?php if(!empty($_SESSION['err_username'])) echo "is-invalid" ?>" required>
                <?php if(!empty($_SESSION['err_username'])) : ?>
                    <div class="invalid-feedback mb-3"><?= $_SESSION['err_username'] ?></div>
                <?php endif; ?>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control mb-3 <?php if(!empty($_SESSION['err_password'])) echo 'is-invalid' ?>" required>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control mb-3 <?php if(!empty($_SESSION['err_password'])) echo 'is-invalid' ?>" required>
                <button type="submit" class="btn btn-dark w-100 mb-3">Register</button>
                <div class="d-flex align-items-center mb-3">
                    <span class="mx-auto">Already have an account?</span>
                </div>
                <a href="login.php" class="btn btn-success mb-3 w-100">Login</a>
            </form>
        </div>
    </div>

</body>
</html>