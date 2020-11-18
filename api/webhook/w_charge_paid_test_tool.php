<!DOCTYPE html>
<html>
    <body>

        <form>
            Email Address: <input type="text" name="Email" value="" id="email"><br>
            First name: <input type="text" name="FirstName" value="" id="first_name"><br>
            Last name: <input type="text" name="LastName" value="" id="last_name"><br>
            <input type="submit" value="Submit" id="submit">
        </form>


        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script>
            $('#submit').click(function(e){
            e.preventDefault();
            var strData = '{"charge": {"address_id":36648662,"last_name":"Test318","subtotal_price":"19.0","shipping_lines":[],"sub_total":null,"updated_at":"2019-09-18T04:42:13","processor_name":"braintree","total_weight":0,"customer_hash":"325969250c136f1d4da526da","processed_at":"2019-09-18T04:42:13","id":181248493,"first_name":"Test318","discount_codes":[],"has_uncommited_changes":false,"note":null,"total_line_items_price":"19.00","customer_id":32596925,"type":"RECURRING","email":"tarasprystavskyj+Test318@hotmail.com","transaction_id":"a2xhgej5","scheduled_at":"2019-09-18T00:00:00","status":"SUCCESS","total_tax":0,"billing_address":{"province":"Washington","city":"Test318","first_name":"Test318","last_name":"Test318","zip":"98001","country":"United States","address1":"Test318","address2":"Test318","company":"","phone":""},"tax_lines":0,"tags":"Subscription, Subscription Recurring Order","shopify_order_id":null,"total_discounts":"0.0","line_items":[{"sku":"KCMP1","grams":0,"shopify_variant_id":"22500030775414","title":"Custom Keto Meal Plan - Auto Renew","price":"19.00","images":{"small":"https:\/\/cdn.shopify.com\/s\/files\/1\/0080\/9710\/3990\/products\/MealPlan_small.png","large":"https:\/\/cdn.shopify.com\/s\/files\/1\/0080\/9710\/3990\/products\/MealPlan_large.png","medium":"https:\/\/cdn.shopify.com\/s\/files\/1\/0080\/9710\/3990\/products\/MealPlan_medium.png","original":"https:\/\/cdn.shopify.com\/s\/files\/1\/0080\/9710\/3990\/products\/MealPlan.png"},"variant_title":"","subscription_id":50360999,"shopify_product_id":"2626232320118","properties":[{"name":"shipping_interval_unit_type","value":"Days"},{"name":"shipping_interval_frequency","value":"28"}],"quantity":1}],"total_price":"19.00","created_at":"2019-09-17T17:10:23","total_refunds":null,"note_attributes":null,"shipping_address":{"province":"Washington","city":"Test318","first_name":"Test318","last_name":"Test318","zip":"98001","country":"United States","address1":"Test318","address2":"Test318","company":"","phone":""},"client_details":{"user_agent":null,"browser_ip":null},"shipments_count":null}}';
            var objData = JSON.parse(strData);
            objData['charge']['email'] = $('#email').val();
            objData['charge']['first_name'] = $('#first_name').val();
            objData['charge']['last_name'] = $('#last_name').val();
//                console.log(objData);               
            strData = "";
            strData = JSON.stringify(objData);
            console.log(strData);
            $.ajax({
            type: "POST",
                    // url: 'http://localhost/simpleketosystem/api/webhook/w_charge_paid.php',
                    url: 'https://simpleketosystem.com/api/webhook/w_charge_paid.php',
                    data: strData,
                    contentType: "application/json",
                    success: function (resp) {
                    console.log(resp);
                    alert(resp);
                    },
                    error: function (xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText + ", Error: " + error;
                    alert('Error - ' + errorMessage);
                    }
            });
            });

        </script>


    </body>

</html>
