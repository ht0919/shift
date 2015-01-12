<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>シフト削除(期間指定)</title>
</head>
<body>
  <h1>シフト削除(期間指定)</h1>

  <?php	if (isset($_POST["delete"]) == "") { ?>

    <form method="POST" action="db_delete.php">
      削除開始日時：<input type="text" name="d1" value="<?php echo date("Y/m/d"); ?>"><br>
      削除終了日時：<input type="text" name="d2" value="<?php echo date("Y/m/d"); ?>"><br>
      <input type="submit" name="delete" value="削除実行"><br>
    </form>

  <?php } else {

    //クライアントから渡されたデータを取得
    $d1 = $_POST["d1"];
    if ($d1 == NULL)	die("削除開始日時を入力してください");
    $d2 = $_POST["d2"];
    if ($d2 == NULL)	die("削除終了日時を入力してください");

    // データベースサーバーに接続
    $con = mysql_connect("localhost","root","");
    if (!$con )  die("データベース接続エラー: " . mysql_error());

    // データベースの選択
    $r = mysql_select_db("shift_db",$con);
    if (!$r )  die("データベース選択エラー: " . mysql_error());

    // シフトデータ(範囲指定)の削除
    $sql = "delete from shift_tbl where date BETWEEN '$d1' AND '$d2';";
    $r = mysql_query($sql,$con);
    if (!$r )  die("シフト削除エラー: " . mysql_error());

    // データベースサーバーから切断
    mysql_close($con);

    echo "<p>シフトデータ（ $d1 ～ $d2 ）を削除しました。</p>";

  } ?>
  <p><a href="index.html">トップページに戻る</a></p>
</body>
</html>
