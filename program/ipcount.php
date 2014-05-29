<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-Transitional.dtd">


<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<title>アクセスカウンタ</title>
</head>


<body  background="../web-bicycle/pict/bicycle.gif">

<div align="right">
<?php
$log="./data.txt";
$fig=5; //桁数
$ipcheck=1; //連続IPカウントしない？yes=1,no=0

$ip=$_SERVER['REMOTE_ADDR'];//ipアドレスの取得
$data=file($log);//テキストファイルを1行読み込んで配列に。

list($count,$addr)=explode("|",$data[0]);//explodeで$data（例：5200｜192.162.11.1）を分割後配列にする。その配列を順番に$countと$addrに入れる。
if(($ipcheck==1 && $ip!=$addr)||$ipcheck==0){ //連続IP×モードでIPが重複していない（初回アクセス）、または、ipカウントがOFFなら
    $count++;

    $aaa=implode("|",array($count,$ip));//カウンタとIPを|でつなげて変数に代入

    $fp=@fopen($log,'w');//書き込み形式でファイルを開く。
    flock($fp,LOCK_EX);
    fputs($fp,$aaa);
    fclose($fp);
}
    echo "<h2>こんにちは。　　<br /></h2>\n";
	echo "<h2>アクセス数　　<br /></h2>\n";
	$bbb = sprintf('%0'.$fig.'d', $count) . '人目です。';
    echo"<h2>$bbb</h2>";
?>
</div>
</body>
</html>

