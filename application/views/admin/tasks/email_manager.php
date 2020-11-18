<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Email Manager</h1>
    <p class="mb-4">Email Manager is a tool that is used to manage customer emails, please visit the <a target="_blank" href="https://simpleketosystem.com/guide/admin-users">SimpleKetoSystem documentation</a>.</p>

    <!-- Datatable -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EMAIL Manager <a href="<?=base_url()?>admin/tasks/email_manager/add"><button class="btn btn-primary">+</button></a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable_email_manage" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>                            
                            <th>Create Time</th>
                            <th>Send Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>                            
                            <th>Create Time</th>
                            <th>Send Time</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($emails as $v) { ?>
                            <tr>
                                <td><?= $v->id ?></td>
                                <td><?= $v->title ?></td>
                                <td><?= substr(strip_tags($v->content), 0, 30); ?></td>
                                <td><?= $v->create_time ?></td>
                                <td><?= $v->send_time ?></td>
                                <td>
                                    <form method="POST" action="" style="display:inline;">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $v->id ?>">
                                        <input type="submit" class="btn btn-primary" value="Delete">
                                    </form>
                                    <a href="<?= base_url() ?>admin/tasks/email_manager/edit/<?= $v->id ?>">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
