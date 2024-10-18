<?php
session_start(); // セッション開始
require_once('funcs.php'); // 関数読み込み

// POSTで受け取ったユーザーIDとパスワードを取得
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

// DB接続
$pdo = db_conn();

// ユーザーIDに基づいてユーザー情報を取得
$sql = "SELECT * FROM gs_user_table WHERE lid = :lid AND life_flg = 0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

// SQL実行時のエラー処理
if ($status === false) {
    sql_error($stmt);
}

// 結果を取得
$val = $stmt->fetch();

// ユーザーが存在し、パスワードが正しい場合の処理
if ($val && password_verify($lpw, $val["lpw"])) {
    // セッションにユーザー情報を保存
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["name"]      = $val['name'];
    $_SESSION["kanri_flg"] = $val['kanri_flg'];

    // 管理者と一般ユーザーでリダイレクト先を切り替え
    if ($val["kanri_flg"] == 1) {
        redirect("member_index.php"); // 管理者はmember_index.phpへ
    } else {
        redirect("select.php"); // 一般ユーザーもselect.phpへ
    }
} else {
    // 認証失敗時は再度ログイン画面へ
    redirect("login.php");
}
?>

