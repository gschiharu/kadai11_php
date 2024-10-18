<?php
session_start();

// セッションから管理フラグを取得
$kanri_flg = $_SESSION['kanri_flg'] ?? 0;

// 管理者でない場合はアクセス拒否
if ($kanri_flg != 1) {
    header('Location: select.php'); // トップページにリダイレクト
    exit('アクセス権限がありません。');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー管理</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>ユーザー管理ページ</h1>
<!-- ユーザー管理の内容をここに記載 -->

</body>
</html>
