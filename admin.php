<?php
/* 此部分源码使用deepseek制作，凑合着用，有条件的可以自行美化 */

// 配置
$users = ['admin' => '123456789']; // 用户名 => 密码
$upload_dir = 'f/'; // 读取的目录
if (!file_exists($upload_dir)) mkdir($upload_dir);

// 启动会话
session_start();

// 处理登录
if (isset($_POST['login'])) {
    if ($users[$_POST['username']] == $_POST['password']) {
        $_SESSION['user'] = $_POST['username'];
    } else {
        $error = '用户名或密码错误';
    }
}

// 处理登出
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ?');
    exit;
}

// 处理文件上传
if (isset($_FILES['file']) && isset($_SESSION['user'])) {
    $file = $_FILES['file'];
    if ($file['error'] == 0) {
        move_uploaded_file($file['tmp_name'], $upload_dir . $file['name']);
        $msg = '上传成功: ' . htmlspecialchars($file['name']);
    }
}

// 处理文件删除
if (isset($_GET['delete']) && isset($_SESSION['user'])) {
    $file_to_delete = $upload_dir . basename($_GET['delete']);
    if (file_exists($file_to_delete)) {
        unlink($file_to_delete);
        $msg = '文件已删除: ' . htmlspecialchars($_GET['delete']);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial; max-width: 90%; margin: auto; padding: 20px; }
        form { margin: 20px 0; }
        .msg { color: green; margin: 10px 0; }
        .error { color: red; }
        .file-list { margin-top: 20px; }
        .file-item { display: flex; justify-content: space-between; margin: 5px 0; }
        .delete-btn { color: red; text-decoration: none; }
        .text { padding: 8px; border:1px solid #000; width: 220px; }
    </style>
</head>
<body>

<?php if (!isset($_SESSION['user'])): ?>
    <h2>登录</h2>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="post">
        用户: <input class="text" type="text" name="username" required><br/><br/>
        密码: <input class="text" type="password" name="password" required><br/><br/>
        <button type="submit" name="login">登录</button>
    </form>

<?php else: ?>
    <h2>文件上传 <small>(<?= $_SESSION['user'] ?>)</small></h2>
    <a href="?logout">退出</a>
    
    <?php if (isset($msg)) echo "<p class='msg'>$msg</p>"; ?>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">上传</button>
    </form>
    
    <div class="file-list">
        <h3>已上传文件:</h3>
        <?php foreach (scandir($upload_dir) as $file): ?>
            <?php if ($file != '.' && $file != '..'): ?>
                <div class="file-item">
                    <a href="<?= $upload_dir.$file ?>" target="_blank"><?= $file ?></a>
                    <a href="?delete=<?= urlencode($file) ?>" class="delete-btn" 
                       onclick="return confirm('确定要删除 <?= htmlspecialchars($file) ?> 吗？')">删除</a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

</body>
</html>