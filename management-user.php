<?php
deleteEntry();
$data = getTb_user();
if (!empty($data)) {
    $data = json_decode($data, true);
    $data = $data['data'];
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Management User</div>
            <div class="card-body">
                <div class="col-md-12">
                    <a href="index.php?page=add-user" class="btn btn-primary waves-effect waves-light m-1 float-right"><i class="zmdi zmdi-plus"></i> <span>Add User</span> </a>
                </div>
                <div class="table-responsive pt-3">
                    <table id="default-datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>UID</th>
                                <th>Username</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (!empty($data)) {
                                foreach ($data as $tablevalue) {
                            ?>
                                    <tr>
                                        <td><?php echo $tablevalue['uid']; ?></td>
                                        <td><?php echo $tablevalue['username']; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-primary btn-sm waves-effect waves-light" data-toggle="modal" data-target="#myModal<?php echo $tablevalue['uid']; ?>"> <i class="fa fa-edit"></i> </button>
                                                <a href="./konfig/delete.php?parameter=0&delete=<?php echo $tablevalue['uid']; ?>" class="btn btn-outline-danger btn-sm waves-effect waves-light"> <i class="fa fa fa-trash-o"></i> </a>
                                            </div>
                                        </td>
                                    </tr>


                                    <div id="myModal<?php echo $tablevalue['uid']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel"><i class=" mdi mdi-filter"></i> Edit User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form method="POST" action="konfig/edit.php">
                                                    <div class="modal-body">
                                                        <input required readonly class="form-control mb-3" type="hidden" name="parameter" value="user">
                                                        <input required readonly class="form-control mb-3" type="hidden" name="index" value="<?php echo $tablevalue['uid']; ?>">
                                                        <h6>UID</h6>
                                                        <input required class="form-control mb-3" type="text" name="valueA" value="<?php echo $tablevalue['uid']; ?>">
                                                        <h6>Username</h6>
                                                        <input required class="form-control mb-3" type="text" name="valueB" value="<?php echo $tablevalue['username']; ?>">
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
</div><!-- End Row-->
<div class="overlay toggle-menu"></div>