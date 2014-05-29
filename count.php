<?php
  $f = fopen("count.txt", "r+");
  $c = fgets($f, 10);
  $c = $c + 1;
  fseek($f, 0);
  fputs($f, $c);
  fclose($f);
?>

<p>あなたは <?php echo $c; ?> 人目のお客様です。</p>
