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
            <div class="card-header">User Block</div>
            <div class="card-body">

                <div class="table-responsive pt-3">
                    <table id="default-datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>UID</th>
                                <th>Username</th>
                                <th>Status</th>
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
                                        <td><?php
                                            if ($tablevalue['block'] == 0) {
                                                echo '<span class="badge badge-info m-1">Active</span>';
                                            } else {
                                                echo '<span class="badge badge-warning m-1">Blocked</span>';
                                            };
                                            ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($tablevalue['block'] == 0) {

                                            ?>
                                                <a href="konfig/block_user.php?uid=<?php echo $tablevalue['uid']; ?>&param=block" class="btn btn-warning btn-sm btn-round waves-effect waves-light m-1">Block User</a>
                                                <a href="index.php?page=access&uid=<?php echo $tablevalue['uid']; ?>&username=<?php echo $tablevalue['username']; ?>" class="btn btn-primary btn-sm btn-round waves-effect waves-light m-1">User Access</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="konfig/block_user.php?uid=<?php echo $tablevalue['uid']; ?>&param=active" class="btn btn-info btn-sm btn-round waves-effect waves-light m-1">Unblock User</a>
                                                <button class="btn btn-primary btn-sm btn-round waves-effect waves-light m-1" id="alert-error">User Access</button>

                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
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