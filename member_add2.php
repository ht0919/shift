<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>メンバー登録</title>
</head>
<body>
  <h1>メンバー登録</h1>
  <?php

  //クライアントから渡されたデータを取得
  $name = $_POST["name"];
  if ($name == NULL)	die("氏名を入力してください");

  // データベースサーバーに接続
  $con = mysql_connect("localhost","root","");
  if (!$con )  die("データベース接続エラー: " . mysql_error());

  // データベースの選択
  $r = mysql_select_db("shift_db",$con);
  if (!$r )  die("データベース選択エラー: " . mysql_error());

  // メンバーの追加
  $sql = "insert into member_tbl values(NULL,'$name');";
  $r = mysql_query($sql,$con);
  if (!$r )  die("メンバー登録エラー: " . mysql_error());

  // データベースサーバーから切断
  mysql_close($con);

  echo "<p>メンバーを登録しました。</p>";

  ?>
  <p><a href="index.html">トップページに戻る</a></p>
</body>
</html>
