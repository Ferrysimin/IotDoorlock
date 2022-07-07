<?php
deleteEntry();
?>
<div class="row mt-3">
    <div class="col-12 col-lg-4 col-xl-4">
        <div class="card bubble gradient-rainbow rounded-0">
            <div class="card-body card-block">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="mb-2 text-white">Total</p>
                        <h3 class="mb-0 text-white"><?php echo jumlah_row('tb_log','!','!')?></h3>
                        <h4 class="extra-small-font mt-2 mb-0 text-white">VISITORS</h4>
                    </div>
                    <div class="position-relative"><i class="zmdi zmdi-directions-run fa-5x text-white"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 col-xl-4">
        <div class="card bubble gradient-shifter rounded-0">
            <div class="card-body card-block">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="mb-2 text-white">Total</p>
                        <h3 class="mb-0 text-white"><?php echo jumlah_row('tb_user','!','!')?></h3>
                        <h4 class="extra-small-font mt-2 mb-0 text-white">USER</h4>
                    </div>
                    <div class="position-relative"><i class="zmdi zmdi-accounts fa-5x text-white"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 col-xl-4">
        <div class="card bubble gradient-meridian rounded-0">
            <div class="card-body card-block">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="mb-2 text-white">Total</p>
                        <h3 class="mb-0 text-white"><?php echo jumlah_row('tb_admin','!','!')?></h3>
                        <h4 class="extra-small-font mt-2 mb-0 text-white">Admin</h4>
                    </div>
                    <div class="position-relative"><i class="zmdi zmdi-globe-lock fa-5x text-white"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Row-->
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron gradient-violet">
            <h1 class="display-4" style="color : white;">Welcome</h1>
            <p class="lead" style="color : white;">Website Security Level System Door Lock Laboraturium Komputer MTs N 3 Tegal
.</p>
            <hr class="my-4">
            <p class="lead">
                
            </p>
        </div>
    </div>
</div>
<!--End Row-->

<!--End Row-->

<!--End Dashboard Content-->
<!--start overlay-->