<?php 
session_start(); // セッション開始
include("funcs.php");
sschk();          // ログインチェック

// DB接続
$pdo = db_conn();

// データ取得SQL
$sql = "SELECT * FROM gs_profile_table ORDER BY indate DESC";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ表示部分
$view = "";
if ($status === false) {
    sql_error($stmt);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<div class="profile-card">';
        $view .= '<h2>' . h($result['name']) . '</h2>';
        $view .= '<p><strong>Email:</strong> ' . h($result['email']) . '</p>';
        $view .= '<p><strong>専門分野:</strong> ' . h($result['skill']) . '</p>';
        $view .= '<p><strong>経験年数:</strong> ' . h($result['experience']) . '年</p>';
        $view .= '<p><strong>スキルアピール:</strong><br>' . h($result['appeal']) . '</p>';
        $view .= '<p><em>登録日: ' . h($result['indate']) . '</em></p>';
        
        // 管理者（kanri_flg = 1）のみ更新・削除リンクを表示
        if ($_SESSION['kanri_flg'] == 1) { 
            $view .= '<a class="btn-update" href="detail.php?id=' . h($result['id']) . '">[更新]</a>';
            $view .= '<a class="btn-delete" href="delete.php?id=' . h($result['id']) . '">[削除]</a>';
        }
        $view .= '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>COOPROメンバー一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <nav>
        <div class="container">
            <div class="navbar-header">
                <!-- メンバー登録ボタン -->
                <a class="navbar-brand" href="index.php">サービス利用申請フォーム</a>

                <!-- ログアウトボタン -->
                <a class="btn-logout" href="logout.php">ログアウト</a>
            </div>
        </div>
    </nav>
</header>

<main>
    <section class="member-list">
        <h1>メンバー一覧</h1>
        <div class="profiles">
            <?= $view ?>
        </div>
    </section>
</main>

<footer>
    <p>© 2024 COOPRO. All rights reserved.</p>
</footer>
</body>
</html>
