<?php

session_start();


require "_loginModal.php";
require "_signupModal.php";


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">CourseGrades</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./">Home</a>
        </li>';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['isteacher'] == true){
  echo '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./my_courses.php">My Courses</a>
        </li>';
}

echo '<!--
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
        -->
      </ul>';

echo '<form class="d-flex">
        <input class="form-control me-2 flex-fill" type="search" placeholder="Search" aria-label="Search">
        <button class="btn me-2 btn-outline-success" type="submit">Search</button>
      </form>';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  echo '<div class="d-inline text-light me-2">Welcome ' . $_SESSION['username'] . '!</div>';
  echo '<a href="partials/_logout.php" class="btn me-2 btn-outline-success">Logout</a>';
}
else{
  echo '<button class="btn me-2 btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
}


echo '</div>
  </div>
</nav>';

?>