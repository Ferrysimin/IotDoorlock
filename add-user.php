<?php
setState();
?>
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <div class="card-title">Add User</div>
                <hr>
                <form action="./konfig/request_adduser.php" method="POST">
                    <div class="form-group row">
                        <label for="input-21" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="input-21" name="username" placeholder="Enter Your Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-22" class="col-sm-2 col-form-label">UID</label>
                        <div class="col-sm-10">
                            <input required readonly type="text" class="form-control" id="UID" name="uid" placeholder="Automatic Value">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary px-5 float-right">Register</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>
</div>
<div class="overlay toggle-menu"></div>



<script>
    function addUser() {
        $.ajax({
            type: "GET",
            url: "konfig/request_adduser.php",
            cache: false,
            success: function(response) {
                $("#UID").val(response)
            }
        });

    }
    setInterval(addUser, 2000);
</script>