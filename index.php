<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>メンバー登録</title>
  <link rel="stylesheet" href="css/style.css"> <!-- スタイルシートをリンク -->
</head>
<body>
  <!-- ヘッダー部分 -->
  <header>
    <nav>
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="select.php">メンバー一覧</a>
        </div>
      </div>
    </nav>
  </header>

  <!-- メイン部分 -->
  <main>
    <section class="registration-form">
      <h1>サービス利用申請フォーム</h1>
      <form method="POST" action="insert.php">
        <div class="form-group">
          <label for="name">名前：</label>
          <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email：</label>
          <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
          <label for="skill">依頼したいサービス：</label>
          <select name="skill" id="skill">
            <option value="プロジェクトマネージメント">プロジェクトマネージメント</option>
            <option value="通訳">通訳</option>
            <option value="翻訳">翻訳</option>
          </select>
        </div>

        <div class="form-group">
          <label for="date">予定しているサービス利用日時：</label>
          <input type="text" name="date" id="date" placeholder="例: 2024/10/20 14:00" required>
        </div>

        <div class="form-group">
          <label for="appeal">サービス依頼内容の詳細をご記入ください：</label>
          <textarea name="appeal" id="appeal" rows="4" cols="50" required></textarea>
        </div>
        <button type="submit">登録</button>
      </form>
    </section>
  </main>

  <!-- フッター部分 -->
  <footer>
    <p>© 2024 COOPRO. All rights reserved.</p>
  </footer>
</body>
</html>
