<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add an Admin User Group</h1>
    <p class="mb-4">Admin Users is a setting page that is used to create, edit, delete administrators. For more information about Admin Users, please visit the <a target="_blank" href="https://simpleketosystem.com/guide/admin-users">SimpleKetoSystem documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add an Admin User Group</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= base_url() ?>admin/settings/groups">
                <input type="hidden" name="action" value="add">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Group Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="" placeholder="" name="name">
                    </div>
                </div>
                <div class="pl-1">Limitation</div>
                <div class="form-group row">
                    <!--div class="form-check">
                        <input class="form-check-input" type="checkbox" name="limitation" id="limitation" value="1">
                        <label class="form-check-label" for="limitation">Limitation</label>
                    </div-->
                    <div class="col-12">
                        <div class="form-radio pl-5">
                            <div>
                                <input class="form-check-input" type="radio" name="limitation" id="limitation-admin" value="0" checked>
                                <label class="form-check-label" for="limitation-admin">No Limitation for Administrator</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="limitation" id="limitation-cs" value="1">
                                <label class="form-check-label" for="limitation-cs">Limitation for Customer Support</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="limitation" id="limitation-marketing" value="2">
                                <label class="form-check-label" for="limitation-marketing">Limitation for Marketing Team</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group row"> 
                    <div class="col-10">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->