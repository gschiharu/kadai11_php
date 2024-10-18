<?php 
// 1. POSTデータ取得
$name = $_POST["name"];
$email = $_POST["email"];
$skill = $_POST["skill"];
$date = $_POST["date"];  // 修正：変数名を $experience から $date に変更
$appeal = $_POST["appeal"];

// 2. DB接続
include("funcs.php"); // funcs.php をインクルード
$pdo = db_conn();      // db_conn() で PDO オブジェクトを取得

// セッションは不要なため、以下の部分を削除
// session_start();
// sschk();        
// kanriCheck();   

// 3. データ登録SQL作成
$sql = "INSERT INTO u_profile_table(name, email, skill, date, appeal, indate)
        VALUES(:name, :email, :skill, :date, :appeal, sysdate())";
$stmt = $pdo->prepare($sql);

// 4. バインド変数に値をセット
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':skill', $skill, PDO::PARAM_STR);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);  // INT から STR に変更
$stmt->bindValue(':appeal', $appeal, PDO::PARAM_STR);

// 5. 実行
$status = $stmt->execute();

// 6. データ登録後の処理
if ($status === false) {
    sql_error($stmt);
} else {
    redirect("thanks.php");
}
?>
