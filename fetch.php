<?php

if(isset($_GET['url'])){

    $url = $_GET['url'];

    echo "<h3>Fetching: $url</h3><hr>";

    $response = file_get_contents($url);

    echo "<pre>";
    echo htmlspecialchars($response);
    echo "</pre>";
}

?>

<form method="GET">
    Enter URL to Fetch:
    <input type="text" name="url" style="width:300px;">
    <button type="submit">Fetch</button>
</form>
