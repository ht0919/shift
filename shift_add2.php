<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>シフト登録</title>
</head>
<body>
  <h1>シフト登録</h1>
  <?php

  //クライアントから渡されたデータを取得
  $date = $_POST["date"];
  if ($date == NULL)	die("日付を入力してください");
  $member_num = $_POST["member_num"];
  if ($member_num == NULL)	die("登録番号を入力してください");
  $shift_mode = $_POST["shift_mode"];
  if ($shift_mode == NULL)	die("時間帯を入力してください");

  // 数値データを数値化する
  $member_num = intval($_POST["member_num"]);
  $shift_mode = intval($_POST["shift_mode"]);

  // データベースサーバーに接続
  $con = mysql_connect("localhost","root","");
  if (!$con )  die("データベース接続エラー: " . mysql_error());

  // データベースの選択
  $r = mysql_select_db("shift_db",$con);
  if (!$r )  die("データベース選択エラー: " . mysql_error());

  // シフトの追加
  $sql = "insert into shift_tbl values(NULL,'$date',$shift_mode,$member_num);";
  $r = mysql_query($sql,$con);
  if (!$r )  die("シフト登録エラー: " . mysql_error());

  // データベースサーバーから切断
  mysql_close($con);

  echo "<p>シフトを登録しました。</p>";

  ?>
  <p><a href="index.html">トップページに戻る</a></p>
</body>
</html>
