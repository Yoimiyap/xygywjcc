<?php
// 配置部分
$targetDirectory = 'f/'; // 替换为你实际的目录路径

// 从URL参数获取要筛选的文件类型（支持逗号分隔的多个类型）
$requestedTypes = isset($_GET['type']) ? $_GET['type'] : '';
$fileTypes = array();

if (!empty($requestedTypes)) {
    // 处理类型参数：转换为小写，去除空格，分割为数组
    $fileTypes = array_map('trim', explode(',', strtolower($requestedTypes)));
    // 移除空值
    $fileTypes = array_filter($fileTypes);
}

// 检查目录是否存在
if (!is_dir($targetDirectory)) {
    header("HTTP/1.0 404 Not Found");
    die("指定的目录不存在: " . $targetDirectory);
}

// 获取目录中的所有文件（排除.和..）
$files = array_diff(scandir($targetDirectory), array('.', '..'));

// 筛选符合类型的文件
$validFiles = array();
foreach ($files as $file) {
    $filePath = $targetDirectory . $file;
    $fileExt = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    
    // 如果没有指定类型 或 文件扩展名在指定类型数组中
    if (is_file($filePath) && (empty($fileTypes) || in_array($fileExt, $fileTypes))) {
        $validFiles[] = $file;
    }
}

// 检查是否有可用的文件
if (empty($validFiles)) {
    header("HTTP/1.0 404 Not Found");
    $message = empty($fileTypes) 
        ? "没有此后缀的文件" 
        : "没有后缀为 " . implode(', ', $fileTypes) . " 的文件";
    die($message);
}

// 随机选择一个文件
$randomFile = $validFiles[array_rand($validFiles)];

// 构建完整的文件路径
$filePath = $targetDirectory . $randomFile;

// 执行跳转
header("Location: " . $filePath);
exit();
?>