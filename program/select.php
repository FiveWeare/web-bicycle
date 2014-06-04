<?php
  $url = "localhost";
  $user = "root";
  $pass = "";
  $db = "SampleDB050";

  // MySQLへ接続する
  $link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

  // データベースを選択する
  $sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

  // クエリを送信する
  $sql = "SELECT * FROM T01Prefecture";
  $result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);

  //結果セットの行数を取得する
  $rows = mysql_num_rows($result);

  //表示するデータを作成
  if($rows){
    while($row = mysql_fetch_array($result)) {
 	  $tempHtml = '';
 	  //Notice: Undefined variable: tempHtml in ～を出さないために初期化
      $tempHtml .= "<tr>";
      $tempHtml .= "<td>".$row["PREF_CD"]."</td><td>".$row["PREF_NAME"]."</td>";
      $tempHtml .= "</tr>\n";
    }
    $msg = $rows."件のデータがあります。";
  }else{
    $msg = "データがありません。";
  }

  //結果保持用メモリを開放する
  mysql_free_result($result);

  // MySQLへの接続を閉じる
  mysql_close($link) or die("MySQL切断に失敗しました。");
?>

<html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=SHIFT-JIS">
    <title>全件表示</title>
  </head>
  <body>
    <h3>全件表示</h3>
    <?= $msg ?>
    <table width = "200" border = "0">
      <tr bgcolor="##ccffcc"><td>PREF_CD</td><td>PREF_NAME</td></tr>
      <?= $tempHtml ?>
    </table>
  </body>
</html>