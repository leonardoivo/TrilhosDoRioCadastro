<?php
function Coffee($string){
    $arr = ["Loves", "Coffee", "With", "His", "Donuts"];
 
    foreach($arr as $items){
          $string  .= ' ' . $items;
    }
   
    return $string;
}

echo Coffee("Joe");

?>