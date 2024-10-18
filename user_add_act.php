<?php
session_start();
require_once('funcs.php');

// POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['lid'];
$password = $_POST['password'];

// パスワードをハッシュ化
$lpw = password_hash($password, PASSWORD_DEFAULT);

// DB接続
$pdo = db_conn();

// データ登録SQL作成
$sql = "INSERT INTO gs_user_table(name, lid, lpw, kanri_flg, life_flg) VALUES (:name, :lid, :lpw, 0, 0)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);

$status = $stmt->execute();

if ($status === false) {
    sql_error($stmt);
} else {
    redirect("login.php");
}
?>
