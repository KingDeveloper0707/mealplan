<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$result = $result[0];
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Admin User Group</h1>
    <p class="mb-4">Admin Users is a setting page that is used to create, edit, delete administrators. For more information about Admin Users, please visit the <a target="_blank" href="https://simpleketosystem.com/guide/admin-users">SimpleKetoSystem documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin User Group</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="<?= $result["id"] ?>">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Group Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?= $result["name"] ?>" placeholder="" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <!--                    <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="limitation" id="limitation" <?php echo $result['limitation'] == "1" ? "checked" : "" ?>>
                                                <label class="form-check-label" for="limitation">limitation</label>
                                            </div>
                                        </div>-->
                    <div class="col-12">
                        <div class="form-radio pl-5">
                            <div>
                                <input class="form-check-input" type="radio" name="limitation" id="limitation-admin" value="0" <?php echo $result['limitation'] == "0" ? "checked" : "" ?>>
                                <label class="form-check-label" for="limitation-admin">No Limitation for Administrator</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="limitation" id="limitation-cs" value="1" <?php echo $result['limitation'] == "1" ? "checked" : "" ?>>
                                <label class="form-check-label" for="limitation-cs">Limitation for Customer Support</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="limitation" id="limitation-marketing" value="2" <?php echo $result['limitation'] == "2" ? "checked" : "" ?>>
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