<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">FAQ Comment Edit</h1>
    <p class="mb-4">FAQ Comment Edit is a tool that is used to retrieve Meal Plan page by Email address, please visit the <a target="_blank" href="https://simpleketosystem.com/guide/admin-users">SimpleKetoSystem documentation</a>.</p>

    <!-- Datatable -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">FAQ COMMENT MANAGE</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable_faq_comment" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>                            
                            <th>Create Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th>Create Time</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>                        
                        <?php // echo json_encode($comments); ?>
                        <?php foreach ($comments as $v) { ?>
                            <tr class="<?php if(!$v->approved) echo 'bg-warning'; ?>">
                                <td><?= $v->id ?></td>
                                <td><?= $v->name ?></td>
                                <td><?= $v->email ?></td>
                                <td><?= $v->comment ?></td>
                                <td><?= $v->create_time ?></td>
                                <td>
                                    <form method="POST" action="" style="display:inline;">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $v->id ?>">
                                        <input type="submit" class="btn btn-primary" value="Delete">
                                    </form>
                                    <a href="<?= base_url() ?>admin/tasks/faq_comment/edit/<?= $v->id ?>">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="<?= base_url() ?>admin/tasks/faq_comment/add/<?= $v->id ?>">
                                        <button class="btn btn-primary">Reply</button>
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
