<?php
$shop = $_GET['shop'];
echo "<h2>Simple Shopify PHP App</h2>";
echo "<form action='install.php' method='get'>
        <input type='text' name='shop' placeholder='store.myshopify.com' value='". $shop ."' required>
        <button type='submit'>Install App</button>
      </form>";
?>