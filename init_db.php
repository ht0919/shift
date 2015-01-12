<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>データベースの初期化</title>
</head>
<body>
  <h1>データベースの初期化</h1>
  <?php

  // データベースサーバーに接続
  $con = mysql_connect("localhost","root","");
  if (!$con )  die("データベースの接続エラー: " . mysql_error());

  // 古いデータベースが残っていたら削除する
  $sql="drop database IF EXISTS shift_db";
  $r = mysql_query($sql,$con);
  if (!$r )  die("データベース削除エラー: " . mysql_error());

  // データベースの作成と選択
  $sql="create database shift_db CHARACTER SET utf8";
  $r = mysql_query($sql,$con);
  if (!$r )  die("データベース作成エラー: " . mysql_error());
  $r = mysql_select_db("shift_db",$con);
  if (!$r )  die("データベース選択エラー: " . mysql_error());

  // メンバーテーブルの作成
  $sql = "create table member_tbl (" .
    "member_num	int primary key auto_increment," .
    "name		text)";
  $r = mysql_query($sql,$con);
  if (!$r )  die("メンバーテーブル作成エラー: " . mysql_error());

  // シフトテーブルの作成
  $sql = "create table shift_tbl (" .
    "shift_num int primary key auto_increment," .
    "date	date," .
    "shift_mode	int," .
    "member_num	int," .
    "foreign key(member_num) references member_tbl(member_num));";
  $r = mysql_query($sql,$con);
  if (!$r )  die("シフトテーブル作成エラー: " . mysql_error());

  // データベースサーバーから切断
  mysql_close($con);

  echo "<p>データベースを初期化しました。</p>";
  ?>
  <p><a href="index.html">トップページに戻る</a></p>
</body>
</html>
