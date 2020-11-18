<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Subscription_model extends CI_Model {

//    protected $_tablename = 'quiz';

    function __construct() {
        parent::__construct();
    }

    function get_all() {
        $this->db->get('test_subscription');
    }

    function get($id) {
        $this->db->get_where('test_product', array('id' => $id));
    }

    function insert_subscription($subscription_id, $customer_id, $product_id, $recharge_customer_id, $status_id, $next_charge_scheduled_at, $fs_account_id = NULL) {
        $data = array(
            'id' => $subscription_id,
            'customer_id' => $customer_id,
            'product_id' => $product_id,
            'recharge_customer_id' => $recharge_customer_id,
            'status_id' => $status_id,
            'next_charge_scheduled_at' => $next_charge_scheduled_at,
            'fs_account_id' => $fs_account_id
        );
        $this->db->insert('test_subscription', $data);
        $rows = $this->db->affected_rows();
        if ($rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function delete($id) {
        $this->db->delete('test_product', array('id' => $id));
    }

    function check_upgradable_by_customer_id($customer_id) {
        $upgradable = false;
        $query = $this->db->select('test_subscription.id')
                ->from('test_subscription')
                ->join('test_product', 'test_subscription.product_id = test_product.id')
                ->where('test_subscription.customer_id', $customer_id)
                ->where('test_subscription.status_id', 1)
                ->where('test_product.is_subscription', true)
                ->order_by('test_subscription.update_time', 'DESC')
                ->limit(1)
                ->get();
        if ($query->num_rows() == 0) {
            $upgradable = true;
        }

        $query = $this->db->select('test_checkout.id, test_checkout.create_time')
                ->from('test_checkout')
                ->join('test_product', 'test_checkout.product_id = test_product.id')
                ->where('test_product.is_subscription', false)
                ->where('test_product.weeknum', 52)                
//                ->where('DATEDIFF(NOW(), test_checkout.create_time) < 364')
//                ->where('DATEDIFF(NOW(), test_checkout.create_time) > 336')
                ->where('test_checkout.customer_id', $customer_id)
                ->order_by('test_checkout.create_time', 'DESC')
                ->limit(1)
                ->get();
        if ($query->num_rows() > 0) {

            $diff_days = abs(round((strtotime('now') - strtotime($query->row()->create_time)) / 86400));
            if ($diff_days >= 0 && $diff_days < 336) {
                $upgradable = false;
            } else if ($diff_days >= 336 && $diff_days <= 364) {
                $upgradable = true; //can buy another 12m_ss
            } else if ($diff_days > 364) {
                $upgradable = true; //can upgrade to 1m_sub
            }
        }

        return $upgradable;
    }

    function get_upgrade_obj_by_customer_id($customer_id) {
        $obj_return = new stdClass();

        $upgradable = false;
        $upgrade_date = null;
        $weeknum = 0;
        $is_subscription = false;

        $query = $this->db->select('test_subscription.id, test_subscription.product_id, test_product.weeknum, test_subscription.next_charge_scheduled_at')
                ->from('test_subscription')
                ->join('test_product', 'test_subscription.product_id = test_product.id')
                ->where('test_subscription.customer_id', $customer_id)
                ->where('test_subscription.status_id', 1)
                ->where('test_product.is_subscription', true)
                ->order_by('test_subscription.update_time', 'DESC')
                ->limit(1)
                ->get();
        if ($query->num_rows() == 0) {
            $upgradable = true; //can upgrade to 1m_sub
            $weeknum = 4;
            $is_subscription = true;
            $upgrade_date = null;

            //check if it's 0~28days -> 1m_sub upgrade
            $query = $this->db->select('DATE_ADD(test_checkout.create_time, INTERVAL test_product.weeknum WEEK) as upgrade_date')
                    ->from('test_checkout')
                    ->join('test_product', 'test_checkout.product_id = test_product.id')
                    ->where('test_checkout.customer_id', $customer_id)
                    ->where('test_product.is_subscription', false)
                    ->where('test_product.weeknum', 4)
                    ->where('DATEDIFF(NOW(), test_checkout.create_time) < 28')
                    ->where('DATEDIFF(NOW(), test_checkout.create_time) >= 0')
                    ->order_by('test_checkout.create_time', 'DESC')
                    ->limit(1)
                    ->get();
            if ($query->num_rows() > 0) {
                $upgrade_date = $query->row()->upgrade_date;
            }
        }

        $query = $this->db->select('test_checkout.id, test_checkout.create_time')
                ->from('test_checkout')
                ->join('test_product', 'test_checkout.product_id = test_product.id')
                ->where('test_product.is_subscription', false)
                ->where('test_product.weeknum', 52)
//                ->where('DATEDIFF(NOW(), test_checkout.create_time) < 364')
//                ->where('DATEDIFF(NOW(), test_checkout.create_time) > 336')
                ->order_by('test_checkout.create_time', 'DESC')
                ->limit(1)
                ->get();
        if ($query->num_rows() > 0) {
            $create_time = $query->row()->create_time;
            $diff_days = abs(round((strtotime('now') - strtotime($create_time)) / 86400));
            if ($diff_days >= 0 && $diff_days < 336) {
                $upgradable = false;
            } else if ($diff_days >= 336 && $diff_days <= 364) {
                $upgradable = true; //can buy another 12m_ss
                $weeknum = 52;
                $is_subscription = false;
                $upgrade_date = Date('Y-m-d H:i:s', strtotime($create_time . "+364 day"));
            } else if ($diff_days > 364) {
                $upgradable = true; //can upgrade to 1m_sub
                $weeknum = 4;
                $is_subscription = true;
                $upgrade_date = null;
            }
        }

        $obj_return->upgradable = $upgradable;
        $obj_return->upgrade_date = $upgrade_date;
        $obj_return->weeknum = $weeknum;
        $obj_return->is_subscription = $is_subscription;
        
        return $obj_return;
    }

    function get_id_by_customer_id($customer_id) {
        $subscription_id = null;
        $query = $this->db->select('id')
                ->where('customer_id', $customer_id)
                ->get('test_subscription');
        if ($query->num_rows() > 0) {
            $subscription_id = $query->row()->id;
        }
        return $subscription_id;
    }

    function update_product_id($subscription_id, $product_id) {
        $this->db->set('product_id', $product_id)->where('id', $subscription_id)->update('test_subscription');
    }

    function get_recharge_customer($cid) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.rechargeapps.com/customers/' . $cid,
            CURLOPT_HTTPHEADER => array(
                'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
                'Accept: application/json',
                'Content-Type: application/json'),
        ]);
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    function upgrade($sid, $product_title, $expire_date = null) {
        
        $today = date('Y-m-d H:i:s');

        $order_interval_unit = 'day'; //day
        $variant_title = 'Default Title'; //optional

        if ($product_title && $product_title == "Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew") {
            $shopify_variant_id = '30306821013622';
            if ($expire_date) {
                $newDate = Date('Y-m-d H:i:s', strtotime($expire_date . "+0 day"));
            } else {
                $newDate = Date('Y-m-d H:i:s', strtotime($today . "+364 day"));
            }
            $order_interval_frequency = '364';
            $price = '118.00'; //
            $sku = 'KCMP12'; //
        } else if ($product_title && $product_title == "Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew") {
            $shopify_variant_id = '31047834009718';
            if ($expire_date) {
                $newDate = Date('Y-m-d H:i:s', strtotime($expire_date . "+0 day"));
            } else {
                $newDate = Date('Y-m-d H:i:s', strtotime($today . "+84 day"));
            }
            $order_interval_frequency = '84';
            $price = '68.00'; //
            $sku = 'KCMP3U'; //
        } else if ($product_title && $product_title == "Custom Keto Meal Plan - 1 Month Auto Renew") {
            $shopify_variant_id = '22500030775414';
            if ($expire_date) {
                $newDate = date('Y-m-d H:i:s', strtotime($expire_date . ' +0 day'));
            } else {
                $newDate = date('Y-m-d H:i:s', strtotime($today . ' +28 day'));
            }
            $order_interval_frequency = '28';
            $price = '39.00'; //
            $sku = 'KCMP1'; //    
        }
        $charge_interval_frequency = $order_interval_frequency;
        $next_charge_scheduled_at = $newDate;

        $data = array(
            'shopify_variant_id' => $shopify_variant_id,
            'next_charge_scheduled_at' => $next_charge_scheduled_at,
            'next_charge_scheduled_at' => $next_charge_scheduled_at,
            'order_interval_frequency' => $order_interval_frequency,
            'order_interval_unit' => $order_interval_unit,
            'charge_interval_frequency' => $charge_interval_frequency,
            'product_title' => $product_title,
//    'variant_title' => $variant_title,
            'price' => $price,
            'sku' => $sku,
        );
        $strData = json_encode($data);

        $tempdata = $data;
        $tempdata['sid'] = $sid;
        file_put_contents("api_update_product_log.txt", json_encode($tempdata) . PHP_EOL, FILE_APPEND);


        $curl = curl_init();
        curl_setopt_array($curl, [
            //CURLOPT_PUT => 1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.rechargeapps.com/subscriptions/' . $sid,
            CURLOPT_HTTPHEADER => array(
                'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
                'Accept: application/json',
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => $strData
        ]);

        $resp = curl_exec($curl);
        echo "Subscription Swap has been called successfully<br />" . $resp . "<br />";
        curl_close($curl);
    }
    
    function update_status($subscription_id, $status_id) {
        $this->db->set('status_id', $status_id)->where('id', $subscription_id)->update('test_subscription');
    }

    function cancel($id) {
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.rechargeapps.com/subscriptions/' . $id . '/cancel',
            CURLOPT_HTTPHEADER => array(
                'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
                'Accept: application/json',
                'Content-Type: application/json'),
            CURLOPT_POSTFIELDS => '{"cancellation_reason":"other reason"}'
        ]);
        $resp = curl_exec($curl);
        curl_close($curl);
    }

    function downgrade($id, $next_charge_scheduled_at) {
        
        $today = date('Y-m-d H:i:s');
        $order_interval_unit = 'day'; //day
        $product_title = 'Custom Keto Meal Plan - 1 Month Auto Renew';
        $variant_title = 'Default Title'; //optional
        $shopify_variant_id = '29462149300342'; //'22500030775414';
        $next_charge_scheduled_at = Date('Y-m-d H:i:s', strtotime("+28 days", strtotime($next_charge_scheduled_at)));
        $order_interval_frequency = '28';
        $price = '39.00'; //
        $sku = 'KCMP1'; //    
        $charge_interval_frequency = $order_interval_frequency;


        $data = array(
            'shopify_variant_id' => $shopify_variant_id,
            'next_charge_scheduled_at' => $next_charge_scheduled_at,
            'order_interval_frequency' => $order_interval_frequency,
            'order_interval_unit' => $order_interval_unit,
            'charge_interval_frequency' => $charge_interval_frequency,
            'product_title' => $product_title,
            //    'variant_title' => $variant_title,
            'price' => $price,
            'sku' => $sku,
        );
        $strData = json_encode($data);


        $curl = curl_init();
        curl_setopt_array($curl, [
            //CURLOPT_PUT => 1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.rechargeapps.com/subscriptions/' . $id,
            CURLOPT_HTTPHEADER => array(
                'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
                'Accept: application/json',
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => $strData
        ]);

        $resp = curl_exec($curl);
        echo "Subscription Swap has been called successfully<br />" . $resp . "<br />";
        curl_close($curl);
    }

}

?>