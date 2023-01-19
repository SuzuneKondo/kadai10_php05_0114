<?php

session_start();
require_once('funcs.php');
loginCheck();

//XSS対策
//hにscriptで入力された時の悪さを防ぐ大事
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//1.  DB接続します
//DBに接続するおまじない🤗
//上記のrequre

//２．データ取得SQL作成//データを抜き出す部分
//抜き出すだけなのでバインド変数はいらない
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT*FROM gs_bm_table;");//用意
$status = $stmt->execute();//実行

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時に失敗してエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      //GETデータ送信リンク作成
      // <a>で囲う
      $view .= '<tr>';
      $view .= '<th class="ddd">';
      $view .= '<a href="' . $result['url'] . '">'. $result['name'] . '</a>';
      $view .= '</th>';
      $view .= '<th class="ddd">';
      $view .= $result['comment'];
      $view .= '</th>';

      $view .= '<th class="ddd">';
      $view .= '<img src="images/' . $result['img'] . '" alt="">';
      $view .= '</th>';

      $view .= '<th class="ddd">';
      $view .= '<a href="detail.php?id=' . $result['id'] . '">';
      $view .= '[修正]';
      $view .= '</a>';
      $view .= '</th>';

      $view .= '<th class="ddd" onclick="buttonClick()">';
      $view .= '<a href="delete.php?id=' . $result['id'] . '">';
      $view .= '[削除]';
      $view .= '</a>';
      $view .= '</th>';
      $view .= '</tr>';
    }
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/reset.css">
<title>ブックマーク一覧</title>
<script>

  function buttonClick(){
    alert('削除しました')
  }

</script>
</head>

<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <ul class="container-fluid">
      <li class="navbar-header"><a class="navbar-brand" href="index.php">データ登録画面へ</a></li>
    </ul>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<main>
  <h1 class="form-title">読んだ絵本リスト</h1>
  <div class="result-box-flame">
    <table border="1" class="result-flame">
      <tr>
          <th class="ttt" width="200px">名前</th>
          <th class="ttt">コメント</th>
          <th class="ttt">画像</th>
          <th class="ttt" width="40px">修正</th>
          <th class="ttt" width="40px">削除</th>
      </tr>
      <tr><?= $view ?></tr>
    </table>

  </div>
</main>
<!-- Main[End] -->

</body>
</html>
