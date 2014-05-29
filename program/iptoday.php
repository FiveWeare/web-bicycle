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
			<form action="counter1.php">
				会員ID<input type="text"/> <input type="submit" value="ログイン"/><br />
				パスワード<input type="text"/> <input type="submit" value="新規会員登録"/>
			</form>
		</div>

		<hr />

		<form>
			<select name="車体" style="WIDTH: 250px; HEIGHT: 50px; font-size:30px; " >
 				<option value="車体" selected disabled>車体</option>
				<option value="ミニバイク">ミニバイク</option>
				<option value="ビックスクーター">ビックスクーター</option>
				<option value="アメリカンバイク" >アメリカンバイク</option>
				<option value="スポーツ">スポーツ</option>
				<option value="レプリカ">レプリカ</option>
				<option value="なし">なし</option>
			</select>
			<select name=パーツ" style="WIDTH: 250px; HEIGHT: 50px; font-size:30px; " >
 				<option value="パーツ" selected disabled>パーツ</option>
				<option value="ヘルメット">ヘルメット</option>
				<option value="タイヤ">タイヤ</option>
				<option value="-----" >-----</option>
				<option value="-----">-----</option>
				<option value="なし">なし</option>
			</select>
			<select name="排気量" style="WIDTH: 250px; HEIGHT: 50px; font-size:30px; " >
 				<option value="排気量" selected disabled>排気量</option>
 				<option value="５０ｃｃ">５０ｃｃ</option>
				<option value="１２５ｃｃ">１２５ｃｃ</option>
				<option value="２５０ｃｃ">２５０ｃｃ</option>
				<option value="４００ｃｃ" >４００ｃｃ</option>
				<option value="なし">なし</option>
			</select>
			<select name="車体" style="WIDTH: 250px; HEIGHT: 50px; font-size:30px; " >
 				<option value="車体" selected disabled>車体</option>
				<option value="-----">-----</option>
				<option value="-----">-----</option>
				<option value="-----" >-----</option>
				<option value="-----">-----</option>
				<option value="なし">なし</option>
			</select>
			<select name="車体" style="WIDTH: 250px; HEIGHT: 50px; font-size:30px; " >
 				<option value="車体" selected disabled>車体</option>
				<option value="-----">-----</option>
				<option value="-----">-----</option>
				<option value="-----" >-----</option>
				<option value="-----">-----</option>
				<option value="なし">なし</option>
			</select>
			<br /><br />

			<br /><br />

			<hr />

			<center>
				<h2>検索ワード入力<input type="text"style="WIDTH: 250px; HEIGHT: 30px; font-size:30px; "/>
				<input type="submit" value="検索" name="" style="WIDTH: 250px; HEIGHT: 35px; font-size:30px; "/></h2>
			</center>
		</form>

		<hr />

		<br /><br /><br /><br /><br />

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

		<center>
		<?php
			echo "<h2>アクセス数　　<br /></h2>\n";
			$bbb=sprintf('合計%05d　昨日%03d　今日%03d',$tal,$yday,$tday);
			echo"<h2>$bbb</h2>";
		?>
		</center>
	</body>
</html>

