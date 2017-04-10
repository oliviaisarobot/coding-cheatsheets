<?php
include_once('model-pricecrawler.php');
 ?>

<link href="./style-prices.css" type="text/css" rel="stylesheet" />

 <table>
   <thead>
     <tr>
       <td>Termek</td>
       <td>Forras</td>
       <td>Ar</td>
       <td>Akcios</td>
     </tr>
   </thead>
   <tbody>
     <tr>
       <td class="name"><?= $name_edigital[0] ?></td>
       <td class="source">Extreme Digital</td>
       <td class="price"><?= $price_edigital[0] ?></td>
       <td><?= $discount_edigital ?></td>
     </tr>
     <tr>
       <td class="name"><?= $name_emag[0] ?></td>
       <td class="source">eMag</td>
       <td class="price"><?= $price_emag[0] ?></td>
       <td><?= $discount_emag ?></td>
     </tr>
     <tr>
       <td class="name"><?= $name_ipon[0] ?></td>
       <td class="source">iPon</td>
       <td class="price"><?= $price_ipon[1] ?></td>
       <td><?= $discount_ipon ?></td>
     </tr>
   </tbody>
 </table>
 <p class="updated">Utoljara frissitve: <?= $updated ?></p>
