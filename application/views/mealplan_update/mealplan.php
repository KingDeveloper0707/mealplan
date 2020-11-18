<?php
$weeknum = count($obj_mealplan) / 7 / 4;
if (!$curr_day) {
    $curr_week = null;
    $week_start_day = null;
    $curr_day_temp = $weeknum * 7;
    $curr_week_temp = $weeknum;
    $week_start_day_temp = ($curr_week_temp - 1) * 7 + 1;
} else {
    $curr_week = (int) (($curr_day - 1) / 7) + 1;
    $week_start_day = ($curr_week - 1) * 7 + 1;
    $curr_day_temp = $curr_day;
    $curr_week_temp = $curr_week;
    $week_start_day_temp = $week_start_day;
}

if ($diff_day_checkin == null) {
    $diff_day_checkin = $diff_day_checkout;
}
$checkin_left_days = ($week_start_day + 5 - $curr_day);

//if($diff_day_checkin >= 7) { // if 1 week away from last checkin, show last day of last week existed.
//    $curr_week = $weeknum;
//    $week_start_day = ($curr_week - 1) * 7 + 1;
//    $curr_day = $week_start_day + 6;
//}

echo "weeknum = " . $weeknum . "<br />";
echo "diff_day_checkout = " . $diff_day_checkout . "<br />";
echo "week_start_day = " . $week_start_day . "<br />";
echo "curr_day = " . $curr_day . "<br />";
echo "curr_week = " . $curr_week . "<br />";
echo "curr_day_temp = " . $curr_day_temp . "<br />";
echo "curr_week_temp = " . $curr_week_temp . "<br />";
echo "week_start_day_temp = " . $week_start_day_temp . "<br />";
//echo "diff_day_checkin = " . $diff_day_checkin . "<br />";
//echo "checkin_left_days = " . $checkin_left_days . "<br />";
?>
<div class='hometab-wrapper'>    
    <div class='container'>
        <div class='row'>
            <div class='col-12'>
                <ul class="nav nav-tabs homeTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="currweek-tab" data-toggle="tab" href="#currweek" role="tab" aria-controls="currweek" aria-selected="true"><span>Weekly Meal Plan</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="collection-tab" data-toggle="tab" href="#collection" role="tab" aria-controls="collection" aria-selected="false">
                            <span>My Collection</span>                            
                            <i class="fas fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="All of your previous meals is included in this section"></i>                            
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="favorite-tab" data-toggle="tab" href="#favorite" role="tab" aria-controls="favorite" aria-selected="false"><span>Favorites</span></a>
                    </li>
                    <div class="badge-wrapper">
                        <div class="badge verified">
                            <i class="fas fa-fw fa-check"></i>
                            <span>Verified User</span>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container tabcontent-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="homeTabContent">
                <div class="tab-pane fade show active" id="currweek" role="tabpanel" aria-labelledby="currweek-tab">
                    <div class="heading-wrapper">
                        <div>
                            <?php
                            if ($weeknum == 1) {
                                ?>
                                <p class='text-week-start proxima-nova-bold h4'>WEEK 1</p>
                            <?php } else { ?>
                                <p class="text-gray-600 font-weight-bold">Select Week</p>
                                <div class="weeks-container">
                                    <select id="week-select" onchange="weekChange(this.value)">
                                        <?php
                                        for ($i = 1; $i <= $weeknum; $i++) {
                                            $str_badged = ($i == $curr_week) ? 'data-badge selected' : '';
                                            echo '<option value="' . ($i - 1) . '"' . $str_badged . '>Week ' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <p class="backdrop-note d-none">&larr; Click Here To See Next Week Meal Plan</p>
                                </div>
                            <?php } ?>
                        </div>

                        <a href="#" class="btn btn-download"><i class="fas fa-fw fa-download"></i>Download Grocery List</a>
                    </div>
                    <div class="weekdays-wrapper">
                        <!--<ul class="nav nav-tabs mb-5" id="dayTab" role="tablist">-->
                        <div class="hometab-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs homeTab" role="tablist" id="weekdayTab">
                                            <?php
                                            for ($day = $week_start_day_temp; $day < $week_start_day_temp + 7; $day++) {
                                                ?>
                                                <li class="nav-item">
                                                    <a class="nav-link <?= $day == $curr_day_temp ? "active" : ""; ?>" id="day-<?= $day ?>-tab" data-toggle="tab" href="#day-<?= $day ?>" role="tab" aria-controls="day-<?= $day ?>" aria-selected="true"><span>Day <?= $day ?></span></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-content p-3" id="weekdayTabContent">
                            <?php
//                            if ($diff_day_checkin < 7)
                            for ($day = $week_start_day_temp; $day < $week_start_day_temp + 7; $day++) {
                                ?>
                                <div class="tab-pane fade<?= $day == $curr_day_temp ? " show active" : ""; ?>" id="day-<?= $day ?>" role="tabpanel" aria-labelledby="day-<?= $day ?>-tab">
                                    <div class="container-fluid no-padding">
                                        <div class="row">
                                            <?php
                                            for ($type = 0; $type < 4; $type++) {
                                                $type_names = array('Breakfast', 'Lunch', 'Snack', 'Dinner');
                                                $meal_name = $obj_mealplan[($day - 1) * 4 + $type]->name;
                                                $meal_img = $obj_mealplan[($day - 1) * 4 + $type]->img_link;
                                                $meal_link = $obj_mealplan[($day - 1) * 4 + $type]->blog_link;
                                                ?>
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="card meal-card">
                                                        <p class="type"><?= $type_names[$type]; ?></p>
                                                        <a href="<?= $meal_link; ?>" class="meal-body" target="_blank">
                                                            <div class="meal-name-wrapper">
                                                                <p class="meal-name"><?= $meal_name; ?></p>
                                                            </div>
                                                            <div class="meal-img" style="background: url(<?= $meal_img; ?>)"></div>
                                                        </a>
                                                        <div class="favorite-wrapper">
                                                            <span>FAVORITE</span>
                                                            <a href="#" class="btn btn-favorite"><i class="far fa-fw fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    if (!(($curr_day_temp == $week_start_day_temp + 5 && $diff_day_checkin == 0) || //today is day6 and checked-in on today
                            ($curr_day == $week_start_day + 6 && ($diff_day_checkin == 0 || $diff_day_checkin == 1)))) { //today is day7 and checked-in on yesterday/today
                        ?>
                        <div class="checkin-wrapper mt-5">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="countdown-wrapper">
                                            <div class="inner-wrapper">
                                                <?php if ($checkin_left_days > 0 && $checkin_left_days < 6 && $diff_day_checkin < 7) { ?>
                                                    <p class="heading">Next week's fresh new recipes coming in</p>
                                                    <div class='countdown-widget'>                                                    
                                                        <div class="base-timer mx-auto">
                                                            <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                                            <g class="base-timer__circle">
                                                            <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
                                                            <path
                                                                id="base-timer-path-remaining"
                                                                stroke-dasharray="283"
                                                                stroke-dashoffset="283"
                                                                class="base-timer__path-remaining"
                                                                style="stroke-dashoffset: calc(283 + 283/6*<?= 6 - $checkin_left_days; ?>);"
                                                                d="
                                                                M 50, 50
                                                                m -45, 0
                                                                a 45,45 0 1,0 90,0
                                                                a 45,45 0 1,0 -90,0
                                                                "
                                                                ></path>
                                                            </g>
                                                            </svg>
                                                            <div id="base-timer-label" class="base-timer__label">
                                                                <p class="label-text mb-0"><?= $checkin_left_days; ?></p>
                                                                <p class="left-days-label mb-0">Days</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } else if ($checkin_left_days <= 0 || $diff_day_checkin >= 7) { ?>
                                                    <p class="heading">Hi, <?= $first_name; ?>! It's time for your weekly check-in. Update us on your progress so we can create your plan for next week!</p>
                                                    <a href="<?= base_url(); ?>mealplan_update/checkin" class="btn btn-primary btn-checkin">Check In</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class='text-wrapper'>
                                            <h2 class='h5'>Simple Keto System Intelligently Designs Each Week's Plan Based On Your Feedback</h2>
                                            <p>Next weeks meals are dynamically generated based on your progress (weight and activity tracking) and your favorited meals this week.</p>
                                            <p>The more feedback you provide, the more personalized and delicious your meals will be.  Your serving sizes will also be suited to meet your changing needs, i.e. (bigger meals, and more dessert as you lose weight and become more active)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="tab-pane fade" id="collection" role="tabpanel" aria-labelledby="collection-tab">
                    <div class="container-fluid no-padding">
                        <div class="row">
                            <div class="col-10">
                                <form>
                                    <div class="form-group row">
                                        <div class="col-10 col-md-5 col-lg-2">
                                            <label for="select-meal-type" class="select-meal-type">Meal Type</label>
                                            <select class="form-control" id="select-meal-type">
                                                <option>Breakfast</option>
                                                <option>Lunch</option>
                                                <option>Dinner</option>
                                                <option>Snack</option>
                                            </select>
                                        </div>
                                        <div class="col-2 col-2">
                                            <label class="invisible">temp</label>
                                            <p class="mb-0 mt-1">20 Meals</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-2 text-right">
                                <a href="#" class="btn btn-filter" onclick="openNav()">
                                    <span><i class="fas fa-fw fa-filter"></i>Filters</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid no-padding">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="favorite" role="tabpanel" aria-labelledby="favorite-tab">
                    <div class="container-fluid no-padding">
                        <div class="row">
                            <div class="col-10">
                                <form>
                                    <div class="form-group row">
                                        <div class="col-10 col-md-5 col-lg-2">
                                            <label for="select-meal-type" class="select-meal-type">Meal Type</label>
                                            <select class="form-control" id="select-meal-type">
                                                <option>Breakfast</option>
                                                <option>Lunch</option>
                                                <option>Dinner</option>
                                                <option>Snack</option>
                                            </select>
                                        </div>
                                        <div class="col-2 col-2">
                                            <label class="invisible">temp</label>
                                            <p class="mb-0 mt-1">20 Meals</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-2 text-right">
                                <a href="#" class="btn btn-filter" onclick="openNav()">
                                    <span><i class="fas fa-fw fa-filter"></i>Filters</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid no-padding">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card meal-card">
                                    <p class="type">Breakfast</p>
                                    <div class="meal-body">
                                        <p class="meal-name">Oven Baked Chicken with BBQ Remoulade...</p>
                                        <img src="https://recipes.simpleketosystem.com/wp-content/uploads/2020/03/17297.jpg" />
                                    </div>
                                    <div class="favorite-wrapper">
                                        <span>FAVORITE</span>
                                        <a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p><i class="fas fa-fw fa-filter"></i>Filters</p>
            </div>
        </div>
        <form>
            <label class="" for="">PROTEIN</label>
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-chicken">
                        <label class="form-check-label" for="check-chicken">Chicken</label>
                    </div>
                </div>    
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-bacon">
                        <label class="form-check-label" for="check-bacon">Bacon</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-pork">
                        <label class="form-check-label" for="check-pork">Pork</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-beef">
                        <label class="form-check-label" for="check-beef">Beef</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-fish">
                        <label class="form-check-label" for="check-fish">Fish</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-vegetarian">
                        <label class="form-check-label" for="check-vegetarian">Vegetarian</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-coconut">
                        <label class="form-check-label" for="check-coconut">Coconut</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-seafood">
                        <label class="form-check-label" for="check-seafood">Seafood</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-nuts">
                        <label class="form-check-label" for="check-nuts">Nuts</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-eggs">
                        <label class="form-check-label" for="check-eggs">Eggs</label>
                    </div>
                </div>
            </div>
            <label class="" for="">VEGGIES</label>
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-broccoli">
                        <label class="form-check-label" for="check-broccoli">Broccoli</label>
                    </div>
                </div>    
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-Zuccini">
                        <label class="form-check-label" for="check-Zuccini">Zuccini</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-Mushroom">
                        <label class="form-check-label" for="check-Mushroom">Mushroom</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-Cauliflower">
                        <label class="form-check-label" for="check-Cauliflower">Cauliflower</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-Tofu">
                        <label class="form-check-label" for="check-Tofu">Tofu</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-Brussell-Sprouts">
                        <label class="form-check-label" for="check-Brussell-Sprouts">Brussell Sprouts</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-Asparagus">
                        <label class="form-check-label" for="check-Asparagus">Asparagus</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-Avocado">
                        <label class="form-check-label" for="check-Avocado">Avocado</label>
                    </div>
                </div>
            </div>
            <label class="" for="">OTHERS</label>
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-Dariy">
                        <label class="form-check-label" for="check-Dariy">Dariy</label>
                    </div>
                </div>    
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-Butter">
                        <label class="form-check-label" for="check-Butter">Butter</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-Cheese">
                        <label class="form-check-label" for="check-Cheese">Cheese</label>
                    </div>
                </div>
            </div>
            <label class="" for="">PREP TIME</label>
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-less-30min">
                        <label class="form-check-label" for="check-less-30min">< 30 mins</label>
                    </div>
                </div>    
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-30-60min">
                        <label class="form-check-label" for="check-30-60min">30 - 60 mins</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check-more-60min">
                        <label class="form-check-label" for="check-more-60min">60+ mins</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <button type="cancel" class="btn btn-secondary" onclick="closeNav()">Cancel</button>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-search">Search</button>
                </div>
            </div>
        </form>
    </div>

</div>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        s
    }

<?php
if (!$obj_mealplan) {
    echo 'alert("This meal plan has been refunded. Please contact support for any questions at hello@konsciousketo.com");';
    echo 'window.location.href = "https://simpleketosystem.com";';
} else if (count($obj_mealplan) == 0) {
    echo 'alert("Hold Tight! We are taking some time to make your meal plan... and we\'ll send you the link shortly.");';
} else {
    echo "var obj_mealplan = " . json_encode($obj_mealplan) . ";";
}
?>

</script>