<?php
session_start();
require_once('funcs.php');
loginCheck();

$id = $_GET['id'];
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $result = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/reset.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">絵本リストへ</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="data-table">
            <table class="form-wrapper">
                <h3 class="syosai-title">修正したい箇所を入力し直す</h3>
                <tr>
                    <th>
                        <div class="form-name">名前：</div> 
                    </th>
                    <td><input type="text" name="name" value="<?= $result['name']?>"></td>
                </tr>
                <tr>
                    <th>
                        <div class="form-name">URL：</div> 
                    </th>
                    <td><input type="text" name="url" value="<?= $result['url']?>"></td>
                </tr>
                <tr>
                    <th>
                        <div class="form-name">感想：</div> 
                    </th>
                    <td><textarea name="comment" rows="4" cols="40"><?= $result['comment']?></textarea></td>
                </tr>
                <tr><input type="hidden" name="id" value="<?= $result['id']?>"></tr>
            </table>
            <div class="buttons">
                <input type="submit" value="修正する" class="btn-submit">
            </div>
        </div>
    </form>
</body>

</html>
