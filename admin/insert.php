<?php
//これはほぼテンプレです🤗

//1. POSTデータ取得
$name = $_POST['name'];
$url = $_POST['url'];
$comment = $_POST['comment'];

//2. DB接続します
//DBに接続するおまじない🤗
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
//SQL文を用意
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, name, url, comment, date)VALUES(NULL, :name, :url, :comment, sysdate())" );
//バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
//実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  sql_error($stmt);
} else {
  redirect('index.php');
}

?>
