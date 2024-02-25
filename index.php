<?php

include 'koneksi.php';

error_reporting(0);
session_start();

if (isset($_SESSION['sebagai'])) {
  if ($_SESSION['sebagai'] == 'user') {
    header("Location: user/index.php");
    exit;
  } elseif ($_SESSION['sebagai'] == 'admin') {
    header("Location: admin/dashboard.php");
    exit;
  }
}

if (isset($_POST['btn-login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM login WHERE username='$username' and password='$password'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) === 1) {
    $_SESSION['username'] = true;
    $rows = mysqli_fetch_assoc($result);
    if ($rows['sebagai'] == 'user') {
      $_SESSION['sebagai'] = $rows['sebagai'];
      $_SESSION['nama'] = $rows['nama'];
      // $_SESSION['id'] = $rows['password'];
      return header("Location: user/index.php");

      if (isset($_SESSION['username'])) {
        header("Location: user/index.php");
        exit;
      }
    } elseif ($rows['sebagai'] == 'admin') {
      $_SESSION['sebagai'] = $rows['sebagai'];
      $_SESSION['nama'] = $rows['nama'];
      // $_SESSION['id'] = $rows['password'];
      return header("Location: admin/dashboard.php");


      if (isset($_SESSION['username'])) {
        header("Location: admin/dashboard.php");
        exit;
      }
    }
  } else {
    echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
  }
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Safety | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/icon/logosafety.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
    <script src="jquery.min.js"></script>
	<style>* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
           
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
* {
  box-sizing: border-box;
}
.bg-image {
  /* The image used */
  background-image: url("assets/img/bg-batik.png");
  
  /* Add the blur effect */
  opacity: 0.50;
  filter: alpha(50);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}

main {
    height: 90vh;
    width: 100vw;
    position: relative;
    margin: 0 auto;
}

footer {
    height: 10vh;
    background-color: #ffffff;
}

.row {
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    max-width: 1000px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

.colm-logo {
    flex: 0 0 50%;
    text-align: left;
}

.colm-form {
    flex: 0 0 40%;
    text-align: center;
}

.colm-logo img {
    max-width: 400px;
}

.colm-logo h2 {
    font: 26px;
    font-weight: 400;
    padding: 0 30px;
    line-height: 32px;
}

.colm-form .form-container {
    background-color: #ffffff;
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 8px 16px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    padding: 20px;
    max-width: 400px;
}

.colm-form .form-container input, .colm-form .form-container .btn-login {
    width: 100%;
    margin: 5px 0;
    height: 45px;
    vertical-align: middle;
    font-size: 16px;
}

.colm-form .form-container input {
    border: 1px solid #dddfe2;
    color: #1d2129;
    padding: 0 8px;
    outline: none;
}

.colm-form .form-container input:focus {
    border-color: #1877f2;
    box-shadow: 0 0 0 2px #e7f3ff;
}

.colm-form .form-container .btn-login {
    background-color: #1877f2;
    border: none;
    border-radius: 6px;
    font-size: 20px;
    padding: 0 16px;
    color: #ffffff;
    font-weight: 700;
}

.colm-form .form-container a {
    display: block;
    color: #1877f2;
    font-size: 14px;
    text-decoration: none;
    padding: 10px 0 20px;
    border-bottom: 1px solid #dadde1;
}

.colm-form .form-container a:hover {
    text-decoration: underline;
}

.colm-form .form-container .btn-new {
    background-color: #42b72a;
    border: none;
    border-radius: 6px;
    font-size: 17px;
    line-height: 48px;
    padding: 0 16px;
    color: #ffffff;
    font-weight: 700;
    margin-top: 20px; 
}

.colm-form p {
    font-size: 14px;
}

.colm-form p a {
    text-decoration: none;
    color: #1c1e21;
    font-weight: 600;
}

.colm-form p a:hover {
    text-decoration: underline;
}

.footer-contents {
    position: relative;
    max-width: 1000px;
    margin: 0 auto;
}

footer ol {
    display: flex;
    flex-wrap: wrap;
    list-style-type: none;
    padding: 10px 0;
}

footer ol:first-child {
    border-bottom: 1px solid #dddfe2;
}
           
footer ol:first-child li:last-child button {
    background-color: #f5f6f7;
    border: 1px solid #ccd0d5;
    outline: none;
    color: #4b4f56;
    padding: 0 8px;
    font-weight: 700;
    font-size: 16px;
}

footer ol li {
    padding-right: 15px;
    font-size: 12px;
    color: #385898;
}

footer ol li a {
    text-decoration: none;
    color: #385898;
}

footer ol li a:hover {
    text-decoration: underline;
}

footer small {
    font-size: 11px;
}

	</style>
  </head>
  <body>
  <div class="bg-image"></div>
    <div class="row">
      <div align="center">
        <div class="colm-form">
          <div class="form-container shadow">
            <div align="center">
              <img src="assets/img/safety.png" width=100% />
            </div>
            <form method="post">
              <div class="form-container shadow">
                <h4 class="font-weight-bold"><font color="blue">- Silahkan Login -</font></h4>
                <br>
                <input type="text" name="username" id="username" placeholder="Username" oninvalid="this.setCustomValidity('Harap Isi Username Anda')" oninput="setCustomValidity('')" required />
                <input type="password" name="password" id="password" placeholder="Password" oninvalid="this.setCustomValidity('Harap Isi Password Anda')" oninput="setCustomValidity('')" required />
              </div>
              <button type="submit" class="btn-login" name="btn-login">Masuk</button>        
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>
