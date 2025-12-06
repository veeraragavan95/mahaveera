<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>MahaVeera World</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Creative Portfolio Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Kross Template v1.0">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

</head>
<body>
  

<header class="navigation fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand font-tertiary h3" href="index.php"><img src="images/logo.png" alt="Myself"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">about</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="portfolio.php">Portfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- page title -->
<section class="page-title bg-primary position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="text-white font-tertiary">Blogs</h1>
      </div>
    </div>
  </div>
  <!-- background shapes -->
  <img src="images/illustrations/page-title.png" alt="illustrations" class="bg-shape-1 w-100">
  <img src="images/illustrations/leaf-pink-round.png" alt="illustrations" class="bg-shape-2">
  <img src="images/illustrations/dots-cyan.png" alt="illustrations" class="bg-shape-3">
  <img src="images/illustrations/leaf-orange.png" alt="illustrations" class="bg-shape-4">
  <img src="images/illustrations/leaf-yellow.png" alt="illustrations" class="bg-shape-5">
  <img src="images/illustrations/dots-group-cyan.png" alt="illustrations" class="bg-shape-6">
  <img src="images/illustrations/leaf-cyan-lg.png" alt="illustrations" class="bg-shape-7">
</section>
<!-- /page title -->

<!-- blog -->
<section class="section">
  <div class="container">
    <div class="col-lg-12 mx-auto" align="right">
              <a href="blogAdd.php"><button class="btn btn-success">Add</button></a>
            </div>
            <br>
    <div class="row">
    <?php
      session_start();
      $_SESSION['msg'] = '';
      $msg = $_SESSION['msg'];
      date_default_timezone_set('Asia/Kolkata');
      $date = date('Y-m-d h:i:s', time());

      $connection = mysqli_connect("localhost","root","","mahalakshmi");
      $getvalues = mysqli_query($connection,"SELECT * FROM blogdairy");
      while($r = mysqli_fetch_assoc($getvalues)){
        $sno = $r['sno'];
        $BlogName = $r['BlogName'];
        $BlogDetails = $r['BlogDetail'];
        $Highlights = $r['Highlights'];
        $BlogPhotoName = $r['BlogPhotoName'];
        $VisitPlace = $r['VisitPlace'];
        $BlogDate = $r['BlogDate'];
        
    ?>
        <div class="col-lg-4 col-sm-6 mb-4">
          <article class="card shadow">
            <img class="rounded card-img-top" src="images/blog/<?php echo $BlogPhotoName; ?>.jpg" >
            <div class="card-body">
              <h4 class="card-title"><a class="text-dark" href="blogDairy.php?id=<?php echo $sno; ?>"><?php echo $BlogName; ?></a>
              </h4>
              <p class="cars-text"><?php $BlogDetails; ?></p>
              <a href="blogDairy.php?id=<?php echo $sno; ?>" class="btn btn-xs btn-primary">Read More</a>
            </div>
          </article>
        </div>
      <?php } ?>
      
    </div>
  </div>
</section>
<!-- /blog -->

<!-- clients -->
<section class="section pb-0">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title">Cute Pics</h2>
      </div>
    </div>
    <div class="client-logo-slider d-flex align-items-center">
      <?php
      $getvalues = mysqli_query($connection,"SELECT * FROM photoslide order by rand()");
          while($r = mysqli_fetch_assoc($getvalues)){
          $SlideName = $r['SlideName'];
      ?>
      <a href="" class="text-center imageContainer d-block outline-0 p-4"><img class="d-unset img-fluid"
          src="images/clients-logo/<?php echo $SlideName; ?>.jpg" alt="client-logo"></a>
        <?php } ?>
    </div>
  </div>
</section>
<!-- /clients -->

<!-- contact -->
<section class="section section-on-footer" data-background="images/backgrounds/bg-dots.png">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title">Contact Info</h2>
      </div>
      <div class="col-lg-8 mx-auto">
        <div class="bg-white rounded text-center p-5 shadow-down">
          <h4 class="mb-80">Contact Form</h4>
          <form action="#" class="row">
            <div class="col-md-6">
              <input type="text" id="name" name="name" placeholder="Full Name" class="form-control px-0 mb-4" required>
            </div>
            <div class="col-md-6">
              <input type="email" id="email" name="email" placeholder="Email Address" class="form-control px-0 mb-4" required>
            </div>
            <div class="col-12">
              <textarea name="message" id="message" class="form-control px-0 mb-4"
                placeholder="Type Message Here" required></textarea>
            </div>
            <div class="col-lg-6 col-10 mx-auto">
              <button class="btn btn-primary w-100">send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /contact -->

<!-- footer -->
<footer class="bg-dark footer-section">
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5 class="text-light">Email</h5>
          <p class="text-white paragraph-lg font-secondary">veeraragavan95@gmail.com</p>
        </div>
        <div class="col-md-4">
          <h5 class="text-light">Phone</h5>
          <p class="text-white paragraph-lg font-secondary">+91 96599 46850</p>
        </div>
        <div class="col-md-4">
          <h5 class="text-light">Address</h5>
          <p class="text-white paragraph-lg font-secondary">50/19-C4 LR Manickam Street, Bharathipuram, Dharmapuri, Tamilnadu, India - 636705</p>
        </div>
      </div>
    </div>
  </div>
  <div class="border-top text-center border-dark py-5">
    <p class="mb-0 text-light">Copyright &copy;<script>
        var CurrentYear = new Date().getFullYear()
        document.write(CurrentYear)
      </script> Designed &amp; Developed by <a class="text-white-50" href="https://veeraragavan95.wordpress.com/">Veera Ragavan</a></p>
  </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- filter -->
<script src="plugins/shuffle/shuffle.min.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>