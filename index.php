<?php
$maxPrice = 150;
 $chunks = array();
 $total = 0;
 
 $products = array( 
   array('name'=>'item1', 'price'=>20),
   array('name'=>'item2', 'price'=>100),
   array('name'=>'item3', 'price'=>130),
   array('name'=>'item4', 'price'=>200),
 );
 
/*$max = 250;
$i = 1;
$total = 0;
$group = [];
foreach ($products as $p) {
    $total += $p['price'];
    if ($total >= $max) {
        $total = $p['price'];
        $i++;
    }
    $groups[$i][] = $p; 
} 
print_r($groups);*/
 
 $group = 1;
 foreach ($products as $product) {
    if ($total + $product['price'] > $maxPrice) {
        $total = 0;
        $group++;
    }
    $total += $product['price'];
    $chunks[$group][] = $product;
 }
 if($chunks) {
     $totalPrice = 0;

     foreach($chunks as $group=>$products) {
         $totalPrice = 0;
         echo '<table border="1">';
         echo '<tr><td colspan="2" align="center">Group '.$group.'</td></tr>';
         echo '<tr><td>Name</td><td>Price</td></tr>';
         foreach($products as $product) {
             echo '<tr>';
             echo '<td >'.$product['name'].'</td>';
             echo '<td >'.$product['price'].'</td>';
             echo '</tr>';
             $totalPrice += $product['price'];
         }
         echo '<tr><td colspan="2">Total Items : '.count($products).'</td></tr>';
         echo '<tr><td colspan="2">Total Price : '.$totalPrice.'</td></tr>';
         echo '</table>';
     }
 }
?>