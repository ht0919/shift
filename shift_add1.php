<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>シフト登録</title>
</head>
<body>
  <h1>シフト登録</h1>
  <form action="shift_add2.php" method="post">
    <table>
      <tr>
        <td>日付</tb>
        <td><input type="text" name="date" value="<?php echo date("Y/m/d"); ?>"></td>
      </tr>
      <tr>
        <td>時間帯</td>
          <td>
            <input type="radio" name="shift_mode" value="1"  checked >早番
            <input type="radio" name="shift_mode" value="2">遅番
          </td>
      </tr>
      <tr>
        <td>メンバーの登録番号</td>
        <td><input type="text" name="member_num"></td>
      <!--
        <td>氏名</td>
        <td><?php include 'member_selector.php'; ?></td>
      -->
      </tr>
    </table>
    <p><input type="submit" value="登録"></p>
    </form>
  <p><a href="index.html">トップページに戻る</a></p>
</body>
</html>
