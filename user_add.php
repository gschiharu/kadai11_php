<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規ユーザー登録</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>新規ユーザー登録</h1>
    </header>

    <main class="registration-form">
        <form action="user_add_act.php" method="post">
            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" id="name" name="name" placeholder="ユーザー名" required>
            </div>
            <div class="form-group">
                <label for="lid">メールアドレス（ログインID）</label>
                <input type="email" id="lid" name="lid" placeholder="example@domain.com" required>
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="パスワード" required>
            </div>
            <button type="submit">登録</button>
        </form>
    </main>

    <footer>
        <p>© 2024 COOPRO. All rights reserved.</p>
    </footer>
</body>
</html>
