<?php
include_once('connect_db.php');
session_start();
if (isset($_POST['login'])) {
  $sql = "SELECT * FROM register WHERE email = ? AND pass_word = ?";
  $email = $_POST['email'];
  $pass_word = md5($_POST['pass_word']);
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ss', $email, $pass_word);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $_SESSION['email'] = $row['email'];
  if ($row > 0) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "ยินดีต้อนรับเข้าสู่ระบบ",
            type: "success",
            icon: "success"
        });';
    echo '}, 500 );</script>';
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { 
            window.location.href = "index.php";';
    echo '}, 3000 );</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal.fire({
            title: "ผิดพลาด!",
            text: "กรุณาลองใหม่!",
            type: "warning",
            icon: "error"
        });';
    echo '}, 500);</script>';
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { 
        window.location.href = "login.php";';
    echo '}, 3000 );</script>';
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>
<style>
  .container-fluid {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 50px;
  }
</style>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  <div class="container-fluid">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h1 class="card-title">เข้าสู่ระบบ</h1>
        <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="pass_word" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <input type="submit" name="login" value="เข้าสู่ระบบ" class="btn btn-primary">
        </form>
      </div>
    </div>

  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="sweetalert2/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
</body>

</html>