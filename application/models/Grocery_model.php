<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('TIMEZONE', 'America/New_York');
date_default_timezone_set(TIMEZONE);
//require_once '../vendor/autoload.php';
require FCPATH . 'vendor/autoload.php';

class Grocery_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_by_i_week($customer_id, $i_week) {
        $query = $this->db->select('ingredients.meal_id, ingredients.meal_name, ingredients.name, ingredients.servings, ingredients.part_name, test_mealplan.day')
                ->from('ingredients')
                ->join('test_mealplan', 'ingredients.meal_id = test_mealplan.meal_id', 'left')
                ->where('test_mealplan.customer_id', $customer_id)
                ->where('test_mealplan.day >= ', $i_week * 7 + 1)
                ->where('test_mealplan.day <= ', $i_week * 7 + 7)
                ->group_by('ingredients.id')
                ->order_by('test_mealplan.id')
                ->order_by('ingredients.id')
                ->get();
        $rows = $query->result();
        
        $meals = array();
        $meal_id = -1;
        $meal_result = array();
        
        foreach ($rows as $row) {            
            if($row->meal_id != $meal_id) {
                if($meal_id > 0) {
                    array_push($meals, $meal_result);                    
                }
                $meal_result = array();
                $meal_id = $row->meal_id;
                $meal_result['meal_name'] = $row->meal_name;
            }            
            if (strtolower($row->name) == "total" || strtolower($row->name) == "total ") {
                $meal_result['servings'] = $row->servings;                
                continue;
            } else if (strtolower($row->name) == "total per serving" || strtolower($row->name) == "total per serving ") {
                continue;
            }
            $meal_result['meal_name'] = $row->meal_name;
            $meal_result['ingredients'][] = array($row->name, $row->part_name);
        }
        return $meals;
    }

    function create_html_by_meals($meals, $i_week) {
//        echo json_encode($meals);
        $html = '<h1 style="text-align: center; float: left;"><span>Custom Meal Plan Grocery Shopping List</span><span style="font-size: 0.8em; font-weight: normal;"> (Week ' . ($i_week + 1) . ')</span></h1>';

        foreach ($meals as $meal) {

            $html .= '<h2>' . $meal['meal_name'] . '  <span style="font-size: .9em; font-weight: normal;">(' . $meal['servings'] . ' servings)</span></h2>';


            $html .= '<table style="width: 100%;">';
            $prev_part_name = null;
            $inner_count = 0;

            foreach ($meal['ingredients'] as $ingre) {
                
                if ($ingre[1] && strlen($ingre[1]) > 0) {
                    if ($ingre[1] != $prev_part_name) {
                        $html .= '</table>';
                        $html .= '<div style="font-weight: bold;">' . $ingre[1] . '</div>';
                        $html .= '<table style="width: 100%;">';
                        $inner_count = 0;
                        $prev_part_name = $ingre[1];
                    }
                } else {
                    if ($inner_count == 0) {
                        $html .= '</table><table style="width: 100%;">';
                    }
                }

                if ($inner_count % 2 == 0) {
                    if (count($meal['ingredients']) == 1) {
                        $html .= '<tr><td><input type="checkbox" style=""/></td><td style="width: 100%;"><label style="">' . $ingre[0] . '</label></td><td></td></tr>';
                    } else {
                        if ($this->get_num_in_part_name($meal['ingredients'], $ingre[1]) == 1) {
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
            $html .= '</table>';
        }
        
        return $html;
    }

    function download_pdf_by_html($html) {
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 9
        ]);

        // import start    
        //$mpdf->SetImportUse();
        $pagecount = $mpdf->SetSourceFile('api/fivetips.pdf');
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
    }

    function get_num_in_part_name($ingres, $part_name) {
        $count = 0;
        $prev_part_name = "";
        foreach ($ingres as $ingre) {
            if ($ingre[1] && $ingre[1] == $part_name) {
                $count++;
            } else {
                
            }
        }
        return $count;
    }

}

?>