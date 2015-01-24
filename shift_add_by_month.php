<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>シフト登録(月間)</title>
</head>
<body>
  <h1>シフト登録(月間)</h1>
  <?php
    $year  = date('Y'); // 今月の年を取得
    $month = date('n'); // 今月の月を取得
    echo "<h2>{$year}年{$month}月</h2>";
    $lastday = date('j', strtotime('last day of ')); // 今月の最終日を取得
  ?>
  <table border="1">
    <tr><th>日</th><th>曜</th><th>早番</th><th>遅番</th></tr>
    <?php
    // メンバーリストの作成
    $list = mk_member_list();
    $weekjp = array('日','月','火','水','木','金','土');
    for ($day=1; $day<=$lastday; $day++) {
      echo "<tr>";
        // 日と曜日の表示
        $timestamp = mktime(0, 0, 0, $month, $day, $year);
        $weekno = date('w', $timestamp);
        echo "<td>{$day}</td><td>$weekjp[$weekno]</td>";

        // メンバーリストの表示(早番)
        echo "<td>";
          echo "<select name=\"haya_{$day}\">";
          foreach ($list as $key => $value){
            echo "<option value=\"$key\">$value</option>";
          }
          echo "</select>";
        echo "</td>";

        // メンバーリストの表示(遅番)
        echo "<td>";
          echo "<select name=\"oso_{$day}\">";
          foreach ($list as $key => $value){
            echo "<option value=\"$key\">$value</option>";
          }
          echo "</select>";
        echo "</td>";

      echo "<tr>";
    }
  ?>
  </table>
  <p><a href="index.html">トップページに戻る</a></p>
</body>
</html>

<?php
function mk_member_list() {
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
  // メンバーリストの作成
  $maxrows = mysql_num_rows($r);
  $list = array();
  for ($i=0; $i < $maxrows; $i++) {
      $row = mysql_fetch_row($r);
      $list[$row[0]] = $row[1];
  }
  // データベースサーバーから切断
  mysql_close($con);
  return $list;
}
?>
