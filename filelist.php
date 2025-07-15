<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
<title>位于 ./f/ 文件夹中的文件</title>
<h1>位于 ./f/ 文件夹中的文件</h1>
<?php
$dir = 'f';
$contents = scandir($dir);
foreach ($contents as $item) {
    if ($item == '.' || $item == '..') {
        continue;
    }
    $filePath = $dir . '/' . rawurlencode($item);
    echo '<p><a href="' . htmlspecialchars($filePath) . '" target="_blank">' . htmlspecialchars($item) . '</a></p>';
}
?>