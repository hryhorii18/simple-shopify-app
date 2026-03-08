<?php
file_put_contents("debug.log", "INSTALL: ".$_SERVER['REQUEST_URI']."\n", FILE_APPEND);


require 'config.php';

$shop = $_GET['shop'];
//var_dump($shop); die();

$db = json_decode(file_get_contents("db.json"), true);

if ($db && $db['shop'] == $shop) {
    header("Location: /app.php?shop=$shop");
    exit;
}

$install_url = "https://$shop/admin/oauth/authorize?" . http_build_query([
        "client_id" => SHOPIFY_API_KEY,
        "scope" => SCOPES,
        "redirect_uri" => REDIRECT_URI
    ]);

header("Location: " . $install_url);
exit;

?>