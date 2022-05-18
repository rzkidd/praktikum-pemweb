<?php
echo
'<header class="container-fluid p-0 sticky-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/praktikum-7">WebBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/praktikum-7" id="navHome">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="navCategories">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="navPosts">Posts</a>
            </li>
            <li class="nav-item position-relative">
              <a class="nav-link" href="#" id="navAbout">About</a>
            </li>
            <div class="collapse position-absolute" id="aboutCard">
              <div class="card card-body text-center">
                <p class="m-0 fw-bold">WebBlog v0.1</p>
                <p class="mt-1 mb-0">Since 2022</p>
              </div>
            </div>
          </ul>
        </div>
        <div>
          <a href="/praktikum-7/src/view/createPost.php" class="btn btn-light fw-bold">Create a Post</a>
        </div>
      </div>
  </nav>
</header>';
?>