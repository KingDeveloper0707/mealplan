/* calculation start */
function startCalculation(onQuizPage, objQuiz, onMealplanPage) {

    if (onQuizPage === undefined) {
        onQuizPage = true;
    }
    if (onMealplanPage === undefined) {
        onMealplanPage = false;
    }

    var obj_answers;
    if (onQuizPage) {
        obj_answers = JSON.parse(localStorage.getItem(form_data_key));
    } else {
        obj_answers = objQuiz;
    }

    if (onQuizPage && !obj_answers) {
        alert('Please start your quiz!');
        window.location.href = baseUrl;
    }


    var curr_weight_in_kg = 0.0;
    var goal_weight_in_kg = 0.0;
    var height_in_cm = 0.0;
    var age = 0;


    var calculatedBMI = 0.0;
    var calculatedBMIText = "";
    var calculatedGoalBMI = 0.0;
    var calculatedGoalBMIText = "";
    var calculatedBMR = 0.0;
    var calculated_achievable_weight = 0.0;
    var calculated_achievable_weight_unit = "lbs";
    var dweight = 0.0;
    var calculated_achievable_date = "";

    var curr_weight = 0.0;
    var curr_weight_unit = calculated_achievable_weight_unit;
    var is_gain = false;



    /* start */
    var curr_weight = parseFloat(obj_answers['curr_weight']);
    var goal_weight = parseFloat(obj_answers['goal_weight']);
    var height = parseFloat(obj_answers['height']);
    var age = parseFloat(obj_answers['age']);
    if (goal_weight <= curr_weight) {
        $('#sum-weight-loss-svg').show();
        $('#sum-weight-gain-svg').hide();
    } else {
        $('#sum-weight-loss-svg').hide();
        $('#sum-weight-gain-svg').show();
        is_gain = true;
    }
    calculated_achievable_weight = goal_weight;
    dweight = curr_weight - goal_weight;
    // Perform the calculation
    curr_weight_in_kg = curr_weight * 0.453592;
    goal_weight_in_kg = calculated_achievable_weight * 0.453592;
    height_in_cm = height * 2.54;

    calculatedBMI = cal_bmi_metric(curr_weight_in_kg, height_in_cm);
    calculatedGoalBMI = cal_bmi_metric(goal_weight_in_kg, height_in_cm);    

    //Achievable weight
    var diff_date = 0;
    if (!is_gain) {
        if (window.location.href.indexOf("/get/") > -1 ||
                (onMealplanPage && ("version" in obj_answers) && obj_answers['version'] == "get")) {//get version
            diff_date = dweight * 7 / 2;
        } else {//main version
            diff_date = dweight * 2;
        }
    } else {
        diff_date = Math.abs(dweight) * 7 / 2;
    }

    var calculated_achievable_date = new Date();
    var today = new Date();

    if (onMealplanPage) {
        var dateTime = obj_answers['create_time'];
        var dateTimeParts = dateTime.split(/[- :]/);
        today = new Date(dateTimeParts[0], dateTimeParts[1] - 1, dateTimeParts[2], dateTimeParts[3], dateTimeParts[4], dateTimeParts[5]);
    } else {
        today = new Date();
    }

    calculated_achievable_date = new Date(today);
    calculated_achievable_date.setDate(today.getDate() + diff_date);

    const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    //bmi

    $('.summary-item g.bmi-body').removeClass('selected');
    $('.summary-item.bmi .number-value').text(calculatedBMI);
    if (calculatedBMI < 18.5) {
        calculatedBMIText = "underweight";
        $('.summary-item.bmi g#underweight').addClass('selected');
    } else if (calculatedBMI >= 18.5 && calculatedBMI < 25) {
        calculatedBMIText = "normal weight";
        $('.summary-item.bmi g#normalweight').addClass('selected');
    } else if (calculatedBMI >= 25 && calculatedBMI < 30) {
        calculatedBMIText = "overweight";
        $('.summary-item.bmi g#overweight').addClass('selected');
    } else {
        calculatedBMIText = "Obese";
        $('.summary-item.bmi g#obese').addClass('selected');
    }

    $('.summary-item.bmi .your-status .text-value').text(calculatedBMIText);


    if (calculatedGoalBMI < 18.5) {
        calculatedGoalBMIText = "underweight";
    } else if (calculatedGoalBMI >= 18.5 && calculatedGoalBMI < 25) {
        calculatedGoalBMIText = "normal weight";
    } else if (calculatedGoalBMI >= 25 && calculatedGoalBMI < 30) {
        calculatedGoalBMIText = "overweight";
    } else {
        calculatedGoalBMIText = "Obese";
    }
    //bmr     
    calculatedBMR = cal_bmr_metric(obj_answers['gender'], curr_weight_in_kg, height_in_cm, age);
    console.log("calculatedBMR = " + calculatedBMR);
    var meta_age = parseInt(age);
    if (parseInt(obj_answers['q_activity']) == 0) {
        meta_age += 3;
    } else if (parseInt(obj_answers['q_activity']) == 1) {
        meta_age += 2;
    } else if (parseInt(obj_answers['q_activity']) == 2) {
        meta_age += 1;
    } else if (parseInt(obj_answers['q_activity']) == 3) {
        meta_age += 0;
    }
    if (parseInt(obj_answers['q_tired']) == 0) {
        meta_age += 0;
    } else if (parseInt(obj_answers['q_tired']) >= 1) {
        meta_age += 1;
    }
    if ('q_recent_changes' in obj_answers) {
        meta_age += 1;
    } else {
        meta_age += 0;
    }
    if (calculatedBMI < 18.5) {
        meta_age += 1;
    } else if (calculatedBMI >= 18.5 && calculatedBMI < 25) {
        meta_age += 0;
    } else if (calculatedBMI >= 25 && calculatedBMI < 30) {
        meta_age += 1;
    } else {
        meta_age += 2;
    }
    $('.summary-item.metabolic_age svg .m_actual_age').text(age);
    $('.summary-item.metabolic_age svg .m_metabolic_age').text(meta_age);
    localStorage.setItem('mar_age', meta_age);
    //achievable_weight
    calculated_achievable_weight = parseInt(calculated_achievable_weight);
    var aw_goal_weight_string = calculated_achievable_weight + " " + calculated_achievable_weight_unit;


    var curr_date_str_svg = monthNames[today.getMonth()].substring(0, 3) + " " + today.getDate();
    var calculated_achievable_date_str = monthNames[calculated_achievable_date.getMonth()] + " " + calculated_achievable_date.getDate() + get_ordinal(calculated_achievable_date.getDate()) + ", " + calculated_achievable_date.getFullYear();
    var calculated_achievable_date_str_svg = monthNames[calculated_achievable_date.getMonth()].substring(0, 3) + " " + calculated_achievable_date.getDate();

    $('.summary-item.achievable_weight .your-status .text-value').text(calculated_achievable_weight);
    $('.summary-item.achievable_weight .your-status .text-unit').text(calculated_achievable_weight_unit);
    $('.summary-item.achievable_weight .your-status .limit-month').text(calculated_achievable_date_str);

//    $('.summary-item.achievable_weight svg .aw_curr_weight').text(curr_weight + " " + curr_weight_unit);
//    $('.summary-item.achievable_weight .aw_curr_weight').text(curr_weight + " " + curr_weight_unit);
//    $('.summary-item.achievable_weight .aw_goal_weight').text(aw_goal_weight_string);


    $('.summary-item.achievable_weight svg .curr_day').text(curr_date_str_svg);
    $('.summary-item.achievable_weight svg .goal_day').text(calculated_achievable_date_str_svg);
    $('.summary-item.achievable_weight svg .curr_weight').text(curr_weight);
    $('.summary-item.achievable_weight svg .goal_weight').text(calculated_achievable_weight);
    $('.summary-item.achievable_weight svg .curr_unit').text(curr_weight_unit);
    $('.summary-item.achievable_weight svg .goal_unit').text(curr_weight_unit);

    var html = "";
    var monday = getMonday(new Date());

    console.log("monday = " + monday);
    for (var i = 0; i < 7; i++) {

//        console.log("omnday111");
//        console.log(monday.getDate());
//        console.log(monday.getDate() + i);
        var daynum = getMonday(new Date());
        daynum.setDate(monday.getDate() + i);


        if (i == 6) {
            html += "<td class='red-color'>" + daynum.getDate() + "</td>";
        } else {
            html += "<td>" + daynum.getDate() + "</td>";
        }

    }

    $('.summary-item.first-week .calendar .curr-month').html(monthNames[today.getMonth()] + ", " + today.getFullYear());
    $('.summary-item.first-week .calendar table tr.dates').html(html);
    if (is_gain) {
        $('.summary-item.first-week .your-status .text-value').html("5");
    }
    if ((window.location.href.indexOf("/get/") > -1 ||
            (onMealplanPage && ("version" in obj_answers) && obj_answers['version'] == "get")) &&
            !is_gain) {//get version
        $('.summary-item.first-week .your-status .text-value').html("-2");
    }



    $('.summary-item.achievable_weight svg .aw_curr_bmi').text("Current BMI: " + calculatedBMI);
    $('.summary-item.achievable_weight svg .aw_curr_bmi_text').text(calculatedBMIText);
    $('.summary-item.achievable_weight svg .aw_goal_bmi').text("Goal BMI: " + calculatedGoalBMI);
    $('.summary-item.achievable_weight svg .aw_goal_bmi_text').text(calculatedGoalBMIText);
    //Keto Compatibility
    if (parseInt(obj_answers['q_activity']) > 2) {
        $('.summary-item.keto_compatibility .description.active-012').hide();
        $('.summary-item.keto_compatibility .description.active-3').show();
    } else {
        $('.summary-item.keto_compatibility .description.active-012').show();
        $('.summary-item.keto_compatibility .description.active-3').hide();
    }
    //Anxiety Factors
    var anxiety_factors_text = "HIGHLY STRESSED";
    if ("q_recent_changes" in obj_answers) {
        console.log("Highly Stressed!");
        anxiety_factors_text = "HIGHLY STRESSED";
    } else {
        console.log("Mildly Stressed!");
        anxiety_factors_text = "MILDLY STRESSED";
    }
    $('.summary-item.anxiety_factors .your-status .text-value').text(anxiety_factors_text);
    $('.summary-item.anxiety_factors .af_stress_text').text(anxiety_factors_text);
    //Energy Metabolism
    if (parseInt(obj_answers['q_activity']) === 0) {
        $('.summary-item.energy_metabolism .description.active-0').show();
        $('.summary-item.energy_metabolism .description.active-1').hide();
        $('.summary-item.energy_metabolism .description.active-23').hide();
    } else if (parseInt(obj_answers['q_activity']) === 1) {
        $('.summary-item.energy_metabolism .description.active-0').hide();
        $('.summary-item.energy_metabolism .description.active-1').show();
        $('.summary-item.energy_metabolism .description.active-23').hide();
    } else if (parseInt(obj_answers['q_activity']) >= 2) {
        $('.summary-item.energy_metabolism .description.active-0').hide();
        $('.summary-item.energy_metabolism .description.active-1').hide();
        $('.summary-item.energy_metabolism .description.active-23').show();
    }

    //Body Change Estimations
    if (parseInt(obj_answers['gender']) === 1) {//male
        $('section#summary .summary-item.body-change svg#bodychange-male').show();
        $('section#summary .summary-item.body-change svg#bodychange-female').hide();
    } else {
        $('section#summary .summary-item.body-change svg#bodychange-male').hide();
        $('section#summary .summary-item.body-change svg#bodychange-female').show();
    }

    if (("first_name" in obj_answers) && obj_answers['first_name'] && obj_answers['first_name'].length > 0) {
        $('.p-first-name').show();
        $('.p-first-name .first_name').text(obj_answers['first_name']);
    }

    var results = {};
    results['bmi'] = calculatedBMI;
    results['bmi_text'] = calculatedBMIText;
    results['goal_bmi'] = calculatedGoalBMI;
    results['bmr'] = calculatedBMR;
    results['metabolic_age'] = meta_age;
    results['achievable_weight_date'] = calculated_achievable_date_str;
    results['achievable_weight'] = calculated_achievable_weight;
    results['achievable_weight_unit'] = calculated_achievable_weight_unit;
    results['anxiety_factors'] = anxiety_factors_text;
//    results['curr_date'] = curr_date_str_svg;
//    results['goal_date'] = calculated_achievable_date_str_svg;
//    results['curr_weight'] = curr_weight;
//    results['curr_weight_unit'] = curr_weight_unit;


    return results;
}
;

function get_ordinal(d) {
    if (d > 3 && d < 21)
        return 'th';
    switch (d % 10) {
        case 1:
            return "st";
        case 2:
            return "nd";
        case 3:
            return "rd";
        default:
            return "th";
    }
}

function getMonday(d) {
    d = new Date(d);
    var day = d.getDay(),
            diff = d.getDate() - day + (day == 0 ? -6 : 1); // adjust when day is sunday
    return new Date(d.setDate(diff));
}

function cal_bmi_metric(kg, htc) {

    m = htc / 100;
    h2 = m * m;

    bmi = kg / h2;


    f_bmi = Math.floor(bmi);

    var diff = bmi - f_bmi;
    diff = diff * 10;

    diff = Math.round(diff);
    if (diff === 10) {
        // Need to bump up the whole thing instead
        f_bmi += 1;
        diff = 0;
    }
    bmi = f_bmi + "." + diff;

    return bmi;
}

function cal_bmr_metric(gender, kg, cm, age) {
    var bmr = 0.0;
    if (parseInt(gender) === 1) {
        bmr = (10 * kg) + (6.25 * cm) - (5 * age) + 5;
        console.log("bmr MALE");
    } else {
        bmr = (10 * kg) + (6.25 * cm) - (5 * age) - 161;
        console.log("bmr FEMALE");
    }
    return bmr;
}

function chkw(w) {
    if (isNaN(parseInt(w))) {
        return false;
    } else if (w < 0) {
        return false;
    } else {
        return true;
    }
}