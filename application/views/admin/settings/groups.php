<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Admin Groups</h1>
    <p class="mb-4">Admin Groups is a setting page that is used to create, edit, delete administrator groups. For more information about Admin Groups, please visit the <a target="_blank" href="https://simpleketosystem.com/guide/admin-users">SimpleKetoSystem documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Admin Groups <a href="<?= base_url() ?>admin/settings/groups/add"><button class="btn btn-primary">+</button></a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th> 
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th> 
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($groups as $v) { ?>
                            <tr>
                                <td><?= $v["id"] ?></td>
                                <td><?= $v["name"] ?></td> 
                                <td><form method="POST" action="" style="display:inline;"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $v["id"] ?>"><input type="submit" class="btn btn-primary" value="Delete"></form> <a href="<?= base_url() ?>admin/settings/groups/edit/<?= $v["id"] ?>"><button class="btn btn-primary">Edit</button></a> </td>
                            </tr>
                        <?php } ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->