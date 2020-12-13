<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/about-us.min.css">
  <link rel="stylesheet" href="/LandingPage.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="/komik.css">
  <link rel="stylesheet" href="/comicDetail.min.css">
  <link rel="stylesheet" href="/create.css">
  <title><?= $title ;?></title>


</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="/#">Ilkom Komik</a>
      <span class="navbar-toggler bg-light show-menu" onclick="showMenu()"> &#9776;</span>
      <div class="collapse navbar-collapse" id="mobile-menu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        </ul>

        <a onclick="showMenu()" class="nav-link active" href="/#home">Home <span class="sr-only">(current)</span></a>
        <a onclick="showMenu()" class="nav-link" href="/#about-us">About</a>
        <a onclick="showMenu()" class="nav-link" href="/Komik">Komik</a>
        <span class="hide" onclick="showMenu()">X</span>
        <?php if(logged_in()): ?>
        <a class="login-button" href="/logout">Logout</a>
        <?php else :  ?>
        <a class="login-button" href="/login">Login</a>
        <?php endif  ?>
      </div>
    </div>
  </nav>

  <?= $this->renderSection('content'); ?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>

  <script>
  function showMenu() {
    const mobileMenu = document.getElementById("mobile-menu");
    const close = document.querySelector(".hide");

    mobileMenu.classList.toggle("show-mobile-menu");
    close.classList.toggle("close-button");
    close.classList.toggle("hide");
    console.log(close);
  }
  </script>

  <script>
  function previewImg() {
    const imgPreview = document.querySelector(".image-preview");
    const sampul = document.querySelector("#sampul")
    const fileReader = new FileReader();
    fileReader.readAsDataURL(sampul.files[0])
    fileReader.onload = function(e) {
      imgPreview.src = e.target.result
    }
  }
  </script>

</body>

</html>
<!-- 
<a class="nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
<a class="nav-link" href="/pages/contact">Contact</a>
<a class="nav-link" href="/Komik">Komik</a>
<?php if(logged_in()): ?>
<a class="nav-link" href="/logout">Logout</a>
<?php else :  ?>
<a class="nav-link" href="/login">Login</a>
<?php endif  ?> -->