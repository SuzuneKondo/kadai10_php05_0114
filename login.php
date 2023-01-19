<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    <title>ログイン</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <ul class="container-fluid">
                <li class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録画面へ</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <h3 class="syosai-title">ログイン画面</h3>
        <!-- login_act.php は認証処理用のPHP -->
        <form action="login_act.php" method="post">
            <table class="form-wrapper">
                <tr>
                    <th>
                        <div class="form-name">ID:</div> 
                    </th>
                    <td><input type="text" name="lid"></td>
                </tr>
                <tr>
                    <th>
                        <div class="form-name">パスワード:</div> 
                    </th>
                    <td><input type="password" name="lpw"></td>
                </tr>
            </table>
            <div class="buttons">
                <input type="submit" value="LOGIN" class="btn-submit">
            </div>
        </form>

        <h3 class="syosai-title">初めて登録する方はこちら</h3>
        <form action="login_new.php" method="post">
            <table class="form-wrapper">
                <tr>
                    <th>
                        <div class="form-name">お名前:</div> 
                    </th>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <th>
                        <div class="form-name">ID:</div> 
                    </th>
                    <td><input type="text" name="lid"></td>
                </tr>
                <tr>
                    <th>
                        <div class="form-name">パスワード:</div> 
                    </th>
                    <td><input type="password" name="lpw"></td>
                </tr>
            </table>
            <div class="buttons">
                <input type="submit" value="登録する" class="btn-submit">
            </div>
        </form>
    </main>
</body>

</html>
