<?php
deleteEntry();
$data = getTb_admin();
if (!empty($data)) {
    $data = json_decode($data, true);
    $data = $data['data'];
}

?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Management Admin</div>
            <div class="card-body">

                <div class="col-md-12">
                    <button type="button" class="btn btn-primary waves-effect waves-light m-1 float-right" data-toggle="modal" data-target="#myModal"><i class="zmdi zmdi-plus"></i> <span>Add Admin</span> </button>
                </div>
                <div class="table-responsive pt-3">
                    <table id="default-datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data as $tablevalue) {
                            ?>
                                    <tr>
                                        <td><?php echo $tablevalue['username']; ?></td>
                                        <td><?php echo $tablevalue['password']; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-primary btn-sm waves-effect waves-light" data-toggle="modal" data-target="#myModal<?php echo $tablevalue['username']; ?>"> <i class="fa fa-edit"></i> </button>
                                                <a href="./konfig/delete.php?parameter=1&delete=<?php echo $tablevalue['username']; ?>" class="btn btn-outline-danger btn-sm waves-effect waves-light"> <i class="fa fa fa-trash-o"></i> </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <div id="myModal<?php echo $tablevalue['username']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel"><i class=" mdi mdi-filter"></i> Edit Admin</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form method="POST" action="konfig/edit.php">
                                                    <div class="modal-body">
                                                        <input required readonly class="form-control mb-3" type="hidden" name="parameter" value="admin">
                                                        <input required readonly class="form-control mb-3" type="hidden" name="index" value="<?php echo $tablevalue['username']; ?>">
                                                        <h6>Username</h6>
                                                        <input required class="form-control mb-3" type="text" name="valueA" value="<?php echo $tablevalue['username']; ?>">
                                                        <h6>Password</h6>
                                                        <input required class="form-control mb-3" type="text" name="valueB" value="<?php echo $tablevalue['password']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"><i class=" mdi mdi-filter"></i> Add Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" action="konfig/request_addadmin.php">
                    <div class="modal-body">
                        <h6>Username</h6>
                        <input required class="form-control mb-3" type="text" name="username">
                        <h6>Password</h6>
                        <input required class="form-control mb-3" type="text" name="password">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div><!-- End Row-->
<div class="overlay toggle-menu"></div>