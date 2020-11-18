<?php

define('TIMEZONE', 'America/New_York');
date_default_timezone_set(TIMEZONE);

require_once '../vendor/autoload.php';

include 'db_config.php';


$uid = getIfSet($_REQUEST['uid']);
$i_week = getIfSet($_REQUEST['i_week']);

if (!$uid) {
    $final_result = array('status' => 'failure', 'message' => 'No uid in URL');
    echo json_encode($final_result);
    return;
}

$sql = "SELECT * FROM mealplan WHERE uid='" . $uid . "' LIMIT 1";

$result = $conn->query($sql);
$strMealPlan = "";
$type_array = array();
$mealplan_result = array();
$final_result = array();
$meals = array();




if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $strMealPlan = $row['mealplan'];
    }
    $mealplanObject = json_decode($strMealPlan, true);

    $mealplanObject[1] = array_slice($mealplanObject[1], $i_week * 7, 7);
    $mealplanObject[2] = array_slice($mealplanObject[2], $i_week * 7, 7);
    $mealplanObject[3] = array_slice($mealplanObject[3], $i_week * 7, 7);
    $mealplanObject[4] = array_slice($mealplanObject[4], $i_week * 7, 7);
//    $type_array = array_unique($type_array);
//    echo "mealplan = ";
//    echo json_encode($mealplanObject[1]);
//    echo "mealplan = ";
//    echo json_encode($mealplanObject[2]);
//    echo "mealplan = ";
//    echo json_encode($mealplanObject[3]);
//    echo "mealplan = ";
//    echo json_encode($mealplanObject[4]);
//    return;

    $usedMealIds = [];
    for ($day = 0; $day < 7; $day++) {

        for ($type = 1; $type <= 4; $type++) {

            $mealId = $mealplanObject[$type][$day];
            if(!in_array($mealId, $usedMealIds)) {
                $usedMealIds[] = $mealId;
            } else {
                continue;
            }

            $sql = "SELECT * FROM ingredients WHERE meal_id='" . $mealId . "'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $meal_result = array();

                while ($row = $result->fetch_assoc()) {
                    if (strtolower($row['name']) == "total" || strtolower($row['name']) == "total ") {
                        $meal_result['servings'] = $row['servings'];
                        continue;
                    } else if (strtolower($row['name']) == "total per serving" || strtolower($row['name']) == "total per serving ") {
                        continue;
                    }

                    $meal_result['meal_name'] = $row['meal_name'];
                    $row['name'] = htmlspecialchars($row['name']);
                    $meal_result['ingredients'][] = array($row['name'], $row['part_name']);
                }

                $meals[] = $meal_result;
            } else {
//                echo "!!! " . $mealId . "<br />";
            }
        }
    }
}

//$final_result['mealplan'] = $mealplan_result;
//echo json_encode($meals);

$conn->close();


$html = '<h1 style="text-align: center; float: left;"><span>Custom Meal Plan Grocery Shopping List</span><span style="font-size: 0.8em; font-weight: normal;"> (Week ' . ($i_week + 1) . ')</span></h1>';

foreach ($meals as $meal) {

    $html .= '<h2>' . $meal['meal_name']  . '  <span style="font-size: .9em; font-weight: normal;">(' . $meal['servings']  . ' servings)</span></h2>';
    

    //$html .= '<table style="width: 100%;">';
    $prev_part_name = null;
    $inner_count = 0;
    
    foreach ($meal['ingredients'] as $ingre) {
        if($ingre[1]) {
            if($ingre[1] != $prev_part_name) {
                $html .= '</table>';
                $html .= '<div style="font-weight: bold;">' . $ingre[1] . '</div>';
                $html .= '<table style="width: 100%;">';
                $inner_count = 0;
                $prev_part_name = $ingre[1];
                
            }
        } else {
            if($inner_count == 0) {
                $html .= '</table><table style="width: 100%;">';    
            }
        }
        
        if($inner_count % 2 == 0) {
            if(count($meal['ingredients']) == 1) {
                $html .= '<tr><td><input type="checkbox" style=""/></td><td style="width: 100%;"><label style="">' . $ingre[0] . '</label></td><td></td></tr>';
            } else {
                if(getNumInPartName($meal['ingredients'], $ingre[1]) == 1) {
                    $html .= '<tr><td><input type="checkbox" style=""/></td><td style="width: 100%;"><label style="">' . $ingre[0] . '</label></td><td></td></tr>';    
                } else {
                    $html .= '<tr><td><input type="checkbox" style=""/></td><td style="width: 50%;"><label style="">' . $ingre[0] . '</label></td>';    
                }
                
            }
            
            
        } else {
            $html .= '<td><input type="checkbox" style=""/></td><td style="width: 50%;"><label style="">' . $ingre[0] . '</label></td></tr>';
        }
        $inner_count++;
    }
    /*
    for($i = 0 ; $i < count($meal['ingredients']) ; $i++) {
        if($meal['ingredients'][$i][1]) {
            if($prev_part_name == $meal['ingredients'][$i][1]) {
                
            } else {
                //$html .= '<div>' . $meal['ingredients'][$i][1] . '</div>';    
                $prev_part_name = $meal['ingredients'][$i][1];
            }
            $html .= '<p>' . $meal['ingredients'][$i][1] . '</p>';
            
        }
        //else {
            if($i % 2 == 0) {
                //$html .= '<tr><td><input type="checkbox" style=""/></td><td style="width: 50%;"><label style="">' . $meal['ingredients'][$i][0] . '</label></td>';
            } else {
                //$html .= '<td><input type="checkbox" style=""/></td><td style="width: 50%;"><label style="">' . $meal['ingredients'][$i][0] . '</label></td></tr>';
            }    
            $html .= '<p>' . $meal['ingredients'][$i][0] . '</p>';
        //}
        
    }
    */
    $html .= '</table>';
}

$mpdf = new \Mpdf\Mpdf([
    'default_font_size' => 9
    ]);
    
    
    
// import start    
//$mpdf->SetImportUse();
$pagecount = $mpdf->SetSourceFile('fivetips.pdf');
$tplId = $mpdf->ImportPage($pagecount);
$mpdf->UseTemplate($tplId);
//$mpdf->SetPageTemplate($tplId);
$mpdf->AddPage();
// import end

$mpdf->SetHeader(date("Y/m/d"));
$mpdf->setFooter('|{PAGENO} of {nbpg}|');
$mpdf->WriteHTML($html);
$filename = "SimpleKetoSystem Grocery Shopping List " . date("Y-m-d") . ".pdf";
$mpdf->Output($filename, 'D');
//echo $html;

return;

function getIfSet(&$value, $default = 0) {
    return isset($value) ? $value : $default;
}

function getNumInPartName($ingres, $part_name) {
    $count = 0;
    $prev_part_name = "";
    foreach($ingres as $ingre) {
        if($ingre[1] && $ingre[1] == $part_name) {
            $count++;
        } else {
        }
    }
    return $count;
}

?>