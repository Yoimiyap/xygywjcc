<?php
$ym =$_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html>
<title>随机文件api文档 - 小永高吖的文件存储空间(<?php echo "$ym"; ?>)</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
<head>
</head>
<body>
<h1>随机文件api文档</h1>
<p><b>接口地址：https://<?php echo "$ym"; ?>/sjwjapi.php</b></p>
<p><b>调用方法：</b><br/>
直接访问即可，可加type参数指定文件格式<br/>
例如 ?type=mp4 就是返回格式为mp4的视频文件<br/>
可以指定多个，用英文逗号分隔<br/>
例如 ?type=jpg,png 就是返回格式为jpg和png的图片文件</p>
</body>
</html>