<?php
    $data = "- checkout creation" . " at " . date('Y-m-d H:i:s') . "\n";
    $data .= json_encode(file_get_contents('php://input'));
    $data .= "\n";
    file_put_contents('./z_shopify_subscription_logs.txt', $data, FILE_APPEND);
    echo "success";
?>