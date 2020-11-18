<?php

require_once('meal-plan-email-class.php');
require("ev/email_validation.php");
$emailcontrol = new MealplanEmailInterface();

include 'db_config.php';


$gender = getIfSet($_POST['gender']);

$_POST['chicken'] = getIfSet($_POST['chicken']);
$_POST['pork'] = getIfSet($_POST['pork']);
$_POST['beef'] = getIfSet($_POST['beef']);
$_POST['fish'] = getIfSet($_POST['fish']);
$_POST['bacon'] = getIfSet($_POST['bacon']);
$_POST['dairy'] = getIfSet($_POST['dairy']);
$_POST['broccoli'] = getIfSet($_POST['broccoli']);
$_POST['mushroom'] = getIfSet($_POST['mushroom']);
$_POST['zuccini'] = getIfSet($_POST['zuccini']);
$_POST['cauliflower'] = getIfSet($_POST['cauliflower']);
$_POST['asparagus'] = getIfSet($_POST['asparagus']);
$_POST['avocado'] = getIfSet($_POST['avocado']);
$_POST['egg'] = getIfSet($_POST['egg']);
$_POST['nut'] = getIfSet($_POST['nut']);
$_POST['cheese'] = getIfSet($_POST['cheese']);
$_POST['butter'] = getIfSet($_POST['butter']);
$_POST['coconut'] = getIfSet($_POST['coconut']);
$_POST['brussel_sprout'] = getIfSet($_POST['brussel_sprout']);
$_POST['no_meat'] = getIfSet($_POST['no_meat']);

//$_POST['goal_0'] = getIfSet($_POST['goal_0']);
//$_POST['goal_1'] = getIfSet($_POST['goal_1']);
//$_POST['goal_2'] = getIfSet($_POST['goal_2']);
//$_POST['goal_3'] = getIfSet($_POST['goal_3']);
//$_POST['goal_4'] = getIfSet($_POST['goal_4']);
//$_POST['goal_5'] = getIfSet($_POST['goal_5']);
//$_POST['goal_6'] = getIfSet($_POST['goal_6']);
//$_POST['goal_7'] = getIfSet($_POST['goal_7']);
//$_POST['goal_8'] = getIfSet($_POST['goal_8']);

$email = getIfSet($_POST['email']);
$email = strtolower($email);

if (!$email) {
    $final_result = array('status' => 'failure', 'message' => 'No email inputed');
    echo json_encode($final_result);
    return;
}

$str_quiz = json_encode($_POST);

$checkExistedVal = checkExisted($email, $conn);

if ($checkExistedVal) {
    $sql = "UPDATE quiz SET quiz='" . $str_quiz . "' WHERE email='" . $email . "'";
} else {
    /*
     $error = emailvalidate($email);
    if(strlen($error) > 0) {
        $final_result = array('status' => 'failure', 'message' => $error);
        echo json_encode($final_result);
        return;
    }
    */
    $sql = "INSERT INTO quiz(email, quiz) VALUES('" . $email . "', '" . $str_quiz . "')";
}

$result = $conn->query($sql);
if ($result) {

    $result_email = -1;
    if(!$checkExistedVal) {
        //TO ADD IT TO THE PROSPECT EMAIL LIST JUST CALL IT THUS:
        $emaildata = array(
            'name' => '',
            'apikey' => '123456789',
            'email' => strtolower($email),
            'status' => 'prospect',
            'action' => 'add',
            'link' => '');
            
        // merge start
        
        $quiz = $_POST;
        $quiz['gender'] = array_key_exists('gender', $quiz) ? $quiz['gender'] : 0;
        $quiz['q_familiar'] = array_key_exists('q_familiar', $quiz) ? $quiz['q_familiar'] : 0;
        $quiz['chicken'] = array_key_exists('chicken', $quiz) ? $quiz['chicken'] : 0;
        $quiz['bacon'] = array_key_exists('bacon', $quiz) ? $quiz['bacon'] : 0;
        $quiz['pork'] = array_key_exists('pork', $quiz) ? $quiz['pork'] : 0;
        $quiz['fish'] = array_key_exists('fish', $quiz) ? $quiz['fish'] : 0;
        $quiz['beef'] = array_key_exists('beef', $quiz) ? $quiz['beef'] : 0;
        $quiz['no_meat'] = array_key_exists('no_meat', $quiz) ? $quiz['no_meat'] : 0;
        $quiz['broccoli'] = array_key_exists('broccoli', $quiz) ? $quiz['broccoli'] : 0;
        $quiz['mushroom'] = array_key_exists('mushroom', $quiz) ? $quiz['mushroom'] : 0;
        $quiz['zuccini'] = array_key_exists('zuccini', $quiz) ? $quiz['zuccini'] : 0;
        $quiz['cauliflower'] = array_key_exists('cauliflower', $quiz) ? $quiz['cauliflower'] : 0;
        $quiz['asparagus'] = array_key_exists('asparagus', $quiz) ? $quiz['asparagus'] : 0;
        $quiz['avocado'] = array_key_exists('avocado', $quiz) ? $quiz['avocado'] : 0;
        $quiz['egg'] = array_key_exists('egg', $quiz) ? $quiz['egg'] : 0;
        $quiz['nut'] = array_key_exists('nut', $quiz) ? $quiz['nut'] : 0;
        $quiz['cheese'] = array_key_exists('cheese', $quiz) ? $quiz['cheese'] : 0;
        $quiz['butter'] = array_key_exists('butter', $quiz) ? $quiz['butter'] : 0;
        $quiz['coconut'] = array_key_exists('coconut', $quiz) ? $quiz['coconut'] : 0;
        $quiz['brussel_sprout'] = array_key_exists('brussel_sprout', $quiz) ? $quiz['brussel_sprout'] : 0;
        $quiz['q_activity'] = array_key_exists('q_activity', $quiz) ? $quiz['q_activity'] : 0;
        $quiz['q_tired'] = array_key_exists('q_tired', $quiz) ? $quiz['q_tired'] : 0;
        $quiz['q_recent_changes'] = array_key_exists('q_recent_changes', $quiz) ? $quiz['q_recent_changes'] : 0;
        $quiz['goal_0'] = array_key_exists('goal_0', $quiz) ? $quiz['goal_0'] : 0;
        $quiz['goal_1'] = array_key_exists('goal_1', $quiz) ? $quiz['goal_1'] : 0;
        $quiz['goal_2'] = array_key_exists('goal_2', $quiz) ? $quiz['goal_2'] : 0;
        $quiz['goal_3'] = array_key_exists('goal_3', $quiz) ? $quiz['goal_3'] : 0;
        $quiz['goal_4'] = array_key_exists('goal_4', $quiz) ? $quiz['goal_4'] : 0;
        $quiz['goal_5'] = array_key_exists('goal_5', $quiz) ? $quiz['goal_5'] : 0;
        $quiz['goal_6'] = array_key_exists('goal_6', $quiz) ? $quiz['goal_6'] : 0;
        $quiz['goal_7'] = array_key_exists('goal_7', $quiz) ? $quiz['goal_7'] : 0;
        $quiz['goal_8'] = array_key_exists('goal_8', $quiz) ? $quiz['goal_8'] : 0;
        $mergedemaildata = array_merge($emaildata, $quiz);
        
        // merge end

        //result is either 'ok' for success or returns error text
        $result_email = $emailcontrol->process_user($mergedemaildata);
    }
    
    //var_dump($result);
    $final_result = array('status' => 'success', 'emailing-status' => $result_email);
} else {
    $final_result = array('status' => $conn->error, 'sql' => $sql);
}



//$final_result['emaildata'] = json_encode($merged);

echo json_encode($final_result);


$conn->close();
return;

function getIfSet(&$value, $default = 0) {
    return isset($value) ? $value : $default;
}

function checkExisted($email, $conn) {
    $returnVal = false;
    $sql = "SELECT * FROM quiz WHERE email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $returnVal = true;
    }
    return $returnVal;
}

function emailvalidate($email) {
    $validator = new email_validation_class;

    /*
     * If you are running under Windows or any other platform that does not
     * have enabled the MX resolution function GetMXRR() , you need to
     * include code that emulates that function so the class knows which
     * SMTP server it should connect to verify if the specified address is
     * valid.
     */
    if (!function_exists("GetMXRR")) {
        /*
         * If possible specify in this array the address of at least on local
         * DNS that may be queried from your network.
         */
        $_NAMESERVERS = array();
        include("ev/getmxrr.php");
    }
    /*
     * If GetMXRR function is available but it is not functional, you may
     * use a replacement function.
     */
    /*
      else
      {
      $_NAMESERVERS=array();
      if(count($_NAMESERVERS)==0)
      Unset($_NAMESERVERS);
      include("rrcompat.php");
      $validator->getmxrr="_getmxrr";
      }
     */

    /* how many seconds to wait before each attempt to connect to the
      destination e-mail server */
    $validator->timeout = 10;

    /* how many seconds to wait for data exchanged with the server.
      set to a non zero value if the data timeout will be different
      than the connection timeout. */
    $validator->data_timeout = 0;

    /* user part of the e-mail address of the sending user
      (info@phpclasses.org in this example) */
    $validator->localuser = "info";

    /* domain part of the e-mail address of the sending user */
    $validator->localhost = "phpclasses.org";

    /* Set to 1 if you want to output of the dialog with the
      destination mail server */
    $validator->debug = 0;

    /* Set to 1 if you want the debug output to be formatted to be
      displayed properly in a HTML page. */
    $validator->html_debug = 0;


    /* When it is not possible to resolve the e-mail address of
      destination server (MX record) eventually because the domain is
      invalid, this class tries to resolve the domain address (A
      record). If it fails, usually the resolver library assumes that
      could be because the specified domain is just the subdomain
      part. So, it appends the local default domain and tries to
      resolve the resulting domain. It may happen that the local DNS
      has an * for the A record, so any sub-domain is resolved to some
      local IP address. This  prevents the class from figuring if the
      specified e-mail address domain is valid. To avoid this problem,
      just specify in this variable the local address that the
      resolver library would return with gethostbyname() function for
      invalid global domains that would be confused with valid local
      domains. Here it can be either the domain name or its IP address. */
    $validator->exclude_address = "";
    $validator->invalid_email_domains_file = 'ev/invalidemaildomains.csv';
    $validator->invalid_email_servers_file = 'ev/invalidemailservers.csv';
    $validator->email_domains_white_list_file = 'ev/emaildomainswhitelist.csv';

    if (strlen($error = $validator->ValidateAddress($email, $valid))) {
        return HtmlSpecialChars($error);
    } elseif (!$valid) {
        if (count($validator->suggestions)) {
            $suggestion = $validator->suggestions[0];
            $link = '?email=' . UrlEncode($suggestion);
            return "Did you mean " . $suggestion . "?";
        }
    } else {
        
        $url = "https://api.zerobounce.net/v2/validate?api_key=4e86c40c36ff48c9ba9b26ff304b9c3e&email=" . $email . "&ip_address=";
//        $ch = curl_init();
//        $timeout = 5;
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
//        $file_contents = curl_exec($ch);
//        curl_close($ch);
        $file_contents = file_get_contents($url);

        $zerobounce = json_decode($file_contents);
        
        if ($zerobounce->status == 'invalid') {
            return "Please Enter a Valid Email Address To See Your Results";
        }
    }
    return "";
//    elseif (($result = $validator->ValidateEmailBox($email)) < 0)
//        echo "<h2 align=\"center\">It was not possible to determine if <tt>$email</tt> is a valid deliverable e-mail box address222.</h2>\n";
//    else
//        echo "<h2 align=\"center\"><tt>$email</tt> is " . ($result ? "" : "not ") . "a valid deliverable e-mail box address333.</h2>\n";
}

?>