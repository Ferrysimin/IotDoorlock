<?php
if (isset($_GET['uid']) && isset($_GET['username'])) {
    deleteEntry();
    $alert = false;
} 
if (isset($_GET['uid']) && isset($_GET['username']) && isset($_GET['success-insert']) && isset($_GET['error'])) {
    $alert = true;
} 
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">User Access</div>
            <div class="card-body">

                <?php
                if ($alert == true) {
                ?>
                    <!-- Alert -->
                    <div class="alert alert-outline-success alert-dismissible mb-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <div class="alert-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="alert-message">
                            <span><strong>User Access Updated</strong> successfully adding <?php echo $_GET['success-insert']; ?> data and error adding data is <?php echo $_GET['error']; ?></span>
                        </div>
                    </div>
                    <!--  end Alert -->
                <?php
                }
                ?>
                <hr>
                <form action="konfig/user_access.php" method="POST">
                    <div class="form-group">
                        <label for="input-1">UID</label>
                        <input type="text" readonly class="form-control" id="input-1" name="uid" value="<?php echo $_GET['uid']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="input-2">Username</label>
                        <input type="text" readonly class="form-control" id="input-2" name="name" value="<?php echo $_GET['username']; ?>">
                    </div>
                    <div class="form-group" style="height : 200px;" >
                        <label for="input-4">Select Access</label>
                        <select class="form-control form-group multiple-select" multiple="multiple" name="access[]" required>

                            <?php
                            $userAccess = json_decode(listAccess_user($_GET['uid']), true);
                            $trueAccess = $userAccess['access'];
                            $falseAccess = $userAccess['not_access'];
                            if (!empty($trueAccess)) {
                                foreach ($trueAccess as $contentTrue) {
                            ?>
                                    <option selected value="<?php echo $contentTrue['token']; ?>"> <?php echo $contentTrue['name']; ?></option>

                                <?php
                                }
                            }
                            if (!empty($falseAccess)) {
                                foreach ($falseAccess as $contentFalse) {
                                ?>
                                    <option value="<?php echo $contentFalse['token']; ?>"><?php echo $contentFalse['name']; ?></option>
                            <?php
                                }
                            }

                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> Save Settings</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div><!-- End Row-->
<div class="overlay toggle-menu"></div>