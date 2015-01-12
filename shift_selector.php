<?php

  // データベースサーバーに接続
  $con = mysql_connect("localhost","root","");
  if (!$con )  die("データベース接続エラー: " . mysql_error());

  // データベースの選択
  $r = mysql_select_db("shift_db",$con);
  if (!$r )  die("データベース選択エラー: " . mysql_error());

  // シフトテーブルの読み込み
  $sql ="select shift_num,date,shift_mode,name from ".
        "shift_tbl, member_tbl ".
        "where shift_tbl.member_num=member_tbl.member_num ".
        "order by date,shift_mode";
  $r   = mysql_query($sql,$con);
  if (!$r )  die("シフトテーブル読込エラー: " . mysql_error());

  // シフト選択肢の作成
  echo "<select name=\"shift_num\">";
  $maxrows = mysql_num_rows($r);
  for ($i=0; $i < $maxrows; $i++) {
    $row = mysql_fetch_row($r);
    $shift = ($row[2]==1) ? "早番" : "遅番" ;
    echo "<option value=\"$row[0]\">$row[1]/$shift/$row[3]</option>";
  }
  echo "</select>";

  // データベースサーバーから切断
  mysql_close($con);

?>
