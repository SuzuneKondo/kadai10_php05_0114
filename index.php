<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/reset.css" rel="stylesheet">
    <title>データ登録</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-default">
            <ul class="container-fluid">
                <li class="navbar-header"><a class="navbar-brand" href="select.php">絵本リストへ</a></li>
                <li class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></li>
                <li class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="post" action="insert.php" enctype="multipart/form-data">
            <div class="box-flame">
                <h1 class="form-title">絵本の記録</h1>
                <h2 class="sub-title">３歳までに１万冊への道</h2>
                <div class="data-table">
                  <div class='text-danger'>    
                    <?php if (isset($_GET['error'])) : ?>
                    <p>本の名前を入力してください。</p>
                    <?php endif ?>
                  </div>
                    <table class="form-wrapper">
                        <tr>
                            <th>
                                <div class="form-name">名前：</div> 
                            </th>
                            <td><input type="text" name="name" id="txt-box" placeholder=""></td>
                            <!-- // もしURLパラメータがある場合 -->
                        </tr>
                        <tr>
                            <th>
                                <div class="form-name">URL：</div> 
                            </th>
                            <td><input type="text" name="url" id="txt-box" placeholder=""></td>
                        </tr>
                        <tr>
                            <th>
                                <div class="form-name">感想：</div> 
                            </th>
                            <td><textArea type="text" name="comment" rows="4" cols="40" id=""></textarea></td>
                        </tr>
                        <tr>
                             <th>
                                <div class="form-name">画像：</div> 
                            </th>
                            <td><input type="file" name="img"></td>
                        </tr>
                    </table>
                </div>
                <div class="buttons">
                    <input type="submit" value="送信" class="btn-submit">
                    <input type="reset" value="リセット" class="btn-reset">
                </div>
            </div>
        </form>
    </main>

</body>

</html>
