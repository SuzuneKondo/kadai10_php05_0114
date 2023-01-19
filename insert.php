<?php
session_start();
require_once('funcs.php');
loginCheck();

//これはほぼテンプレです🤗

// //$_FILESの中に、投稿画像のデータが入っている。
// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';

//1. POSTデータ取得
$name = $_POST['name'];
$url = $_POST['url'];
$comment = $_POST['comment'];
$img = '';

// 簡単なバリデーション処理
if (trim($name) === '') {
  redirect('index.php?error');
}

// imgがある場合
if ($_FILES['img']['name'] !== "") {
  $file_name = $_SESSION['post']['file_name']= $_FILES['img']['name'];
  // 一時保存されているファイル内容を取得して、セッションに格納
  $image_data = $_SESSION['post']['image_data'] = file_get_contents($_FILES['img']['tmp_name']);
  // 一時保存されているファイルの種類を確認して、セッションにその種類に当てはまる特定のintを格納
  $image_type = $_SESSION['post']['image_type'] = exif_imagetype($_FILES['img']['tmp_name']);
} else {
  $file_name=$_SESSION['post']['file_name']='';
  $image_data = $_SESSION['post']['image_data'] = '';
  $image_type = $_SESSION['post']['image_type'] = '';
}

//DBに画像は保存しない。DBに保存するのは画像のアドレス
//ファイル名の重複を防ぐためにファイル名に年月日時間を追加します
//Macは書き込み権限変更必要！
if ($_SESSION['post']['image_data'] !== "")  {
  $img = date('YmdHis') . '_' . $_SESSION['post']['file_name'];
  file_put_contents("images/$img", $_SESSION['post']['image_data']);
}

//2. DB接続します
//DBに接続するおまじない🤗
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
//SQL文を用意
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, name, url, comment, img, date)VALUES(NULL, :name, :url, :comment, :img, sysdate())" );
//バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
//実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  sql_error($stmt);
} else {
  redirect('index.php');
}

?>
