<?php
deleteEntry();
if (isset($_POST['dateFilter']) && isset($_POST['access'])) {
    $datetime = mysqli_real_escape_string($dbconnect, $_POST['dateFilter']) . '%';
    $access_token = mysqli_real_escape_string($dbconnect, $_POST['access']);
    $data = getLog_filter(0, $datetime, $access_token);
} else {
    $data = getLog(0);
}
if (!empty($data)) {
    $data = json_decode($data, true);
    $data = $data['data'];
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Accepted</div>
            <div class="card-body">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary waves-effect waves-light m-1 float-right" data-toggle="modal" data-target="#myModal"> <i class="zmdi zmdi-filter-list"></i> <span>Filter</span> </button>
                </div>
                <div class="table-responsive pt-2">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>UID</th>
                                <th>Username</th>
                                <th>Access</th>
                                <th>Date Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data as $tablevalue) {
                                    echo "<tr>";
                                    echo "<td>" . $tablevalue['uid'] . "</td>";
                                    echo "<td>" . $tablevalue['username'] . "</td>";
                                    echo "<td>" . convert_tokenToNameAccess($tablevalue['access']) . "</td>";
                                    echo "<td>" . $tablevalue['datetime'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"><i class=" mdi mdi-filter"></i> Filter Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <h6>Searching Date</h6>
                        <input required class="form-control mb-3" type="date" name="dateFilter">
                        <h6>Filter Access</h6>
                        <select class="form-control" id="basic-select" name="access">
                            <option value="all">- All Access -</option>
                            <?php
                            $list_access =  getMCU_list();
                            if (!empty($list_access)) {
                                $list_access = json_decode($list_access, true);
                                $list_access = $list_access['data'];
                                foreach ($list_access as $controller) {
                            ?>
                                    <option value="<?php echo $controller['token'];?>"><?php echo $controller['name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Search</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div><!-- End Row-->
<div class="overlay toggle-menu"></div>