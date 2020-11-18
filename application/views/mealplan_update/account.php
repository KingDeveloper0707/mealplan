<div id="account-page">
    <div class='hometab-wrapper'>    
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                    <ul class="nav nav-tabs homeTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="currweek-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="true"><span>Setting</span></a>
                        </li>                    
                        <li class="nav-item">
                            <a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="false"><span>F.A.Q.</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container tabcontent-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="homeTabContent">
                    <div class="tab-pane fade show active" id="setting" role="tabpanel" aria-labelledby="setting-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="password-wrapper">
                                        <div class="heading-wrapper">
                                            <p class="h5 font-weight-bold mb-0">Change password</p>
                                            <p class="ml-auto mb-0">Last Update: May 20, 2020</p>
                                        </div>
                                        <form class="user" action="<?= base_url() ?>mealplan_update/signup" method="POST" id="form-register">
                                            <div class="form-group">
                                                <label for='input-password' class='h6 small'>New Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control form-control-user" id="input-password" name="password" placeholder="Password">
                                                    <i class="fa fa-eye-slash form-control-feedback" aria-hidden="true" onclick="toggle_password(this)"></i>
                                                </div>
                                                <div class="warning-wrapper">
                                                    <p class="warning warning-length mb-0 mt-1 h6 small"> Must contain at least 8 characters.</p>
                                                    <p class="warning warning-symbol-number small"> Must contain numbers or symbols.</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for='input-password-confirm' class='h6 small'>Confirm Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control form-control-user" id="input-password-confirm" name="password2" placeholder="Confirm Password">
                                                    <i class="fa fa-eye-slash form-control-feedback" aria-hidden="true" onclick="toggle_password(this)"></i>
                                                </div>
                                                <div class="warning-wrapper">
                                                    <p class="warning warning-match mt-1 small"> Match Password.</p>
                                                </div>
                                            </div>    
                                            <div class="form-group">
                                                <input class="btn btn-lg btn-primary btn-block btn-user" type="submit" value="Save" id="register-submit" disabled>
                                            </div>                                        
                                        </form>
                                    </div>
                                    <div class="membership-wrapper mt-5">
                                        <p class="h5 font-weight-bold">Membership</p>
                                        <p class="mb-0">My Current Plan: <span class="curr-membership">28-Day Meal Plan</p>
                                        <a href="" target="_blank" class="btn btn-danger w-100 py-2">Upgrade to premium $19/month</a>
                                    </div>
                                    <div class="unit-wrapper mt-5">
                                        <p class="h5 font-weight-bold">Units</p>
                                        <form id="form-input-term">
                                            <div class="form-row">
                                                <div class="form-check col-6 p-0">
                                                    <input class="form-check-input d-none" type="radio" name="input_term" id="input-term-1" value="imperial" <?= array_key_exists('input_term', $json_answers) && $json_answers['input_term'] == 'imperial' ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="input-term-1"><p class="mb-0">U.S.<br />( lbs, oz, in )</p></label>
                                                </div>
                                                <div class="form-check col-6 p-0">
                                                    <input class="form-check-input d-none" type="radio" name="input_term" id="input-term-2" value="metric" <?= array_key_exists('input_term', $json_answers) && $json_answers['input_term'] == 'metric' ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="input-term-2"><p class="mb-0">Metric<br />( kg, ml, cm )</p></label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="food-preference-wrapper">
                                        <p class="h5 font-weight-bold">
                                            <span>Food Preferences</span>
                                            <i class="fas fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Changes to your food preferences will be reflected in next week's meals."></i>
                                        </p>
                                        <form id="form-food-preference">
                                            <div class="card shadow mb-4 q-meat">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">Protein</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="container">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="chicken">Chicken</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="chicken" id="chicken" value="1" <?= array_key_exists('chicken', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="bacon">Bacon</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="bacon" id="bacon" value="1" <?= array_key_exists('bacon', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="pork">Pork</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="pork" id="pork" value="1" <?= array_key_exists('pork', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="fish">Fish / Seafood</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="fish" id="fish" value="1" <?= array_key_exists('fish', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="beef">Beef</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="beef" id="beef" value="1" <?= array_key_exists('beef', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="no_meat">No Meat</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="no_meat" id="no_meat" value="1" <?= array_key_exists('no_meat', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card shadow mb-4 q-vegetable">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">Veggies</h6>
                                                </div>
                                                <div class="card-body">                
                                                    <div class="container">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="broccoli">Broccoli</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="broccoli" id="broccoli" value="1" <?= array_key_exists('broccoli', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>                                                                    
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="mushroom">Mushroom</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="mushroom" id="mushroom" value="1" <?= array_key_exists('mushroom', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="zuccini">Zucchini</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="zuccini" id="zuccini" value="1" <?= array_key_exists('zuccini', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="cauliflower">Cauliflower</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="cauliflower" id="cauliflower" value="1" <?= array_key_exists('cauliflower', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="asparagus">Asparagus</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="asparagus" id="asparagus" value="1" <?= array_key_exists('asparagus', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="avocado">Avocado</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="avocado" id="avocado" value="1" <?= array_key_exists('avocado', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card shadow mb-4 q-product">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">Others</h6>
                                                </div>
                                                <div class="card-body">                
                                                    <div class="container">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="egg">Eggs</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="egg" id="egg" value="1" <?= array_key_exists('egg', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>                                                                    
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="nut">Nuts</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="nut" id="nut" value="1" <?= array_key_exists('nut', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="cheese">Cheese</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="cheese" id="cheese" value="1" <?= array_key_exists('cheese', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="butter">Butter</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="butter" id="butter" value="1" <?= array_key_exists('butter', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="coconut">Coconut</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="coconut" id="coconut" value="1" <?= array_key_exists('coconut', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="form-check d-flex">
                                                                    <label class="form-check-label font-weight-bold" for="brussel_sprout">Brussels Sprouts</label>
                                                                    <label class="form-check-label form-check-toggle ml-auto">
                                                                        <input class="form-check-input" type="checkbox" name="brussel_sprout" id="brussel_sprout" value="1" <?= array_key_exists('brussel_sprout', $json_answers) ? 'checked="checked"' : ''; ?>><span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                        <p>FAQ content</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>