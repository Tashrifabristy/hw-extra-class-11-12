<?php
include './inc/backendheader.php';
require "../inc/env.php";
$query = "SELECT * FROM banners ";
$response = mysqli_query($conn, $query);
$banners = mysqli_fetch_all($response, 1);
// print_r($banners);
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <h2>All Banners Here</h2>

   <table class="table table-responsive">
        <tr>
            <th>#</th>
            <th>Banner Title</th>
            <th>Banner Desc</th>
            <th>Banner Img</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <?php
        foreach ($banners as $key => $banner) {
        ?>

            <tr>
                <td>
                    <?= ++$key ?>
                </td>
                <td>
                    <?= $banner['title'] ?>
                </td>
                <td>
                    <?= strlen($banner['detail']) > 30 ?  substr($banner['detail'], 0, 30) . "..." : $banner['detail'] ?>
                </td>
                <td>
                    <img width="150px" src="<?= "../uplodes/" . $banner['banner_img'] ?>" alt="">
                      
                </td>
                <td>
                  <span class="btn btn-sm btn-<?= $banner['status']==1 ? 'success' : 'danger'?>">
                       <?= $banner['status']==1 ? 'Active' : 'Deactive' ?></span>

                </td>

                  <td>
                  <a href="../controller/bannerStatus.php?id=<?=$banner['id']?>]" class="btn btn_warning">
                  <?= $banner['status']==1 ? 'Deactive' : 'Active' ?>
                  </a>
                     <a href="#" class="btn btn-primary">Edit</a>
                     <a href="#" class="btn btn-primary">Delete</a>

                  </td>
            </tr>

        <?php
        }
        ?>





    </table
</main>

<?php
include './inc/backendfooter.php';

?>
