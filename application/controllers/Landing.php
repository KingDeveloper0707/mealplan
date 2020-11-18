<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function index() {

        $whitelist_ip = array(
            '193.116.111.202',
            '121.218.80.156',
            '139.216.211.197',
            '78.109.18.227',
            '180.181.60.202',
            '134.209.52.181',
            '127.0.0.1', '::1');

        if (getenv('HTTP_X_FORWARDED_FOR')) {
            $pipaddress = getenv('HTTP_X_FORWARDED_FOR');
            $ipaddress = getenv('REMOTE_ADDR');
            //echo "Your Proxy IP address is : ".$pipaddress. " (via $ipaddress) " ;
        } else {
            $ipaddress = getenv('REMOTE_ADDR');
            //echo "Your IP address is : $ipaddress";
        }
        $country = getenv('GEOIP_COUNTRY_NAME');
        $country_code = getenv('GEOIP_COUNTRY_CODE');
        //echo "<br/>Your country : $country ( $country_code ) ";
        if (
                $country_code != "US" && strpos(base_url(), '/esc') === false &&
                $country_code != "US" && strpos(base_url(), '/fastspring') === false &&
                !(isset($_GET['visit']) && $_GET['visit'] == "admin") &&
                !in_array($ipaddress, $whitelist_ip)
        ) {
            redirect('https://simpleketosystem.com/esc', 'refresh');
        } else {
            $this->load->view('header');
            $this->load->view('landing');
            $this->load->view('footer.php');
        }
    }

}
