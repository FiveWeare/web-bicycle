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

		//結果保持用メモリを開放する
		mysql_free_result($result);

		// MySQLへの接続を閉じる
		mysql_close($link) or die("MySQL切断に失敗しました。");
?>

<?php
		$log="./data.dat";
		$fig=5; //桁数
		$ipcheck=1; //連続IPカウントしない？yes=1,no=0

		$ip=$_SERVER['REMOTE_ADDR'];//ipアドレスの取得
		$data=file($log);

		list($tal,$tday,$yday,$dy,$addr)=explode(" ",$data[0]); //　保存データ分割（トータル、今日、昨日、日付、IP）

		if(($ipcheck==1 && $ip!=$addr)||$ipcheck==0){


		if(date("j")!=$dy){
		   	$dy=date("j");
    		$yday=$tday;
    		$tday=0;
    		}
		$tal++;
		$tday++;

		$aaa=implode(" ",array($tal,$tday,$yday,$dy,$ip));//カウンタとIPを|でつなげて変数に代入

    	$fp=@fopen($log,'w');//書き込み形式でファイルを開く。
		flock($fp,LOCK_EX);
		fputs($fp,$aaa);
		fclose($fp);
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.or.g/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<head>
		<title>バイク通販サイト</title>
	</head>


	<body  background="../../web-bicycle/pict/neko.jpg" >



		<center>
			<h1>バイク通販サイト</h1>
		</center>

		<div align="right">
			<?php
				echo "<h2>アクセス数　　　　　　　　　　<br /></h2>\n";
				$bbb=sprintf('合計%05d　昨日%03d　今日%03d',$tal,$yday,$tday);
				echo"<h2>$bbb</h2>";
			?>
		</div>

		<div align="right">
			<form action="counter1.php">
				会員ＩＤ：<input type="text"/> <input type="submit" value="ログイン"  /><br />
				パスワード：<input type="text"/> <input type="submit" value="新規会員登録"  />
			</form>
		</div>

		<hr />



		<form>

			<form action="counter1.php">
				 <input type="submit" value="車体" name="" style="WIDTH: 120px; HEIGHT: 70px; font-size:30px;"/>
				 <input type="submit" value="付属品" name="" style="WIDTH: 120px; HEIGHT: 70px; font-size:30px;"/>
			</form>

			<form action="counter1.php">
				<h2>
					<center>
						キーワード検索<input type="textarea" value="" style="WIDTH: 350px; HEIGHT: 50px;" />
						<input type="submit" value="検索" name="" style="WIDHT: 350px; HEIGHT: 50px;" />
					</center>
				</h2>
			</form>

			<br /><br />

			<br /><br />

			<hr />


		</form>


		<br /><br /><br /><br /><br />



		<form>
			<div style="float:left;">
				<h2>メーカー<br /></h2>
				<input type="submit" value="ホンダ" name="" style="WIDTH: 350px; HEIGHT: 100px; font-size:30px; background-image: url('../../web-bicycle/pict/honda.jpg'); "/><br /><br />
				<input type="submit" value="ヤマハ" name="" style="WIDTH: 350px; HEIGHT: 100px; font-size:30px; background-image: url('../../web-bicycle/pict/YAMAHA.jpg');"/><br /><br />
				<input type="submit" value="スズキ" name="" style="WIDTH: 350px; HEIGHT: 100px; font-size:30px; background-image: url('../../web-bicycle/pict/SUZUKI.jpg');"/><br /><br />
				<input type="submit" value="カワサキ" name="" style="WIDTH: 350px; HEIGHT: 100px; font-size:30px; background-image: url('../../web-bicycle/pict/Kawasaki.jpg');"/><br /><br />
				<input type="submit" value="ハーレーダビッドソン" name="" style="WIDTH: 350px; HEIGHT: 100px; font-size:30px; background-image: url('../../web-bicycle/pict/HARLEY-DAVIDSON.jpg');"/><br /><br />
				<input type="submit" value="ドゥカティ" name="" style="WIDTH: 350px; HEIGHT: 100px; font-size:30px; background-image: url('../../web-bicycle/pict/DUCATI.jpg');"/><br /><br />
				<input type="submit" value="ビーエムダブリュー" name="" style="WIDTH: 350px; HEIGHT: 100px; font-size:30px; background-image: url('../../web-bicycle/pict/ＢＭＷ.jpg');"/>
			</div>
		</form>


		<div style="float:light;">
			<img src="../../web-bicycle/pict/sample2.jpg" width="1000" height="1000" hspace="80"/>
		</div>

		<div style="clear:both;"></div>

		<hr />



		接続ID:<?= $link ?><br />
		選択の成否:<?= $sdb ?><br />
		結果ID:<?= $result ?><br />
		行数:<?= $rows ?><br />
	</body>
</html>

