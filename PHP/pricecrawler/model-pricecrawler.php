<?php
include_once('../simple_html_dom.php');

$edigital = "https://edigital.hu/gamer-eger/razer-abyssus-v2-gamer-eger-p457705";
$edhtml = new simple_html_dom();
$edhtml->load_file($edigital);

$price_edigital = $edhtml->find('strong[class=price]');
$name_edigital = $edhtml->find('h1[class=main-title]');
$de = $edhtml->find('strong[class=price--old]');

if(count($de) >= 1) {
  $discount_edigital = "Igen";
}
else {
  $discount_edigital = "Nem";
};

$emag = "http://www.emag.hu/razer-abyssus-v2-gaming-eger-fekete-rz01-01900100-r3g1/pd/DPTK92BBM/";
$emhtml = new simple_html_dom();
$emhtml->load_file($emag);

$price_emag = $emhtml->find('p[class=product-new-price]');
$name_emag = $emhtml->find('h1[class=page-title]');
$dem = $edhtml->find('p[class=product-old-price]');
if(count($dem) >= 1) {
  $discount_emag = "Igen";
}
else {
  $discount_emag = "Nem";
};

$ipon = "https://ipon.hu/webshop/product/product/1499264";
$iphtml = new simple_html_dom();
$iphtml->load_file($ipon);

$price_ipon = $iphtml->find('p[class=webshop-price]');
$name_ipon = $iphtml->find('div[class=product-name]');
$dip = $iphtml->find('p[class=price]');
if(count($dip) >= 1) {
  $discount_ipon = "Igen";
}
else {
  $discount_ipon = "Nem";
};

$updated = date('Y M d H:i:s');

 ?>
