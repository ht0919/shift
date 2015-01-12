<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>メンバー一覧表示</title>
</head>
<body>
  <h1>メンバー一覧表示</h1>
  <table border="1">
    <tr><th>登録番号</th><th>氏名</th></tr>
  <?php

  // データベースサーバーに接続
  $con = mysql_connect("localhost","root","");
  if (!$con )  die("データベース接続エラー: " . mysql_error());

  // データベースの選択
  $r = mysql_select_db("shift_db",$con);
  if (!$r )  die("データベース選択エラー: " . mysql_error());

  // メンバーテーブルの読み込み
  $sql = "select * from member_tbl";
  $r   = mysql_query($sql,$con);
  if (!$r )  die("メンバーテーブル読込エラー: " . mysql_error());

  // メンバーリストの一覧表示
  $maxrows = mysql_num_rows($r);
  for ($i=0; $i < $maxrows; $i++){
    $row = mysql_fetch_row($r);
    echo "<tr><td>$row[0]</td>"."<td>$row[1]</td></tr>";
  }

  // データベースサーバーから切断
  mysql_close($con);

  ?>
  </table>
  <p><a href="index.html">トップページに戻る</a></p>
</body>
</html>
