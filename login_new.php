<?php
session_start();

//これはほぼテンプレです🤗

//1. POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//2. DB接続します
//DBに接続するおまじない🤗
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
//SQL文を用意
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw)VALUES(NULL, :name, :lid, :lpw)");
//バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
//実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  sql_error($stmt);
} else {
  redirect('login.php');
}

?>
