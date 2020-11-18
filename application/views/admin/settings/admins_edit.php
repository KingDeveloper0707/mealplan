<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Admin User</h1>
    <p class="mb-4">Admin Users is a setting page that is used to create, edit, delete administrators. For more information about Admin Users, please visit the <a target="_blank" href="https://simpleketosystem.com/guide/admin-users">SimpleKetoSystem documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin User</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" name="action" value="edit">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Username</label>
                    <div class="col-10">
                        <input class="form-control" type="text" readonly value="<?= $result->username ?>" placeholder="" name="username">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Password (leave blank to keep)</label>
                    <div class="col-10">
                        <input class="form-control" type="password" value="" placeholder="" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Password Verify (leave blank to keep)</label>
                    <div class="col-10">
                        <input class="form-control" type="password" value="" placeholder="" name="password2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input class="form-control" type="email" value="<?= $result->email ?>" placeholder="" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?= $result->name ?>" placeholder="" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Address</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?= $result->address ?>" placeholder="" name="address">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Address 2 (Suite,Apt)</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?= $result->address2 ?>" placeholder="" name="address2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">City</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?= $result->city ?>" placeholder="" name="city">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">State</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?= $result->state ?>" placeholder="" name="state">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Zip</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?= $result->zip ?>" placeholder="" name="zip">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Admin Group</label>
                    <div class="col-10">
                        <select class="form-control" name="admin_group" required>
                            <?php
                            foreach ($admin_groups as $v) {
                                if ($v["id"] == $result->admin_group) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<option value='" . $v["id"] . "' " . $selected . ">" . $v["name"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div> 
                <div class="form-group row"> 
                    <div class="col-10">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </div> 


            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->