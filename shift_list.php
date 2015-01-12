<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>シフト一覧表示</title>
</head>
<body>
  <h1>シフト一覧表示</h1>
  <table border="1">
    <tr><th>番号</th><th>日付</th><th>出勤</th><th>氏名</th></tr>
  <?php

  // データベースサーバーに接続
  $con = mysql_connect("localhost","root","");
  if (!$con )  die("データベース接続エラー: " . mysql_error());

  // データベースの選択
  $r = mysql_select_db("shift_db",$con);
  if (!$r )  die("データベース選択エラー: " . mysql_error());

  // シフトテーブルの読み込み
  $sql =  "select shift_num,date,shift_mode,name from ".
            "shift_tbl, member_tbl ".
            "where shift_tbl.member_num=member_tbl.member_num ".
            "order by date,shift_mode";
  $r   = mysql_query($sql,$con);
  if (!$r )  die("シフトテーブル読込エラー: " . mysql_error());

  // シフトテーブルの一覧表示
  $maxrows = mysql_num_rows($r);
  for ($i=0; $i < $maxrows; $i++) {
    $row = mysql_fetch_row($r);
    $shift = ($row[2]==1) ? "早番" : "遅番" ;
    echo  "<tr>".
            "<td>$row[0]</td>". // 番号
            "<td>$row[1]</td>". // 日付
            "<td>$shift</td>".  // 出勤
            "<td>$row[3]</td>". // 氏名
          "</tr>";
  }

  // データベースサーバーから切断
  mysql_close($con);

  ?>
  </table>
  <p><a href="index.html">トップページに戻る</a></p>
</body>
</html>
