<?php

require_once('meal-plan-email-class.php');

$emailcontrol=new MealplanEmailInterface();

//TO ADD IT TO THE PROSPECT EMAIL LIST JUST CALL IT THUS:
$emaildata = array(
'name' => 'Noah Body',
'apikey' =>'123456789',
'email' => 'may19.quiz123@dripcheck.com',
'status' =>'prospect',
'action' =>'add',
'link' =>'');
//result is either 'ok' for success or returns error text                                                                
$result = $emailcontrol->process_user($emaildata);
var_dump($result);

//TO CHANGE IT TO A CUSTOMER AND PUSH A LINK INTO THE EMAIL SYSTEM CALL IT AGAIN:
$emaildata = array(
'name' => 'Noah Juan',
'apikey' =>'123456789',
'email' => 'may19.quiz123@dripcheck.com',
'status' =>'customer',
'action' =>'add',
'link' =>'https://quiz.konsciousketo.com/?user=87654',
); 
//result is either 'ok' for success or returns error text
$result = $emailcontrol->process_user($emaildata);
var_dump($result);
?>
