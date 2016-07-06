<?php
  $rand1 = rand(1, 10);
  $rand2 = rand(10, 100);
  $result = $rand1 * $rand2;
  $text = ['ajsdfkh', 'qohfare', 'zcijvjoqr', 'cneik', 'riudofk', 'xrkjfds', 'siuehgj'];
  $index = rand(0, 6);
?>

$(document).ready(function(){
  alert('<?= $rand1."x".$rand2."=".$result; ?>');
});
