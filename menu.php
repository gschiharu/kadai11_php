<?php
session_start();
include("funcs.php");
sschk(); // セッション確認
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>管理者メニュー</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1 class="navbar-brand">管理者メニュー</h1>
        <a class="btn-logout" href="logout.php">ログアウト</a>
    </header>
    
    <div class="admin-menu">
        <h2>管理機能</h2>
        <a href="admin_user_update.php" class="menu-button">ユーザー管理</a>
       <!-- 他の管理ページのリンク -->
        <!-- 必要に応じて他のメニュー項目を追加 -->
    </div>
    
    <footer>
        <p>&copy; 2024 COOPRO</p>
    </footer>
</body>
</html>
