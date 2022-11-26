<?php
include 'head.php';
?>

<!-- <div class="col-md-10"> -->
<div class="col-md-12 col-sm-12 col-xs-12 form-horizontal" style="height: -webkit-fill-available;">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <center style="padding-top:100px; padding-bottom:150px;">
                    <div class="col-md-8 col-sm-8 col-xs-8 text-left">
                        <div class="">
                            <h4 style="padding-top:50px;"> <b>
                                    <?php echo "Hi, ", $_SESSION['uname'] ?>
                            </h4>
                            <h3>Selamat Datang di Website Asset Admin</h3>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>