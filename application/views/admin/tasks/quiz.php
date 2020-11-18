<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Single Page Quiz</h1>
    <p class="mb-4">Single Page Quiz is a quiz page that is used to create new answers for SimpleKetoSystem Quiz, please visit the <a target="_blank" href="https://simpleketosystem.com/guide/admin-users">SimpleKetoSystem documentation</a>.</p>

    <form id="mainform">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">1. What Is Your Gender?</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-row" id="gender">
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender_female" value="0">
                                <label class="form-check-label" for="gender_female">Female</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender_male" value="1" checked>
                                <label class="form-check-label" for="gender_male">Male</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">2. How much time can you spend preparing a meal?</h6>
            </div>
            <div class="card-body">                
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_time" id="time_0" value="0">
                                <label class="form-check-label" for="time_0">Up to 30 Mins</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_time" id="time_1" value="1">
                                <label class="form-check-label" for="time_1">Over 30 Mins</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_time" id="time_2" value="2">
                                <label class="form-check-label" for="time_2">It Varies</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_time" id="time_3" value="3">
                                <label class="form-check-label" for="time_3">20 Mins or Less</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">3. Which meats would you like to be included in your meal plan?</h6>
            </div>
            <div class="card-body">                
                <div class="container">
                    <div class="form-row q-meat">
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="chicken" id="chicken" value="1">
                                <label class="form-check-label" for="chicken">Chicken</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="bacon" id="bacon" value="1">
                                <label class="form-check-label" for="bacon">Bacon</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pork" id="pork" value="1">
                                <label class="form-check-label" for="pork">Pork</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fish" id="fish" value="1">
                                <label class="form-check-label" for="fish">Fish</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="beef" id="beef" value="1">
                                <label class="form-check-label" for="beef">Beef</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="no_meat" id="no_meat" value="1">
                                <label class="form-check-label" for="no_meat">No Meat</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">4. Which vegetables would you like to be included in your meal plan?</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="broccoli" id="broccoli" value="1">
                                <label class="form-check-label" for="broccoli">Broccoli</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="mushroom" id="mushroom" value="1">
                                <label class="form-check-label" for="mushroom">Mushrooms</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="zuccini" id="zuccini" value="1">
                                <label class="form-check-label" for="zuccini">Zuccini</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cauliflower" id="cauliflower" value="1">
                                <label class="form-check-label" for="cauliflower">Cauliflower</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="asparagus" id="asparagus" value="1">
                                <label class="form-check-label" for="asparagus">Asparagus</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="avocado" id="avocado" value="1">
                                <label class="form-check-label" for="avocado">Avocado</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">5. Would you like to AVOID any of the following?</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="egg" id="egg" value="1">
                                <label class="form-check-label" for="egg">Eggs</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nut" id="nut" value="1">
                                <label class="form-check-label" for="nut">Nuts</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cheese" id="cheese" value="1">
                                <label class="form-check-label" for="cheese">Cheese</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="butter" id="butter" value="1">
                                <label class="form-check-label" for="butter">Butter</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="coconut" id="coconut" value="1">
                                <label class="form-check-label" for="coconut">Coconut</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="brussel_sprout" id="brussel_sprout" value="1">
                                <label class="form-check-label" for="brussel_sprout">Brussel Sprouts</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">6. What's your level of daily activity?</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_activity" id="q_act_0" value="0">
                                <label class="form-check-label" for="q_act_0">INACTIVE</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_activity" id="q_act_1" value="1">
                                <label class="form-check-label" for="q_act_1">LIGHT</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_activity" id="q_act_2" value="2">
                                <label class="form-check-label" for="q_act_2">MODERATE</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_activity" id="q_act_3" value="3">
                                <label class="form-check-label" for="q_act_3">HEAVY</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">7. Which time of the day do you feel most tired?</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_tired" id="q_tired_0" value="0">
                                <label class="form-check-label" for="q_tired_0">GOOD ENERGY ALL DAY</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_tired" id="q_tired_1" value="1">
                                <label class="form-check-label" for="q_tired_1">AFTER DINNER</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_tired" id="q_tired_2" value="2">
                                <label class="form-check-label" for="q_tired_2">EARLY MORNING</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_tired" id="q_tired_3" value="3">
                                <label class="form-check-label" for="q_tired_3">AFTER LUNCH</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">8. Experienced any of the following changes recently?</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-row q-changes">
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_recent_changes" id="q_changes_0" value="0">
                                <label class="form-check-label" for="q_changes_0">
                                    <span class="male-option">Physical injury</span>
                                    <span class="female-option">Childbirth</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_recent_changes" id="q_changes_1" value="1">
                                <label class="form-check-label" for="q_changes_1">Major gain in weight(25lbs or more)</label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_recent_changes" id="q_changes_2" value="2">
                                <label class="form-check-label" for="q_changes_2">Major loss in weight (25 lbs or more)</label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_recent_changes" id="q_changes_3" value="3">
                                <label class="form-check-label" for="q_changes_3">
                                    <span class="male-option">Andropause (low testosterone)</span>
                                    <span class="female-option">Menopause</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q_changes_none" id="q_changes_none" value="4">
                                <label class="form-check-label" for="q_changes_none">
                                    None of the above
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">9. What are your goals for this meal plan?</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="goal_0" id="q_goals_0" value="1">
                                <label class="form-check-label" for="q_goals_0">MORE ENERGY</label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="goal_1" id="q_goals_1" value="1">
                                <label class="form-check-label" for="q_goals_1">BETTER SLEEP</label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="goal_2" id="q_goals_2" value="1">
                                <label class="form-check-label" for="q_goals_2">BECOME LEAN & TONED</label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="goal_3" id="q_goals_3" value="1">
                                <label class="form-check-label" for="q_goals_3">INCREASE STRENGTH</label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="goal_4" id="q_goals_4" value="1">
                                <label class="form-check-label" for="q_goals_4">IMPROVE DIGESTION</label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="goal_5" id="q_goals_5" value="1">
                                <label class="form-check-label" for="q_goals_5">IMPROVE METABOLISM</label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="goal_6" id="q_goals_6" value="1">
                                <label class="form-check-label" for="q_goals_6">BURN FAT FOR ENERGY</label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="goal_7" id="q_goals_7" value="1">
                                <label class="form-check-label" for="q_goals_7">HELP IMPROVE CHRONIC CONDITIONS</label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="goal_8" id="q_goals_8" value="1">
                                <label class="form-check-label" for="q_goals_8">GET INTO KETOSIS QUICKLY</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">10. Measurements</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="q-measure">
                        <div class="form-row">
                            <div class="form-group col-6 col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="input_term" id="input-term-1" value="metric">
                                    <label class="form-check-label" for="input-term-1">Metric</label>
                                </div>
                            </div>
                            <div class="form-group col-6 col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="input_term" id="input-term-2" value="imperial" checked >
                                    <label class="form-check-label" for="input-term-2">U.S.</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row form-imperial">
                            <div class="form-group col-md-3">
                                <label for="height_ft">Height (feet)</label>
                                <input type="number" class="form-control" id="height_ft" placeholder="" name="height_ft">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="height_in">(inches)</label>
                                <input type="number" class="form-control" id="height_in" placeholder="" name="height_in">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="age_imperial">AGE (years)</label>
                                <input type="number" class="form-control" id="age_imperial" placeholder="" name="age_imperial">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="curr_weight_po">Current Weight (pounds)</label>
                                <input type="number" class="form-control" id="curr_weight_po" placeholder="" name="curr_weight_po">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="goal_weight_po">GOAL WEIGHT (pounds)</label>
                                <input type="number" class="form-control" id="goal_weight_po" placeholder="" name="goal_weight_po">
                            </div>
                        </div>
                        <div class="form-row form-metric" style="display: none;">
                            <div class="form-group col-md-6">
                                <label for="height_cm">Height(cm)</label>
                                <input type="number" class="form-control" id="height_cm" placeholder="" name="height_cm">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="age_metric">AGE (years)</label>
                                <input type="number" class="form-control" id="age_metric" placeholder="" name="age_metric">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="curr_weight_kg">Current Weight (kg)</label>
                                <input type="number" class="form-control" id="curr_weight_kg" placeholder="" name="curr_weight_kg">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="goal_weight_kg">GOAL WEIGHT (kg)</label>
                                <input type="number" class="form-control" id="goal_weight_kg" placeholder="" name="goal_weight_kg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">11. Email</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>*** If you don't input email, test@test.com will be used as test email. ***</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="test@test.com" >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">12. What is number of weeks?</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-6 col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_onetime" id="is_onetime" value="1" checked>
                                <label class="form-check-label" for="is_onetime">One-time Purchase</label>
                            </div>
                        </div>
                        <div class="form-group col-6 col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_onetime" id="is_subscription" value="0">
                                <label class="form-check-label" for="is_subscription">Subscription Purchase</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row" id="weeknum-onetime">
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="weeknum" id="weeknum_4_onetime" value="4" checked>
                                <label class="form-check-label" for="weeknum_4_onetime">28 Days (4 weeks)</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="weeknum" id="weeknum_16_onetime" value="16" checked>
                                <label class="form-check-label" for="weeknum_16_onetime">3 Months (16 weeks)</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="weeknum" id="weeknum_56_onetime" value="56">
                                <label class="form-check-label" for="weeknum_56_onetime">12 Months (56 weeks)</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" id="weeknum-subscription" style="display: none;">
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="weeknum" id="weeknum_2_subscription" value="2" checked>
                                <label class="form-check-label" for="weeknum_2_subscription">14 Days (2 weeks - Free Trial)</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="weeknum" id="weeknum_4_subscription" value="4" checked>
                                <label class="form-check-label" for="weeknum_4_subscription">28 Days (4 weeks)</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="weeknum" id="weeknum_16_subscription" value="12" checked>
                                <label class="form-check-label" for="weeknum_16_subscription">3 Months (12 weeks)</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="weeknum" id="weeknum_56_subscription" value="52">
                                <label class="form-check-label" for="weeknum_56_subscription">12 Months (52 weeks)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary block w-50 p-3 btn-submit">SUBMIT</button>
        </div>

    </form>
</div>
<!-- /.container-fluid -->