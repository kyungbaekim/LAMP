<?php
 header('Content-type: text/css');

 function randColor(){
   $colors = array('lightgrey', 'red', 'blue', 'black', 'pink', 'lime', 'magenta', 'lightyellow', 'orange', 'orchid');
   $index = rand(0,9);
   return $colors[$index];
 }
?>

h1{
  color: <?php echo randColor(); ?>;
}
p{
  color: <?php echo randColor(); ?>;
}
