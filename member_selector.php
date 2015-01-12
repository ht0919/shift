<?php

  // データベースサーバーに接続
  $con = mysql_connect("localhost","root","");
  if (!$con )  die("データベース接続エラー: " . mysql_error());

  // データベースの選択
  $r = mysql_select_db("shift_db",$con);
  if (!$r )  die("データベース選択エラー: " . mysql_error());

  // メンバーテーブルの読み込み
  $sql =  "select member_num,name from member_tbl";
  $r   = mysql_query($sql,$con);
  if (!$r )  die("メンバーテーブル読込エラー: " . mysql_error());

  // メンバー選択肢の作成
  echo "<select name=\"member_num\">";
  $maxrows = mysql_num_rows($r);
  for ($i=0; $i < $maxrows; $i++) {
    $row = mysql_fetch_row($r);
    echo "<option value=\"$row[0]\">$row[1]</option>";
  }
  echo "</select>";

  // データベースサーバーから切断
  mysql_close($con);

?>
