<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Survey</h1>
    <p class="mb-4">Survey is a tool that is used to enable and disable Meal Plan survey, please visit the <a target="_blank" href="https://simpleketosystem.com/guide/admin-users">SimpleKetoSystem documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Enable Survey</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="<?= base_url() ?>admin/tasks/survey" method="POST">
                    <div class="form-row">                    
                        <div class="form-group col-md-8">
                            <div class="form-check">
                                <input type="hidden" name="survey_enable" value="0">
                                <input class="form-check-input" type="checkbox" name="survey_enable" id="survey-enable" value="1" <?= $survey_enabled ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="survey-enable">Enable survey</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <!--<a href="#" class="btn btn-primary offer-badge btn-continue submit" target="_self">Submit >></a>-->
                            <input type="submit" class="btn btn-primary offer-badge btn-continue submit" value="Submit >>">
                        </div>                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>