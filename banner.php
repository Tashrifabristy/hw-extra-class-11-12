<?php
include './inc/backendheader.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card col-md-9 mx-auto col-lg-10 ">
        <div class="card-header">
            Add Banner.

        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="../controller/bannerStore.php" method="POST">
                <div class="row">
                    <div class="col-lg-4">
                        <input type="file" class="form-control imageUpload" name="bannerImage">
                        <?php
                        if(isset($_SESSION['errors']['banner_img_error'])){
                            ?>
                            <span style="color:red"><?=$_SESSION['errors']['banner_img_error']?></span>
                            <?php
                        }
                        ?>
                        <br>
                        <img src="" class="display" alt="" width="100%" >
                    </div>
                    <div class="col-lg-8">
                    <input type="text" class="form-control" placeholder="Title" name="title">
                <textarea name="description" id="" cols="30" rows="10" class="form-control my-2" placeholder="Description"></textarea>
                <input name="cta" type="text" class="form-control my-2" placeholder="Call to action" >
                <input name="cta_url" type="text" class="form-control my-2" placeholder="Call to action URL" >
                <input name="video_url" type="text" class="form-control my-2" placeholder="Intro video URL" >
                    </div>
                </div>
                <button class="btn-primary btn w-100">submit</button> > 
            </form>

        </div>
    </div>

</main>

<?php
include './inc/backendfooter.php';
unset($_SESSION['errors']);
?>
