<?php
header("Content-Security-Policy: frame-ancestors https://admin.shopify.com https://*.shopify.com;");

define('SHOPIFY_API_KEY', 'ce1352f7ff667ef83a868e3b217af296');
define('SHOPIFY_API_SECRET', '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');
define('SCOPES', 'read_products');
define('REDIRECT_URI', 'https://appcraft.kesug.com/callback.php');

//$apiKey = "ce1352f7ff667ef83a868e3b217af296";
//$apiSecret = "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";
//$scopes = "read_orders";
//$appUrl = "https://appcraft.kesug.com";

?>