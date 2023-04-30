<?php
include_once "./inc/login_header.php";
session_start();
?>
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Login</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-6 col-lg-5">
<div class="login-wrap p-4 p-md-5">
<div class="icon d-flex align-items-center justify-content-center">
<span class="fa fa-user-o"></span>
</div>
<h3 class="text-center mb-4">Login Pannel</h3>
<form action="./controller/loginUser.php" method="POST" class="login-form">
<div class="form-group">
<input name="email" type="text" class="form-control rounded-left" placeholder="Username" required>
<?php
if(isset($_SESSION['error_msg'])){
  ?>
  <span style=color:red><?= $_SESSION['error_msg'] ?></span>
  <?php
}
?>
</div>
<div class="form-group d-flex">
<input name="password" type="password" class="form-control rounded-left" placeholder="Password" required>

</div>
<div class="form-group d-md-flex">
<div class="w-50">

</div>
<div class="w-50 text-md-right">
<a href="./register.php">Register Account ?</a>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<div class="toast <?= isset($_SESSION['msg']) ? 'show' : '' ?>" style="position: absolute;right:10px;bottom:80px" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    
    <strong class="me-auto">Bootstrap</strong>
    <small>just now</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    <?= isset($_SESSION['msg']) ? $_SESSION['msg'] : '' ?>
  </div>
</div>
<?php
include_once "./inc/loogin_footer.php";
session_unset();
?>