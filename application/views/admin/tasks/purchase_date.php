<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Simulate Customers' Purchase Date with Email</h1>
    <p class="mb-4">Purchase Date Simulator is a tool that is used to change customer's purchase date by Email address, please visit the <a target="_blank" href="https://simpleketosystem.com/guide/admin-users">SimpleKetoSystem documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Purchase Date Simulator</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="form-group row">
                    <label for="input-email" class='col-2 col-form-label'>Email</label>
                    <div class='col-10'>
                        <input type="email" name="email" id="input-email" class="form-control email-inputs" placeholder="Enter test email address here..." />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input-datetime" class="col-2 col-form-label">Date and time</label>
                    <div class="col-10">
                        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="input-datetime">
                    </div>
                </div>
                <div class='form-group row'>
                    <div class='col-12'>
                        <a href="#" class="btn btn-primary offer-badge btn-continue submit" target="_self">Submit >></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>