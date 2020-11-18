<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require APPPATH . 'libraries/ev/email_validation.php';
require_once APPPATH . 'libraries/meal-plan-email-class.php';
$emailcontrol = new MealplanEmailInterface();

class Customer_model extends CI_Model {

//    protected $_tablename = 'quiz';

    function __construct() {
        parent::__construct();
    }

    protected function generateSalt() {
        $salt = "xiORG17N6ayoEn6X3";
        return $salt;
    }
    
    public function get($customer_id) {
        $query = $this->db->select('id, email, first_name, last_name')->from('test_customer')->where('id', $customer_id)->limit(1)->get();
        $row = $query->row();
        if(isset($row)) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function validate_password($postData) {

        if (!isset($postData["email"])) {
            return 2;
        }
        if (!isset($postData["password"])) {
            return 2;
        }

        $salt = $this->generateSalt();
        $password = md5($salt . $postData["password"]);
        $email = $postData["email"];

        $query = $this->db->select('id, email')
                ->from('test_customer')
                ->where('email', $email)
                ->where('password', $password)
                ->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function customerLogin($postData) {
        $val_return = array();
        if (!isset($postData["email"])) {
            $val_return['status'] = 'failure';
            $val_return['message'] = 'no input email';
            return $val_return;
        }
        if (!isset($postData["password"])) {
            $val_return['status'] = 'failure';
            $val_return['message'] = 'no input password';
            return $val_return;
        }
        $salt = $this->generateSalt();
        $password = md5($salt . $postData["password"]);
        $email = $postData["email"];

        $query = $this->db->select('id, email')
                ->from('test_customer')
                ->where('email', $email)
                ->where('password', $password)
                ->get();

        if ($query->num_rows() > 0) {
            $q = $query->row();
            $this->session->set_userdata("email", $q->email);
            $this->session->set_userdata("customer_id", $q->id);
//            $this->session->set_userdata("limitation", $q->limitation);
            $this->session->set_userdata("loggedin", 1);


            $val_return['status'] = 'success';
        } else {
            $val_return['status'] = 'failure';
            $query = $this->db->select('id')->from('test_customer')->where('email', $email)->get();
            if ($query->num_rows() > 0) {
                $val_return['message'] = 'incorrect password';
            } else {
                $val_return['message'] = 'incorrect email';
            }
        }
        return $val_return;
    }

    public function customerSignup($postData) {

        $val_return = array();
        $passwod = "";
        $password2 = "";
        if (!isset($postData["password"]) || empty($postData["password"])) {
            $val_return['status'] = 'failure';
            $val_return['message'] = 'no input password';
            return $val_return;
        } else {
            $password = strip_tags($postData["password"]);
        }
        if (!isset($postData["password2"]) || empty($postData["password2"])) {
            $val_return['status'] = 'failure';
            $val_return['message'] = 'no input password confirm';
            return $val_return;
        } else {
            $password2 = strip_tags($postData["password2"]);
        }
        if (!isset($postData["email"]) || empty($postData["email"])) {
            $val_return['status'] = 'failure';
            $val_return['message'] = 'no input email';
            return $val_return;
        } else {
            $email = strip_tags($postData["email"]);
        }

        $salt = $this->generateSalt();
        if ($password !== $password2) {
            $val_return['status'] = 'failure';
            $val_return['message'] = 'no password same';
            return $val_return;
        } else {
            $password = md5($salt . $password);
        }

        if (!$customer_id = $this->get_id_by_email($postData['email'])) {
            $val_return['status'] = 'failure';
            $val_return['message'] = 'incorrect email';
            return $val_return;
        }

        $query = $this->db->select('id')
                ->from('test_checkout')
                ->where('customer_id', $customer_id)
                ->limit(1)
                ->get();

        if ($query->num_rows() == 0) {
            $val_return['status'] = 'failure';
            $val_return['message'] = 'incorrect email';
            return $val_return;
        }

        $query = $this->db->select('id')
                ->from('test_customer')
                ->where('id', $customer_id)
                ->where('LENGTH(password) > ', '0')
                ->get();

        if ($query->num_rows() > 0) {
            $val_return['status'] = 'failure';
            $val_return['message'] = 'duplicated email';
            return $val_return;
        } else {
            $this->db->set('email', $email)
                    ->set('password', $password)
                    ->where('id', $customer_id)
                    ->update('test_customer');
        }

        $this->session->set_userdata("customer_id", $customer_id);
        $this->session->set_userdata("email", $email);
        $this->session->set_userdata("loggedin", 1);

        $val_return['status'] = 'success';

        return $val_return;
    }

    public function verifyUser($uid = null) {
        if ($this->session->userdata("email") && $this->session->userdata("customer_id") && $this->session->userdata("loggedin")) {
            $sql = "SELECT * FROM test_customer WHERE id = " . $this->db->escape(strip_tags((int) $this->session->userdata("customer_id"))) . " AND email = " . $this->db->escape(strip_tags($this->session->userdata("email")));
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                $this->logout();
                redirect(base_url() . "login", 'auto');
            }
        } else {
            if (!$uid) {
                $this->logout();
                redirect(base_url() . "mealplan_update/login", 'auto');
            } else {
                $status = $this->check_customer_signed_up($uid);
                if ($status === 0) {
                    // wrong uid entered                    
                } else if ($status === 1 || $status === 2) {
                    redirect(base_url() . "mealplan_update/signup" . "?uid=" . $uid, 'auto');
                } else {
                    redirect(base_url() . "mealplan_update/login" . "?uid=" . $uid, 'auto');
                }
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("customer_id");
        $this->session->unset_userdata("loggedin");
        return TRUE;
    }

    public function check_customer_signed_up($uid) {
        // status: 
        // 0 -> no uid, orderid existed, 
        // 1 -> uid existed, but no customer existed.
        // 2-> uid, customer existed, but no password existed
        // 3-> uid, customer, password all existed
        $status = 3;

        $CI = & get_instance();
        $CI->load->model('checkout_model');
        if (!$obj_customer_info = $CI->checkout_model->get_customer_info_by_uid($uid)) {
            $status = 1; // no such uid existed
            return $status;
        }

        $customer_id = $obj_customer_info->customer_id;
        $query = $this->db->select('id')
                ->from('test_customer')
                ->where('id', $customer_id)
                ->where('LENGTH(password) > ', '0')
                ->get();

        if ($query->num_rows() == 0) {
            $status = 2; // password has not been setup yet.
            return $status;
        }

        return $status;
    }

    public function send_pw_reset_email($customer_id, $email, $token) {
        $query = $this->db->select('id')
                ->from('customer_pw_reset')
                ->where('customer_id', $customer_id)
                ->get();
        if ($query->num_rows() > 0) {
            $query = $this->db->set('token', $token)
                    ->where('customer_id', $customer_id)
                    ->update('customer_pw_reset');
        } else {
            $query = $this->db->set('customer_id', $customer_id)
                    ->set('token', $token)
                    ->insert('customer_pw_reset');
        }

        $this->load->library('mailer');
        $templateData = ['pw_reset_token' => $token];
        $this->mailer->to($email)->subject("Reset your password")
                ->send("pw_reset.php", compact('templateData'));
    }

    public function get_customer_id_by_token($token) {
        $val_return = null;
        $query = $this->db->select('customer_id')
                ->from('customer_pw_reset')
                ->where('token', $token)
                ->get();
        if ($query->num_rows() > 0) {
            $val_return = $query->row('customer_id');
        }
        return $val_return;
    }

    public function update_password($customer_id, $password) {

        $salt = $this->generateSalt();
        $password = md5($salt . $password);
        $query = $this->db->set('password', $password)
                ->where('id', $customer_id)
                ->update('test_customer');


        $query = $this->db->select('email')->from('test_customer')->where('id', $customer_id)->get();
        $email = $query->row('email');
        $this->session->set_userdata("customer_id", $customer_id);
        $this->session->set_userdata("email", $email);
//        $this->session->set_userdata("verification_key", $verification_key);
        $this->session->set_userdata("loggedin", 1);
    }

    function get_all_customers() {
        $obj_return = null;
        $query = $this->db->get('test_customer');
        if($query->num_rows() > 0) {
            $obj_return = $query->result();
        }
        return $obj_return;
    }    

    function get_id_by_email($email) {
        $customer_id = null;
        $query = $this->db->select('id')
                ->where('email', $email)
                ->get("test_customer");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $customer_id = $row->id;
        }
        return $customer_id;
    }

    function update_email_by_history($email_checkout) {
        $updated_id = null;
        $subQuery = $this->db->select('email_quiz')
                ->from('email_change_history')
                ->where('email_checkout', $email_checkout)
                ->get_compiled_select();
        $this->db->set('email', $email_checkout)
                ->where("email = ({$subQuery})", NULL, FALSE)
                ->update('test_customer');
    }

    function getCustomerWithEmail($email) {
        $this->db->get_where('test_customer', array('email' => $email));
    }

    function insert_customer($obj_answers, $obj_additional) {
        $customer_id = "";
        $updated = false;
        $emailing_status = "";

        $query = $this->db->get_where('test_customer', array('email' => $obj_answers['email']));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $customer_id = $row->id;
            $data = array(
                'first_name' => $obj_answers['first_name']
            );
            $this->db->update('test_customer', $data, array('id' => $customer_id));
            $updated = true;
        } else {
            //email validate
//            $error = emailvalidate($email);
//            if (strlen($error) > 0) {
//                $returnVal = array('status' => 'failure', 'message' => $error);
//                return $returnVal;
//            }
            //
            
            $data = array(
                'email' => $obj_answers['email'],
                'first_name' => $obj_answers['first_name']
            );
            $this->db->insert('test_customer', $data);
            $customer_id = $this->db->insert_id();

//            $emailing_status = sendEmail($obj_answers, $obj_additional);
        }
        $returnVal = array('status' => 'success', 'customer_id' => $customer_id, 'updated' => $updated, 'emailing_status' => $emailing_status);
        return $returnVal;
    }

    function update_customer_name($first_name, $last_name) {
        $this->db->set('first_name', $first_name)
                ->set('last_name', $last_name)
                ->update('test_customer');
    }

    function deleteCustomer($id) {
        $this->db->delete('test_customer', array('id' => $id));
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

    function sendEmail($obj_answers, $obj_additional) {
        $emaildata = array(
            'name' => '',
            'apikey' => '123456789',
            'email' => strtolower($obj_answers['email']),
            'status' => 'prospect',
            'action' => 'add',
            'link' => '');

        // merge start


        $obj_answers['gender'] = array_key_exists('gender', $obj_answers) ? $obj_answers['gender'] : 0;
        $obj_answers['q_familiar'] = array_key_exists('q_familiar', $obj_answers) ? $obj_answers['q_familiar'] : 0;
        $obj_answers['chicken'] = array_key_exists('chicken', $obj_answers) ? $obj_answers['chicken'] : 0;
        $obj_answers['bacon'] = array_key_exists('bacon', $obj_answers) ? $obj_answers['bacon'] : 0;
        $obj_answers['pork'] = array_key_exists('pork', $obj_answers) ? $obj_answers['pork'] : 0;
        $obj_answers['fish'] = array_key_exists('fish', $obj_answers) ? $obj_answers['fish'] : 0;
        $obj_answers['beef'] = array_key_exists('beef', $obj_answers) ? $obj_answers['beef'] : 0;
        $obj_answers['no_meat'] = array_key_exists('no_meat', $obj_answers) ? $obj_answers['no_meat'] : 0;
        $obj_answers['broccoli'] = array_key_exists('broccoli', $obj_answers) ? $obj_answers['broccoli'] : 0;
        $obj_answers['mushroom'] = array_key_exists('mushroom', $obj_answers) ? $obj_answers['mushroom'] : 0;
        $obj_answers['zuccini'] = array_key_exists('zuccini', $obj_answers) ? $obj_answers['zuccini'] : 0;
        $obj_answers['cauliflower'] = array_key_exists('cauliflower', $obj_answers) ? $obj_answers['cauliflower'] : 0;
        $obj_answers['asparagus'] = array_key_exists('asparagus', $obj_answers) ? $obj_answers['asparagus'] : 0;
        $obj_answers['avocado'] = array_key_exists('avocado', $obj_answers) ? $obj_answers['avocado'] : 0;
        $obj_answers['egg'] = array_key_exists('egg', $obj_answers) ? $obj_answers['egg'] : 0;
        $obj_answers['nut'] = array_key_exists('nut', $obj_answers) ? $obj_answers['nut'] : 0;
        $obj_answers['cheese'] = array_key_exists('cheese', $obj_answers) ? $obj_answers['cheese'] : 0;
        $obj_answers['butter'] = array_key_exists('butter', $obj_answers) ? $obj_answers['butter'] : 0;
        $obj_answers['coconut'] = array_key_exists('coconut', $obj_answers) ? $obj_answers['coconut'] : 0;
        $obj_answers['brussel_sprout'] = array_key_exists('brussel_sprout', $obj_answers) ? $obj_answers['brussel_sprout'] : 0;
        $obj_answers['q_activity'] = array_key_exists('q_activity', $obj_answers) ? $obj_answers['q_activity'] : 0;
        $obj_answers['q_tired'] = array_key_exists('q_tired', $obj_answers) ? $obj_answers['q_tired'] : 0;
        $obj_answers['q_recent_changes'] = array_key_exists('q_recent_changes', $obj_answers) ? $obj_answers['q_recent_changes'] : 0;
        $obj_answers['goal_more_energy'] = array_key_exists('goal_0', $obj_answers) ? $obj_answers['goal_0'] : 0;
        $obj_answers['goal_better_sleep'] = array_key_exists('goal_1', $obj_answers) ? $obj_answers['goal_1'] : 0;
        $obj_answers['goal_become_lean_and_toned'] = array_key_exists('goal_2', $obj_answers) ? $obj_answers['goal_2'] : 0;
        $obj_answers['goal_increase_strength'] = array_key_exists('goal_3', $obj_answers) ? $obj_answers['goal_3'] : 0;
        $obj_answers['goal_improve_digestion'] = array_key_exists('goal_4', $obj_answers) ? $obj_answers['goal_4'] : 0;
        $obj_answers['goal_improve_metabolism'] = array_key_exists('goal_5', $obj_answers) ? $obj_answers['goal_5'] : 0;
        $obj_answers['goal_burn_fat_for_energy'] = array_key_exists('goal_6', $obj_answers) ? $obj_answers['goal_6'] : 0;
        $obj_answers['goal_improve_chronic_conditions'] = array_key_exists('goal_7', $obj_answers) ? $obj_answers['goal_7'] : 0;
        $obj_answers['goal_get_into_ketosis_quickly'] = array_key_exists('goal_8', $obj_answers) ? $obj_answers['goal_8'] : 0;

        $obj_answers['nomeat'] = $obj_answers['no_meat'];
        $obj_answers['brussels_sprouts'] = $obj_answers['brussel_sprout'];
        $obj_answers['foods_craved'] = "";
        if (array_key_exists('q_craving1', $obj_answers)) {
            if ($obj_answers['q_craving1'] == "0") {
                $obj_answers['foods_craved'] = "Carbs E.g. Bread, Pasta, Rice, Fried Foods";
            } else if ($obj_answers['q_craving1'] == "1") {
                $obj_answers['foods_craved'] = "Sweets E.g. Candy, Chocolate, Ice Cream, Cake";
            } else if ($obj_answers['q_craving1'] == "2") {
                $obj_answers['foods_craved'] = "Red Meat E.g. Burgers Or A Steak";
            } else if ($obj_answers['q_craving1'] == "3") {
                $obj_answers['foods_craved'] = "No Cravings";
            }
        }
        $obj_answers['afflictions'] = "";
        if (array_key_exists('q_symptom', $obj_answers)) {
            if ($obj_answers['q_symptom'] == "0") {
                $obj_answers['afflictions'] = "Excessive Thirst";
            } else if ($obj_answers['q_symptom'] == "1") {
                $obj_answers['afflictions'] = "Frequent Urination";
            } else if ($obj_answers['q_symptom'] == "2") {
                $obj_answers['afflictions'] = "Blurry Vision";
            } else if ($obj_answers['q_symptom'] == "3") {
                $obj_answers['afflictions'] = "None";
            }
        }
        $obj_answers['problems'] = "";
        if (array_key_exists('q_symptom1', $obj_answers)) {
            if ($obj_answers['q_symptom1'] == "0") {
                $obj_answers['problems'] = "Swollen Legs, Ankles, Or Feet";
            } else if ($obj_answers['q_symptom1'] == "1") {
                $obj_answers['problems'] = "Skin Rashes Or Flare Ups";
            } else if ($obj_answers['q_symptom1'] == "2") {
                $obj_answers['problems'] = "Depression Or Feeling Isolated";
            } else if ($obj_answers['q_symptom1'] == "3") {
                $obj_answers['problems'] = "None";
            }
        }
        $obj_answers['childbirth'] = '0';
        $obj_answers['injury'] = '0';
        $obj_answers['major_weight_gain'] = '0';
        $obj_answers['major_weight_loss'] = '0';
        $obj_answers['menopause'] = '0';
        $obj_answers['andropause'] = '0';

        if ($obj_answers['gender'] == '0' && $obj_answers['q_recent_changes'] == '0') {
            $obj_answers['childbirth'] = '1';
        } else if ($obj_answers['gender'] == '1' && $obj_answers['q_recent_changes'] == '0') {
            $obj_answers['injury'] = '1';
        } else if ($obj_answers['q_recent_changes'] == '1') {
            $obj_answers['major_weight_gain'] = '1';
        } else if ($obj_answers['q_recent_changes'] == '2') {
            $obj_answers['major_weight_loss'] = '1';
        } else if ($obj_answers['gender'] == '0' && $obj_answers['q_recent_changes'] == '3') {
            $obj_answers['menopause'] = '1';
        } else if ($obj_answers['gender'] == '1' && $obj_answers['q_recent_changes'] == '3') {
            $obj_answers['andropause'] = '1';
        }

        if (array_key_exists('version', $obj_answers) && $obj_answers['version'] == "fastspring") {
            $quiz['funnel'] = 'trial';
        }


        $mergedemaildata = array_merge($emaildata, $obj_answers);
        $mergedemaildata = array_merge($emaildata, $obj_additional);

        // merge end
        //result is either 'ok' for success or returns error text
        $result_email = $emailcontrol->process_user($mergedemaildata);

        return $result_email;
    }

}

?>