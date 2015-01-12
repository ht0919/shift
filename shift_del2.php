<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>シフト削除</title>
</head>
<body>
  <h1>シフト削除</h1>
  <?php

  //クライアントから渡されたデータを取得
  $shift_num = $_POST["shift_num"];
  if ($shift_num == NULL)	die("シフト番号を入力してください");

  // データベースサーバーに接続
  $con = mysql_connect("localhost","root","");
  if (!$con )  die("データベース接続エラー: " . mysql_error());

  // データベースの選択
  $r = mysql_select_db("shift_db",$con);
  if (!$r )  die("データベース選択エラー: " . mysql_error());

  // シフトの削除
  $sql = "delete from shift_tbl where shift_num=$shift_num;";
  $r = mysql_query($sql,$con);
  if (!$r )  die("シフト削除エラー: " . mysql_error());

  // データベースサーバーから切断
  mysql_close($con);

  echo "<p>シフトを削除しました。</p>";

  ?>
  <p><a href="index.html">トップページに戻る</a></p>
</body>
</html>
