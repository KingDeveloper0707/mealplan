<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit an Email</h1>
    <p class="mb-4">This is a page that is used to Edit an existing email. For more information, please visit the <a target="_blank" href="https://simpleketosystem.com/guide/admin-users">SimpleKetoSystem documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit an Email</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= base_url() ?>admin/tasks/email_manager">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="<?= $result->id; ?>">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?= $result->title; ?>" placeholder="" name="title">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="input-datetime" class="col-2 col-form-label">Due Datetime</label>
                    <div class="col-10">                        
                        <input class="form-control" type="datetime-local" value="<?= date_create_from_format('Y-m-d H:i:s', $result->send_time)->format('Y-m-d\TH:i:s'); ?>" id="input-datetime" name="send_time">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ckeditor" class="col-2 col-form-label">Content</label>
                    <div class="col-10">
                        <textarea name="content" id="ckeditor">
                            <?= $result->content; ?>
                        </textarea>
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