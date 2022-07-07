<?php
$data = json_decode(getMCU_list(), true);
$data = $data['data'];
?>

<div class="row">
    <div class="col-md-12 mb-2 pb-2 pt-2">
        <button type="button" class="btn btn-primary waves-effect waves-light m-1" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"></i> <span>Add Controller</span> </button>
    </div>
</div>

<div class="row">
    <?php
    if (!empty($data)) {
        foreach ($data as $content) {
    ?>
            <div class="col-lg-4">
                <div class="pricing-table">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="price-title"></div>
                            <h2 class="price" style="line-height:1;"><small class="currency"><?php echo $content['name']; ?></small></h2>
                            <ul class="list-group list-group-flush pt-4">
                                <li class="list-group-item"><i class="zmdi zmdi-layers"></i> <?php echo $content['type']; ?></li>
                                <li class="list-group-item"><i class="icon-clock icons"></i> <?php echo $content['delay']; ?></li>
                                <li class="list-group-item"><i class="icon-lock icons"></i> <?php echo $content['keypad']; ?></li>
                                <li class="list-group-item mb-3"><i class="icon-feed icons"></i> <?php echo $content['token']; ?></li>

                                <a href="" class="btn btn-primary my-3 btn-round" data-toggle="modal" data-target="#viewMCU<?php echo $content['token']; ?>">Edit</a>
                                <a href="index.php?page=sketch&name=<?php echo $content['name']; ?>&token=<?php echo $content['token']; ?>" class=""></a>
                                <button class="btn btn-warning my-3 btn-round"  onclick="deleteController('<?php echo $content['token']; ?>')">Delete Controller</button>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>

            <!-- modal -->
            <div id="viewMCU<?php echo $content['token']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel"><i class=" mdi mdi-filter"></i> Edit Controller</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form method="POST" action="./konfig/settingsMCU.php">
                            <div class="modal-body">
                                <h6>Controller Name</h6>
                                <input required class="form-control mb-3" type="text" name="name-edit" placeholder="Bad room Door (20 Character Only)" maxlength="20" value="<?php echo $content['name']; ?>">
                                <h6>Controller Type</h6>
                                <select class="form-control mb-3" name="type-edit" id="exampleFormControlSelect1">
                                    <?php
                                    if ($content['type'] == "ESP32") {
                                        echo '<option selected="selected">' . $content['type'] . '</option>';
                                        echo '<option>NodeMCU</option>';
                                    } else {
                                        echo '<option selected="selected">' . $content['type'] . '</option>';
                                        echo '<option>ESP32</option>';
                                    }
                                    ?>
                                </select>
                                <h6>Keypad Password</h6>
                                <input required class="form-control mb-3" type="text" name="keypad-edit" pattern="\d*" maxlength="5" placeholder="Max 5 Number Only" value="<?php echo $content['keypad']; ?>">
                                <h6>Close Door Delay (ms)</h6>
                                <input required class="form-control mb-3" type="number" name="delay-edit" placeholder="10000ms = 10 Second" value="<?php echo $content['delay']; ?>">
                                <h6>Request Key</h6>
                                <input required readonly class="form-control mb-3" type="text" name="token-edit" value="<?php echo $content['token']; ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div>
            </div>
            <!-- /.modal-dialog -->

    <?php
        }
    }
    ?>
</div>

<!-- modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><i class=" mdi mdi-filter"></i> New Controller</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="POST" action="./konfig/settingsMCU.php">
                <div class="modal-body">
                    <h6>Controller Name</h6>
                    <input required class="form-control mb-3" type="text" name="name-register" placeholder="Bedroom Door (20 Character Only)" maxlength="20">
                    <h6>Controller Type</h6>
                    <select class="form-control mb-3" name="type-register" id="exampleFormControlSelect1">
                        <option>NodeMCU</option>
                        <option>ESP32</option>
                    </select>
                    <h6>Keypad Password</h6>
                    <input required class="form-control mb-3" type="text" name="keypad-register" pattern="\d*" maxlength="5" placeholder="Max 5 Number Only">
                    <h6>Close Door Delay (ms)</h6>
                    <input required class="form-control mb-3" type="number" name="delay-register" placeholder="10000ms = 10 Second">
                    <h6>Request Key (Automatic Value)</h6>
                    <input required readonly class="form-control mb-3" type="text" name="token-register" value="<?php echo uniqid(); ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- /.modal-dialog -->
<div class="overlay toggle-menu"></div>