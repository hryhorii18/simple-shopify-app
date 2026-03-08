<?php
file_put_contents("debug.log", "Callback: ".$_SERVER['REQUEST_URI']."\n", FILE_APPEND);


require 'config.php';
require 'curl.php';

$shop = $_GET['shop'];
$code = $_GET['code'];

$data = [
    "client_id" => SHOPIFY_API_KEY,
    "client_secret" => SHOPIFY_API_SECRET,
    "code" => $code
];
//var_dump($data); die();

$response = curl_request(
    "https://$shop/admin/oauth/access_token",
    "POST",
    ["Content-Type: application/json"],
    json_encode($data)
);
//curl_close($ch);

$responseData = json_decode($response, true);

$access_token = $responseData['access_token'];
file_put_contents("db.json", json_encode([
    "shop" => $shop,
    "token" => $access_token
]));

header("Location: /app.php?shop=$shop");
exit;

/* Example API Request */
//$ch = curl_init("https://$shop/admin/api/2023-10/products.json");
//
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_HTTPHEADER, [
//    "X-Shopify-Access-Token: $access_token"
//]);
//
//$products = curl_exec($ch);
//curl_close($ch);
//
//echo "<h2>Products from store</h2>";
//echo "<pre>";
//print_r(json_decode($products, true));
//echo "</pre>";

?>