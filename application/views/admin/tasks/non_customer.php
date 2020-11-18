<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Download Non-Buyer Leads</h1>
    <p class="mb-4">This is a page that is used to download non-purchased customers who has quizzed between 14 days ago and 7 days ago from this week's Monday as csv format, please visit the <a target="_blank" href="https://simpleketosystem.com/guide/admin-users">SimpleKetoSystem documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Non-Buyer Leads</h6>
        </div>
        <div class="card-body">            
            <div class="form-row">                    
                <div class="form-group col-md-12">
                    <a href="<?php echo base_url() . "admin/tasks/download_non_customer" ?>" class="btn btn-primary submit" target="_self">Download <i class='fas fa-download'></i></a>
                </div>
            </div>
        </div>
    </div>
</div>