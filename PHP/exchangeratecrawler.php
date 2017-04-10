<?php
include_once('simple_html_dom.php');

$target_url = "http://www.mnb.hu/arfolyamok";
$html = new simple_html_dom();
$html->load_file($target_url);

$valute = $html->find('td[class=valute]');
$value = $html->find('td[class=value]');
$now = date('Y. M d H:i:s');

echo "<h1>Napi arfolyamok</h1><h2>Utoljara frissitve: ".$now."</h2><table>";

for($i = 0; $i < count($valute); $i++) {
  echo "<tr><td class='valute'>".$valute[$i]."</td><td class='value'>".$value[$i]."</td></tr>";
}

echo "</table>";

 ?>
