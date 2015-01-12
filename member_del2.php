<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>メンバー削除</title>
</head>
<body>
  <h1>メンバー削除</h1>
  <?php

  //クライアントから渡されたデータを取得
  $member_num = $_POST["member_num"];
  if ($member_num == NULL)	die("登録番号を入力してください");

  // データベースサーバーに接続
  $con = mysql_connect("localhost","root","");
  if (!$con )  die("データベース接続エラー: " . mysql_error());

  // データベースの選択
  $r = mysql_select_db("shift_db",$con);
  if (!$r )  die("データベース選択エラー: " . mysql_error());

  // メンバーの削除
  $sql = "delete from member_tbl where member_num=$member_num;";
  $r = mysql_query($sql,$con);
  if (!$r )  die("メンバー削除エラー: " . mysql_error());

  // データベースサーバーから切断
  mysql_close($con);

  echo "<p>メンバーを削除しました。</p>";

  ?>
  <p><a href="index.html">トップページに戻る</a></p>
</body>
</html>
