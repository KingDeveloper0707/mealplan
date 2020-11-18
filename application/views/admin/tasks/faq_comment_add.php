<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add FAQ Comment</h1>
    <p class="mb-4">FAQ Comment is a setting page that is used to create, edit, delete FAQ Comments. For more information about FAQ Comment, please visit the <a target="_blank" href="https://simpleketosystem.com/guide/admin-users">SimpleKetoSystem documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Reply a FAQ Comment</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <p>Replying For:</p>
                <hr>                
                <div class="form-group row">
                    <p class="col-2">Name</p>
                    <p class="col-10"><?= $result->name ?></p>
                </div>
                <div class="form-group row">
                    <p class="col-2">Email</p>
                    <p class="col-10"><?= $result->email ?></p>
                </div>
                <div class="form-group row">
                    <p class="col-2">Comment</p>
                    <p class="col-10"><?= $result->comment ?></p>
                </div>                
                <hr>                
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="parent_id" value="<?= $result->id ?>">

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="" placeholder="" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input class="form-control" type="email" value="" placeholder="" name="email">
                    </div>
                </div>                
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Comment</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="" placeholder="" name="comment">
                    </div>
                </div>
                <div class="form-check mb-5">
                    <input type="hidden" name="approved" value="0">
                    <input class="form-check-input" type="checkbox" checked name="approved" id="approved" value="1">
                    <label for="approved" class="form-check-label">Approved</label>
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