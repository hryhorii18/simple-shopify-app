<?php
file_put_contents("debug.log", "APP: ".$_SERVER['REQUEST_URI']."\n", FILE_APPEND);

$shop = $_GET['shop'];

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <script src="https://unpkg.com/@shopify/app-bridge"></script>
    <script src="https://unpkg.com/@shopify/app-bridge-utils"></script>

    <script>

        var AppBridge = window['app-bridge'];

        var app = AppBridge.createApp({
            apiKey: "ce1352f7ff667ef83a868e3b217af296",
            shopOrigin: "<?php echo $shop; ?>",
            forceRedirect: true
        });

    </script>

</head>

<body>

<h2>My Shopify PHP App</h2>

<p>App installed successfully 🎉</p>

</body>
</html>