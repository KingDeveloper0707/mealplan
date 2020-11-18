<?php

class MealplanEmailInterface {
	
	function process_user($data_string){
		$data_string=json_encode($data_string);
		$url='https://ketonoc.com/quiz-handler/index.php';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
		curl_setopt($ch, CURLOPT_USERAGENT,'KK API CALLER V2');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($data_string))                                                                       
		); 
	
		$response = curl_exec($ch); 
		if(curl_errno($ch)) {
			print curl_error($ch);
		}
		curl_close($ch);
		return $response;
	}
}

?>
